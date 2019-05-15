<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

// halaman Belanja
	public function index()
	{
		$cart = $this->cart->contents();

		$data = array('title' => 'Keranjang Belanja',
							'cart' => $cart,
							'content' => 'shop/list'

		);

		$this->load->view('layouts/wrapper', $data);
	}

	public function add()
	{
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$redirect_page = $this->input->post('redirect_page');

		$data = array(
        'id'      => $id,
        'qty'     => $qty,
        'price'   => $price,
        'name'    => $name
		);

		$this->cart->insert($data);
		redirect($redirect_page,'refresh');

	}




}

/* End of file Shop.php */
/* Location: ./application/controllers/Shop.php */