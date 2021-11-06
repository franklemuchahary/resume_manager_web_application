<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* This is the main admin model.
*
* This model will be responsible for all the database connections in the admin portal. 
*/

class Admin_main_model extends CI_Model {
	
	//method to check if the itnern admin or main admin is logged in
	public function admin_main_logged()
	{
		$session_data = $this->session->userdata('admin_logged_in');
		$this->db->where('admin_username', $session_data['username']);
		$this->db->where('intern_admin', NULL);
		$query = $this->db->get('admin');
		if($query->num_rows() == 1):
			return true;
		else:
			return false;
		endif;
	}

	//method to get all the posted notifications
	public function get_all_notifications($limit)
	{
		$this->db->order_by('date_time', 'desc');
		$query = $this->db->get('notifications', $limit, $this->uri->segment(4));
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}


	//method for deleting the notifications 
	public function delete_notifications($id, $recruiter_username)
	{
		$this->db->where('id', $id);
		$this->db->where('recruiter_username', $recruiter_username);
		$query = $this->db->delete('notifications');

		if($query):
			return true;
		else:
			return false;
		endif;
	}


	//method to add notifications 
	public function admin_post_notifications()
	{
		$session_data = $this->session->userdata('admin_logged_in');
		$admin_username = $session_data['username'];
		$admin_name = $session_data['admin_name'];


		$data_to_insert = array(
			'company_name' => $admin_name,
			'recruiter_username' => $admin_username,
			'notification' => $this->input->post('summernote_content')
			);

		$query = $this->db->insert('notifications', $data_to_insert);

		if($query):
			return TRUE;
		else:
			return FALSE;
		endif;
	}




	//this checks if the recruiter username is avaliable before creating a recruiter account
	public function check_if_rec_username_available($recruiter_username)
	{
		$this->db->where('recruiter_username', $recruiter_username);
		$query = $this->db->get('recruiter');

		if($query->num_rows() >= 1):
			return false;
		else:
			return true;
		endif;
	}
	//this method creates a new recuriter after the validation checks
	public function create_new_recruiter()
	{
		$data_to_insert = array(
			'recruiter_username' => $this->input->post('recruiter_username', true),
			'company_name' => $this->input->post('company_name', true),
			'coordinator' => $this->input->post('coordinator', true),
			'coordinator_mobile' => $this->input->post('coordinator_mobile', true),
			'password' => md5($this->input->post('password', true))
			);
		$this->db->trans_start();
		$query = $this->db->insert('recruiter', $data_to_insert);
		$this->db->trans_complete();
		
		if($query):
			return true;
		else:
			return false;
		endif;
	}




	//this method is reponsible for debarring the student
	public function debarr_student_roll_no()
	{
		//convert roll numbers separated by comma into an array
		$roll_number_array = explode(",",$this->input->post('debarr_roll_no', true));

		foreach($roll_number_array as $row){
			$data_to_update = array('debarr' => 1);

			$this->db->trans_start();
			$this->db->where('username_rollnumber', $row);
			$query = $this->db->update('student_personal', $data_to_update);
			$this->db->trans_complete();
		}
	}
	//this method gets the list of debarred students
	public function get_debarred_students()
	{
		$param = 1;
		$this->db->select('username_rollnumber, firstname, lastname, mobile');
		$this->db->from('student_personal');
		$this->db->where('debarr', $param);
		$query = $this->db->get();

		if($query->num_rows() >=1):
			return $query->result_array();
		else:
			return false;
		endif;
	}
	//this method is to remove a student from the debarred list
	public function undebarr_student_roll()
	{
		foreach($this->input->post('undebarr_roll_no[]') as $row):
			$this->db->where('username_rollnumber', $row, true);
			$query = $this->db->update('student_personal', array('debarr' => NULL));
		endforeach;
	}


	//check if rollnumber/username for student is available 
	public function username_rollnumber_check($username_rollnumber)
	{
		$this->db->where('username_rollnumber', $username_rollnumber);
		$query = $this->db->get('student_personal');

		if($query->num_rows() >=1 ):
			return false;
		else:
			return true;
		endif;
	}
	//this method is responsible for creating a new student account and adding it to the database
	public function create_student_account()
	{
		$data_to_insert = array(
			'username_rollnumber' => $this->input->post('username_rollnumber', true),
			'password' => md5($this->input->post('password', true)),
			'pursuing' => $this->input->post('student_course', true),
			'photo' => 'default.png'
			);

		$query = $this->db->insert('student_personal', $data_to_insert);

		if($this->db->affected_rows() < 1):
			return false;
		else:
			return true;
		endif;
	}




	//get student info for printing in search students view
	public function get_student_info($limit)
	{
		$this->db->order_by('username_rollnumber', 'asc');
		$query = $this->db->get('student_personal', $limit, $this->uri->segment(4));
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}


	//search for students in admin panel
	public function search_students_admin($search_string)
	{
		$this->db->like('username_rollnumber', $search_string);
		$this->db->or_like('branchgrad', $search_string);
		$this->db->or_like('branchpg', $search_string);
		$this->db->or_like('firstname', $search_string);
		$this->db->or_like('lastname', $search_string);
		$this->db->or_like('pursuing', $search_string);
		$this->db->or_like('aggregategrad', $search_string);
		$this->db->or_like('aggregatepg', $search_string);
		$this->db->order_by('username_rollnumber', 'asc');
		$query = $this->db->get('student_personal');
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}




	//this method fetches the received applications
	public function get_specific_recruiter_applications($recruiter_username)
	{
		$this->db->where('recruiter_username', $recruiter_username);
		$this->db->order_by('date_time');
		$query = $this->db->get('applications');
		
		if($query):
			return $query->result_array();
		else:
			return false;
		endif;
	}


	//this method fetches all the applications received till date
	public function get_all_received_applications($limit)
	{
		$this->db->order_by('date_time');
		$query = $this->db->get('applications', $limit, $this->uri->segment(4));

		if($query):
			return $query->result_array();
		else:
			return false;
		endif;
	}


	//search for students in admin panel
	public function search_all_applications($search_string)
	{
		$this->db->like('student_rollnumber', $search_string);
		$this->db->or_like('branch_ug', $search_string);
		$this->db->or_like('branch_pg', $search_string);
		$this->db->or_like('first_name', $search_string);
		$this->db->or_like('last_name', $search_string);
		$this->db->or_like('pursuing', $search_string);
		$this->db->or_like('company_name', $search_string);
		$this->db->or_like('aggregate_ug', $search_string);
		$this->db->or_like('aggregate_pg', $search_string);
		$this->db->order_by('date_time', 'desc');
		$query = $this->db->get('applications');
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

}