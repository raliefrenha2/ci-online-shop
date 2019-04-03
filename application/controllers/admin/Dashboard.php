<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data = [ 'title' => 'Halaman Administrator',
					'content' => 'admin/dashboard/list'
		];

		$this->load->view('admin/layouts/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */