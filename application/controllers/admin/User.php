<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	// Data User
	public function index()
	{
		$user = $this->user_model->listing();

		$data = 	[ 'title' =>	'Data Pengguna',
					 'users'	=>  $user,
					 'content'	=> 'admin/user/list'
					];

		$this->load->view('admin/layouts/wrapper', $data, FALSE);
	}

	// Tambah User
	public function create()
	{
		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Lengkap', 'required', ['required' => '%s harus diisi.']);
		$valid->set_rules('email', 'Email', 'required|valid_email', 
					['required' 	=>	'%s harus diisi.',
				 	 'valid_email' =>	'%s tidak valid' ]);
		$valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]|is_unique[users.username]', 
					[	'required' => '%s harus diisi.',
						'min_length' => '%s minimal 6 karakter',
						'max_length' => '%s maksimal 32 karakter',
						'is_unique' => '%s sudah ada. Buat username baru.']);
		$valid->set_rules('password', 'Password', 'required', ['required' => '%s harus diisi.']);

		if ($valid->run() === FALSE) {

			$data = [ 'title' =>	'Tambah Pengguna',
						 'content'	=> 'admin/user/create'
				];

			$this->load->view('admin/layouts/wrapper', $data, FALSE);
		}else {
			$i = $this->input;
			$data = array(	'name' => $i->post('name'),
							'email' => $i->post('email'),
							'username' => $i->post('username'),
							'password' => $i->post('password'),
							'access_level' => $i->post('access_level')
			);

			$this->user_model->create($data);
			$this->session->set_flashdata('success', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		
	}


	// edit User
	public function edit($user_id)
	{
		$user = $this->user_model->detail($user_id);

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Lengkap', 'required', ['required' => '%s harus diisi.']);
		$valid->set_rules('email', 'Email', 'required|valid_email', 
					['required' 	=>	'%s harus diisi.',
				 	 'valid_email' =>	'%s tidak valid' ]);
		$valid->set_rules('password', 'Password', 'required', ['required' => '%s harus diisi.']);

		if ($valid->run() === FALSE) {

			$data = [ 'title' =>	'Edit Pengguna',
						 'user' => $user,
						 'content'	=> 'admin/user/edit'
				];

			$this->load->view('admin/layouts/wrapper', $data, FALSE);
		}else {
			$i = $this->input;
			$data = array(	'user_id' => $user_id,
							'name' => $i->post('name'),
							'email' => $i->post('email'),
							'username' => $i->post('username'),
							'password' => $i->post('password'),
							'access_level' => $i->post('access_level')
			);

			$this->user_model->edit($data);
			$this->session->set_flashdata('success', 'Data telah diubah');
			redirect(base_url('admin/user'),'refresh');
		}
		
	}

	public function destroy($user_id)
	{
		$data = ['user_id' => $user_id ];
		$this->user_model->destroy($data);
		$this->session->set_flashdata('success', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');

	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */