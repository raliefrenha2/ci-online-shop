<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}
	// Halaman Utama Web - Homepage
	public function index()
	{
		$setting = $this->configuration_model->listing();
		$categories = $this->configuration_model->product_nav();
		$products = $this->product_model->home();
		$data = ['title' => $setting->webname,
					'keywords' => $setting->keywords,
					'description' => $setting->description,
					'categories' => $categories,
					'products' => $products,
					'content' => 'home/list'
	];
		$this->load->view('layouts/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */