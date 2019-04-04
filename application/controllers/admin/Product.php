<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->login_check();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

	// Data Product
	public function index()
	{
		$product = $this->product_model->listing();

		$data = 	[
			'title' =>	'Data Produk Produk',
			'products'	=>  $product,
			'content'	=> 'admin/product/list'
		];

		$this->load->view('admin/layouts/wrapper', $data, false);
	}

	// Tambah Product
	public function create()
	{
		$categories = $this->category_model->listing();
		$valid = $this->form_validation;

		$valid->set_rules('product_name', 'Nama Produk', 'required', ['required' => '%s harus diisi.']);
		$valid->set_rules('product_code', 'Kode Produk', 'required|is_unique[products.product_code]', ['required' => '%s harus diisi.', 'is_unique' => '%s sudah ada']);


		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('image')){
			// End Validasi

			$data = [
				'title' 			=>	'Tambah Produk Produk',
				'categories' 	=> $categories,
				'error' 			=> $this->upload->display_errors(),
				'content' 		=> 'admin/product/create'
			];

			$this->load->view('admin/layouts/wrapper', $data, false);
			// Masuk Database
		} else {
			$upload_image = ['upload_data' => $this->upload->data()];
			// Create Thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_image['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image'] 		= './assets/upload/image/thumbs';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']        	= 250;
			$config['height']       	= 250;
			$config['thumb_marker'] 	= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End create thumbnail
			$i 	= $this->input;
			$slug = url_title($this->input->post('product_name').'-'.$this->input->post('product_code'), 'dash', true);

			$data = array(
				'user_id' 			=> $this->session->userdata('user_id'),
				'category_id' 		=> $i->post('category_id'),
				'product_code' 	=> $i->post('product_code'),
				'product_name' 	=> $i->post('product_name'),
				'product_slug'		=> $slug,
				'description'		=> $i->post('description'),
				'keywords' 			=> $i->post('keywords'),
				'price' 				=> $i->post('price'),
				'stock' 				=> $i->post('stock'),
				'image' 				=> $upload_image['upload_data']['file_name'],
				'weight' 			=> $i->post('weight'),
				'size' 				=> $i->post('size'),
				'product_status'	=> $i->post('product_status'),
				'created_at' 		=> date('Y-m-d h:i:s')

			);

			$this->product_model->create($data);
			$this->session->set_flashdata('success', 'Data telah ditambah');
			redirect(base_url('admin/product'), 'refresh');
		}}
		// End Masuk Database
		$data = [
				'title' 			=>	'Tambah Produk Produk',
				'categories' 	=> $categories,
				'content' 		=> 'admin/product/create'
			];

		$this->load->view('admin/layouts/wrapper', $data, false);
	}


	// edit Product
	public function edit($product_id)
	{
		$product = $this->product_model->detail($product_id);
		$categories = $this->category_model->listing();

		$valid = $this->form_validation;

		$valid->set_rules('product_name', 'Nama Produk', 'required', ['required' => '%s harus diisi.']);
		$valid->set_rules('product_code', 'Kode Produk', 'required', ['required' => '%s harus diisi.']);


		if ($valid->run()) {
			// Cek, jika gambar diganti
			if (!empty($_FILES['image']['name'])) {
			
			$config['upload_path'] = './assets/upload/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('image')){
			// End Validasi

			$data = [
				'title' 			=>	'Edit Produk : ' .$product->product_name,
				'categories' 	=> $categories,
				'product' 		=> $product,
				'error' 			=> $this->upload->display_errors(),
				'content' 		=> 'admin/product/edit'
			];

			$this->load->view('admin/layouts/wrapper', $data, false);
			// Masuk Database
		} else {
			$upload_image = ['upload_data' => $this->upload->data()];
			// Create Thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_image['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image'] 		= './assets/upload/image/thumbs';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']        	= 250;
			$config['height']       	= 250;
			$config['thumb_marker'] 	= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End create thumbnail
			$i 	= $this->input;
			$slug = url_title($this->input->post('product_name').'-'.$this->input->post('product_code'), 'dash', true);

			$data = array(
				'product_id'		=> $product->product_id,
				'user_id' 			=> $this->session->userdata('user_id'),
				'category_id' 		=> $i->post('category_id'),
				'product_code' 	=> $i->post('product_code'),
				'product_name' 	=> $i->post('product_name'),
				'product_slug'		=> $slug,
				'description'		=> $i->post('description'),
				'keywords' 			=> $i->post('keywords'),
				'price' 				=> $i->post('price'),
				'stock' 				=> $i->post('stock'),
				'image' 				=> $upload_image['upload_data']['file_name'],
				'weight' 			=> $i->post('weight'),
				'size' 				=> $i->post('size'),
				'product_status'	=> $i->post('product_status')				

			);

			$this->product_model->edit($data);
			$this->session->set_flashdata('success', 'Data telah diedit');
			redirect(base_url('admin/product'), 'refresh');
		}}else {
			// Edit Produk tanpa edit gambar ...
			$i 	= $this->input;
			$slug = url_title($this->input->post('product_name').'-'.$this->input->post('product_code'), 'dash', true);

			$data = array(
				'product_id'		=> $product->product_id,
				'user_id' 			=> $this->session->userdata('user_id'),
				'category_id' 		=> $i->post('category_id'),
				'product_code' 	=> $i->post('product_code'),
				'product_name' 	=> $i->post('product_name'),
				'product_slug'		=> $slug,
				'description'		=> $i->post('description'),
				'keywords' 			=> $i->post('keywords'),
				'price' 				=> $i->post('price'),
				'stock' 				=> $i->post('stock'),
				// gambar tidak di ganti
				// 'image' 				=> $upload_image['upload_data']['file_name'],
				'weight' 			=> $i->post('weight'),
				'size' 				=> $i->post('size'),
				'product_status'	=> $i->post('product_status')				

			);

			$this->product_model->edit($data);
			$this->session->set_flashdata('success', 'Data telah diedit');
			redirect(base_url('admin/product'), 'refresh');
		}}
		// End Masuk Database
		$data = [
				'title' 			=>	'Edit Produk : ' .$product->product_name,
				'categories' 	=> $categories,
				'product' 		=> $product,
				'content' 		=> 'admin/product/edit'
			];

		$this->load->view('admin/layouts/wrapper', $data, false);
	}

	public function destroy($product_id)
	{
		$product = $this->product_model->detail($product_id);
		unlink('./assets/upload/image/'.$product->image);
		unlink('./assets/upload/image/thumbs/'.$product->image);
		$data = ['product_id' => $product_id];
		$this->product_model->destroy($data);
		$this->session->set_flashdata('success', 'Data telah dihapus');
		redirect(base_url('admin/product'), 'refresh');
	}
}

/* End of file Product.php */
/* Location: ./application/controllers/admin/Product.php */
