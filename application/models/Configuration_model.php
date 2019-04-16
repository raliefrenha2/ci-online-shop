<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function listing()
	{

		return $this->db->get('configurations')->row();
	}

	public function edit($data)
	{
		$this->db->where('configuration_id', $data['configuration_id']);
		$this->db->update('configurations', $data);
	}

	public function product_nav()
	{
		$this->db->select('products.*,
								categories.category_name,
								categories.category_slug');
		$this->db->from('products');
		$this->db->join('categories', 'categories.category_id = products.category_id', 'left');
		$this->db->order_by('categories.sort', 'asc');
		
		return $this->db->get()->result();
	}

}

/* End of file Configuratuin_model.php */
/* Location: ./application/models/Configuratuin_model.php */