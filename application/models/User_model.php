<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function detail($user_id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		$this->db->order_by('user_id', 'desc');	

		return $this->db->get()->row();
	}

	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where( ['username' => $username, 'password' => sha1($password)] );
		$this->db->order_by('user_id', 'desc');	

		return $this->db->get()->row();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('user_id', 'desc');	

		return $this->db->get()->result();
	}

	public function create($data)
	{
		$this->db->insert('users', $data);
	}

	public function edit($data)
	{
		$this->db->where('user_id', $data['user_id']);
		$this->db->update('users', $data);
	}

	public function destroy($data)
	{
		$this->db->where('user_id', $data['user_id']);
		$this->db->delete('users', $data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */