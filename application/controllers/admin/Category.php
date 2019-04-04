<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->login_check();
		$this->load->model('category_model');
	}

	// Data Category
	public function index()
	{
		$category = $this->category_model->listing();

		$data = 	[ 'title' =>	'Data Kategori Produk',
					 'categories'	=>  $category,
					 'content'	=> 'admin/category/list'
					];

		$this->load->view('admin/layouts/wrapper', $data, FALSE);
	}

	// Tambah Category
	public function create()
	{
		$valid = $this->form_validation;

		$valid->set_rules('category_name', 'Nama Kategori', 'required|is_unique[categories.category_name]', ['required' => '%s harus diisi.', 'is_unique' =>'%s sudah ada']);
		

		if ($valid->run() === FALSE) {

			$data = [ 'title' =>	'Tambah Kategori Produk',
						 'content'	=> 'admin/category/create'
				];

			$this->load->view('admin/layouts/wrapper', $data, FALSE);
		}else {
			$i 	= $this->input;
			$slug = url_title($this->input->post('category_name'), 'dash', TRUE);

			$data = array(	'category_slug' => $slug,
								'category_name' => $i->post('category_name'),
								'sort' => $i->post('sort')

			);

			$this->category_model->create($data);
			$this->session->set_flashdata('success', 'Data telah ditambah');
			redirect(base_url('admin/category'),'refresh');
		}
		
	}


	// edit Category
	public function edit($category_id)
	{
		$category = $this->category_model->detail($category_id);

		$valid = $this->form_validation;

		$valid->set_rules('category_name', 'Nama Kategori', 'required|is_unique[categories.category_name]', ['required' => '%s harus diisi.', 'is_unique' =>'%s sudah ada']);
		

		if ($valid->run() === FALSE) {

			$data = [ 'title' =>	'Edit Kategori Produk',
						 'category' => $category,
						 'content'	=> 'admin/category/edit'
				];

			$this->load->view('admin/layouts/wrapper', $data, FALSE);
		}else {
			$i 	= $this->input;
			$slug = url_title($this->input->post('category_name'), 'dash', TRUE);

			$data = array(	'category_id' => $category_id,
								'category_slug' => $slug,
								'category_name' => $i->post('category_name'),
								'sort' => $i->post('sort')
			);

			$this->category_model->edit($data);
			$this->session->set_flashdata('success', 'Data telah diubah');
			redirect(base_url('admin/category'),'refresh');
		}
		
	}

	public function destroy($category_id)
	{
		$data = ['category_id' => $category_id ];
		$this->category_model->destroy($data);
		$this->session->set_flashdata('success', 'Data telah dihapus');
		redirect(base_url('admin/category'),'refresh');

	}
}

/* End of file Category.php */
/* Location: ./application/controllers/admin/Category.php */