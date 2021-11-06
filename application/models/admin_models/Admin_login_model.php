<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login_model extends CI_Model{

	//admin_login
	public function validate_admin_login($admin_username, $admin_password)
	{
		$hash = $this->get_hashed_password($admin_username);
		if(isset($hash)):
			$password = password_verify($admin_password, $hash->admin_password);
		endif;

		if(isset($password) && $password == TRUE){
			$this->db->select('admin_username, admin_name');
			$this->db->from('admin');
			$this->db->where('admin_username', $admin_username);
			$this->db->limit(1);
			$query = $this->db->get();

			if($query):
				return $query->result();
			endif;	
		}
		else{
			return FALSE;
		}	

	}

	private function get_hashed_password($admin_username)
	{
		$this->db->select('admin_password');
		$this->db->from('admin');
		$this->db->where('admin_username', $admin_username);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query){
			return $query->row();
		}
		else{
			return FALSE;
		}
	}

}