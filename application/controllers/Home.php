<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Halaman Utama Web - Homepage
	public function index()
	{
		$data = ['title' => 'Toko Online Abu Ibrahim',
		'content' => 'home/list'
	];
		$this->load->view('layouts/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */