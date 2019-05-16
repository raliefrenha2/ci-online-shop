<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

	public function index()
	{
		$setting = $this->configuration_model->listing();
		$categories = $this->product_model->category_listing();
		$total = $this->product_model->product_total();
		$this->load->library('pagination');
		// pagination start
		$config['base_url'] 			= base_url().'/product/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']= TRUE;
		$config['per_page'] 			= 6;
		$config['uri_segment']		= 3;
		$config['num_links']			= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close']	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close']	= '</b>';
		$config['first_url'] 		= base_url().'/product/';

		$this->pagination->initialize($config);
		// ambil data product
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$products = $this->product_model->product($config['per_page'],$page);
		// pagination end
		$data =  [ 'title' 		=> 	'Produk '.$setting->webname,
					 'categories'	=>		$categories,
					 'setting' 		=>		$setting,
					 'products' 	=> 	$products,
					 'paginasi'  	=> 	$this->pagination->create_links(),
					 'content'		 => 	'products/list'
					];

		$this->load->view('layouts/wrapper', $data, FALSE);
	}

	public function category($category_slug)
	{
		$category = $this->category_model->read($category_slug);
		$category_id = $category->category_id;
		$setting = $this->configuration_model->listing();
		$categories = $this->product_model->category_listing();
		$total = $this->product_model->category_total($category_id);
		$this->load->library('pagination');
		// pagination start
		$config['base_url'] 			= base_url().'/product/category/'.$category_slug.'/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']= TRUE;
		$config['per_page'] 			= 1;
		$config['uri_segment']		= 5;
		$config['num_links']			= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close']	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close']	= '</b>';
		$config['first_url'] 		= base_url().'/product/category/'.$category_slug;

		$this->pagination->initialize($config);
		// ambil data product
		$page = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$products = $this->product_model->category($category_id, $config['per_page'],$page);
		// pagination end
		$data =  [ 'title' 		=> 	$category->category_name,
					 'categories'	=>		$categories,
					 'setting' 		=>		$setting,
					 'products' 	=> 	$products,
					 'paginasi'  	=> 	$this->pagination->create_links(),
					 'content'		 => 	'products/list'
					];

		$this->load->view('layouts/wrapper', $data, FALSE);
	}


	public function detail($product_slug)
	{
		$setting = $this->configuration_model->listing();
		$product = $this->product_model->read($product_slug);
		$product_id = $product->product_id;
		$images = $this->product_model->image($product_id);
		$related_product = $this->product_model->home();

		$data =  [ 'title' 				=> 	$product->product_name,
					 'setting' 				=>		$setting,
					 'product'  			=> 	$product,
					 'related_product' 	=> 	$related_product,
					 'images' 				=> 	$images,
					 'content'		 		=> 	'products/detail'
					];

		$this->load->view('layouts/wrapper', $data, FALSE);
	}
}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */