<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->order_by('category_id', 'desc');	

		return $this->db->get()->result();
	}

	public function create($data)
	{
		$this->db->insert('categories', $data);
	}

	public function edit($data)
	{
		$this->db->where('category_id', $data['category_id']);
		$this->db->update('categories', $data);
	}

	public function destroy($data)
	{
		$this->db->where('category_id', $data['category_id']);
		$this->db->delete('categories', $data);
	}

	public function detail($category_id)
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('category_id', $category_id);
		$this->db->order_by('category_id', 'desc');	

		return $this->db->get()->row();
	}

	public function read($category_slug)
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('category_slug', $category_slug);
		$this->db->order_by('category_id', 'desc');	

		return $this->db->get()->row();
	}
}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */