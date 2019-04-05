<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function listing()
	{
		$this->db->select('products.*,
								users.name,
								categories.category_name,
								categories.category_slug,
								COUNT(images.product_id) AS image_total');
		$this->db->from('products');
		$this->db->join('users', 'users.user_id = products.user_id', 'left');
		$this->db->join('categories', 'categories.category_id = products.category_id', 'left');
		$this->db->join('images', 'images.product_id = products.product_id', 'left');
		$this->db->order_by('product_id', 'desc');
		$this->db->group_by('products.product_id');	

		return $this->db->get()->result();
	}

	public function create($data)
	{
		$this->db->insert('products', $data);
	}

	public function edit($data)
	{
		$this->db->where('product_id', $data['product_id']);
		$this->db->update('products', $data);
	}

	public function destroy($data)
	{
		$this->db->where('product_id', $data['product_id']);
		$this->db->delete('products', $data);
	}

	public function detail($product_id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('product_id', $product_id);
		$this->db->order_by('product_id', 'desc');	

		return $this->db->get()->row();
	}

	public function image($product_id)
	{
		$this->db->select('*');
		$this->db->from('images');
		$this->db->where('product_id', $product_id);
		$this->db->order_by('image_id', 'desc');	

		return $this->db->get()->result();
	}

	public function image_detail($image_id)
	{
		$this->db->select('*');
		$this->db->from('images');
		$this->db->where('image_id', $image_id);
		$this->db->order_by('image_id', 'desc');	

		return $this->db->get()->row();
	}

	public function create_image($data)
	{
		$this->db->insert('images', $data);
	}

	public function destroy_image($data)
	{
		$this->db->where('image_id', $data['image_id']);
		$this->db->delete('images', $data);
	}



}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */