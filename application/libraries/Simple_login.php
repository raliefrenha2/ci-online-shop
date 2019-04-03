<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load User Model
        $this->CI->load->model('user_model');
	}

	public function login ($username, $password)
	{
		$check = $this->CI->user_model->login($username,$password);

		if ($check) {
			// Jika ada user,
			$user_id = $check->user_id;
			$name = $check->name;
			$access_level = $check->access_level;
			// buat session
			$this->CI->session->set_userdata('user_id', $user_id);
			$this->CI->session->set_userdata('name', $name);
			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('access_level', $access_level);
			// redirect ke halaman dashbpard
			redirect(base_url('admin/dashboard'),'refresh');

		}else{
			// Jika tidak ada maka diarahkan untuk login kembali
			$this->CI->session->set_flashdata('warning', 'Username atau Password Anda salah...!');
			redirect(base_url('login'),'refresh');
		}
	}

	public function login_check()
	{
		// Memeriksa apakah sudah terdapat session, jika belum maka dialihkan ke halaman login
		if ($this->CI->session->userdata('username') == "") {
				$this->CI->session->set_flashdata('warning', 'Anda belum LOGIN...!');
				redirect(base_url('login'),'refresh');
		}
	}
	

	public function logout()
	{
		// hapus session yang ada
		$this->CI->session->unset_userdata('user_id');
		$this->CI->session->unset_userdata('name');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('access_level');
		// Setelah session hapus, maka arahkan ke halaman login
		$this->CI->session->set_flashdata('success', 'Anda telah LOGOUT...!');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
