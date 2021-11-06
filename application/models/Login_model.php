<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_model{

	//student login
	public function validate_student_login($student_username, $password)
	{
		$where_array = array(
				'username_rollnumber' => $student_username,
				'password' => md5($password)
			);
		$this->db->select('id, username_rollnumber, password');
		$this->db->from('student_personal');
		$this->db->where($where_array);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}
	}


	//recruiter login
	public function validate_recruiter_login($recruiter_username, $password)
	{
		$this->db->select('id, recruiter_username, password');
		$this->db->from('recruiter');
		$this->db->where('recruiter_username', $recruiter_username);
		$this->db->where('password', md5($password));
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}
	}

}