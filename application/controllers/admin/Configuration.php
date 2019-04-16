<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('configuration_model');
	}

	// Konfigurasi Umum
	public function index()
	{
		$configuration = $this->configuration_model->listing();

		$valid = $this->form_validation;

		$valid->set_rules('webname', 'Nama Web', 'required', ['required' => '%s harus diisi.']);
		

		if ($valid->run() === FALSE) {

			$data = [	'title' =>	'Konfigurasi Website',
							'configuration' => $configuration,
							'content'	=> 'admin/configuration/show'
				];

			$this->load->view('admin/layouts/wrapper', $data, FALSE);
		}else {
			$i 	= $this->input;

			$data = [		'configuration_id' 	=> $configuration->configuration_id,
								'webname'				=> $i->post('webname'),
								'tagline' 				=> $i->post('tagline'),
								'email' 					=> $i->post('email'),
								'website' 				=> $i->post('website'),
								'keywords' 				=> $i->post('keywords'),
								'metatext' 				=> $i->post('metatext'),
								'telephone' 			=> $i->post('telephone'),
								'address' 				=> $i->post('address'),
								'facebook' 				=> $i->post('facebook'),
								'instagram'				=> $i->post('instagram'),
								'description'			=> $i->post('description'),
								'payment_account' 	=> $i->post('payment_account')

			];

			$this->configuration_model->edit($data);
			$this->session->set_flashdata('success', 'Konfigurasi telah diperbaharui');
			redirect(base_url('admin/configuration'),'refresh');
		}
		
	}

	// Konfogurasi Logo Website
	public function logo()
	{

		$configuration = $this->configuration_model->listing();
		// validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('webname', 'Nama Website', 'required', ['required' => '%s harus diisi.']);


		if ($valid->run()) {
			// Cek, jika gambar diganti
			if (!empty($_FILES['logo']['name'])) {
			
			$config['upload_path'] = './assets/upload/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('logo')){
			// End Validasi

			$data = [
				'title' 			=>	'Konfogurasi Logo Website',
				'configuration' 	=> $configuration,
				'error' 			=> $this->upload->display_errors(),
				'content' 		=> 'admin/configuration/logo'
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

			$data = [	'configuration_id'	=> $configuration->configuration_id,
							'webname'				=> $i->post('webname'),
							'logo' 					=> $upload_image['upload_data']['file_name']
			];

			$this->configuration_model->edit($data);
			$this->session->set_flashdata('success', 'Konfogurasi telah diperbaharui');
			redirect(base_url('admin/configuration/logo'), 'refresh');
		}}else {
			// Edit Produk tanpa edit gambar ...
			$i 	= $this->input;

			$data = [	'configuration_id'	=> $configuration->configuration_id,
							'webname'				=> $i->post('webname'),
							// 'logo' 					=> $upload_image['upload_data']['file_name']
			];

			$this->configuration_model->edit($data);
			$this->session->set_flashdata('success', 'Konfogurasi telah diperbaharui');
			redirect(base_url('admin/configuration/logo'), 'refresh');
		}}
		// End Masuk Database
		$data = [
				'title' 				=>	'Konfogurasi Logo Website',
				'configuration' 	=> $configuration,
				'content' 			=> 'admin/configuration/logo'
			];

		$this->load->view('admin/layouts/wrapper', $data, false);
	}

	// Konfigurasi icon website
	public function icon()
	{
		$configuration = $this->configuration_model->listing();
		// validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('webname', 'Nama Website', 'required', ['required' => '%s harus diisi.']);


		if ($valid->run()) {
			// Cek, jika gambar diganti
			if (!empty($_FILES['icon']['name'])) {
			
			$config['upload_path'] = './assets/upload/image';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('icon')){
			// End Validasi

			$data = [
				'title' 			=>	'Konfogurasi Icon Website',
				'configuration' 	=> $configuration,
				'error' 			=> $this->upload->display_errors(),
				'content' 		=> 'admin/configuration/icon'
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

			$data = [	'configuration_id'	=> $configuration->configuration_id,
							'webname'				=> $i->post('webname'),
							'icon' 					=> $upload_image['upload_data']['file_name']
			];

			$this->configuration_model->edit($data);
			$this->session->set_flashdata('success', 'Konfogurasi telah diperbaharui');
			redirect(base_url('admin/configuration/icon'), 'refresh');
		}}else {
			// Edit Produk tanpa edit gambar ...
			$i 	= $this->input;

			$data = [	'configuration_id'	=> $configuration->configuration_id,
							'webname'				=> $i->post('webname'),
							// 'icon' 					=> $upload_image['upload_data']['file_name']
			];

			$this->configuration_model->edit($data);
			$this->session->set_flashdata('success', 'Konfogurasi telah diperbaharui');
			redirect(base_url('admin/configuration/icon'), 'refresh');
		}}
		// End Masuk Database
		$data = [
				'title' 				=>	'Konfogurasi Icon Website',
				'configuration' 	=> $configuration,
				'content' 			=> 'admin/configuration/icon'
			];

		$this->load->view('admin/layouts/wrapper', $data, false);
	}

}

/* End of file Configuration.php */
/* Location: ./application/controllers/admin/Configuration.php */