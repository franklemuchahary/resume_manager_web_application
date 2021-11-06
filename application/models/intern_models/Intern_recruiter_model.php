<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern_recruiter_model extends CI_Model{

	//grab data for navigation
	public function recruiter_navigation()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$this->db->where('recruiter_username', $session_data['username']);
		$query = $this->db->get('intern_recruiter');
		if($query->num_rows() == 1){
			return $query->result_array();
		}
		else{
			return false;
		}
	}


	//insert posted notification into the database alongwith company name
	public function insert_notification()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		
		$this->db->where('recruiter_username', $session_data['username']);
		$recruiter_query = $this->db->get('intern_recruiter');

		foreach($recruiter_query->result_array() as $row){
			$company_name = $row['company_name'];
			$coordinator = $row['coordinator'];
		}
		$recruiter_query->free_result();

		$data_to_insert = array(
			'company_name' => $company_name,
			'recruiter_username' => $session_data['username'],
			'notification' => $this->input->post('summernote_content'),
			'placement_coordinator' => $coordinator
			);

		$query = $this->db->insert('intern_notifications', $data_to_insert);
		
		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}


	//get recruiter info
	public function get_recruiter_info()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$this->db->where('recruiter_username', $session_data['username']);
		$query = $this->db->get('recruiter');
		if($query->num_rows() == 1){
			return $query->result_array();
		}
		else{
			return false;
		}	
	}


	//update company info
	public function update_company_info()
	{
		$btech_branches = $this->input->post('btech_branches[]', TRUE);
		@$btech_branches_enter = implode(",", $btech_branches);	

		$mtech_branches = $this->input->post('mtech_branches[]', TRUE);
		@$mtech_branches_enter = implode(",", $mtech_branches);	

		$data_to_insert = array(
			'company_name' => $this->input->post('company_name', TRUE),
			'ctc' => $this->input->post('ctc', TRUE),
			'about_company' => $this->input->post('about_company', TRUE),
			'btech' => $this->input->post('btech', TRUE),
			'btech_cutoff' => $this->input->post('btech_cutoff', TRUE),
			'btech_branches' => $btech_branches_enter,
			'mtech' => $this->input->post('mtech', TRUE),
			'mtech_cutoff' => $this->input->post('mtech_cutoff', TRUE),
			'mtech_branches' => $mtech_branches_enter,
			'mba' => $this->input->post('mba', TRUE),
			'mba_cutoff' => $this->input->post('mba_cutoff', TRUE),
			'job_description' => $this->input->post('job_description', TRUE),
			'location' => $this->input->post('location', TRUE),
			'coordinator' => $this->input->post('coordinator', TRUE),
			'date_of_visit' => $this->input->post('date_of_visit', TRUE),
			'application_deadline' => $this->input->post('application_deadline', TRUE),
			'note' => $this->input->post('note', TRUE)
			);
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$this->db->where('recruiter_username', $session_data['username']);
		$query = $this->db->update('intern_recruiter', $data_to_insert);
		if($query){
			return true;
		}
		else{
			return false;
		}
	}



	//get the received applications for the company
	public function get_received_applications()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$this->db->where('recruiter_username', $session_data['username']);
		$query = $this->db->get('intern_applications');
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	//update application status
	public function update_application_status()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		
		$this->db->trans_start();

		if(!empty($this->input->post('student_rollnumber[]')) && !empty($this->input->post('status[]'))):
			foreach($this->input->post('student_rollnumber[]') as $key1=>$value1):
				foreach($this->input->post('status[]') as $key2=>$value2):
					if($key1 == $key2){
						$data_to_update = array('application_status' => $value2);
					
						$this->db->where('recruiter_username', $session_data['username']);
						$this->db->where('student_rollnumber', $value1);
						$query = $this->db->update('intern_applications', $data_to_update);
					}
				endforeach;
			endforeach;
		else:
			return false;			
		endif;

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			return false;
		}
		else{
			return true;
		}

	}

	//get data to export to excel; received applications
	public function export_received_applications_excel()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$this->db->where('recruiter_username', $session_data['username']);
		$this->db->select('date_time,student_rollnumber,first_name,last_name,dob,email,mobile,Xth_aggregate,XIIth_aggregate,branch_ug,sem1_ug,sem2_ug,sem3_ug,sem4_ug,sem5_ug,sem6_ug,sem7_ug,sem8_ug,aggregate_ug,branch_pg,sem1_pg,sem2_pg,sem3_pg,sem4_pg,aggregate_pg,resume_link,extra_curriculars,professional_societies,number_of_backlogs,backlog_subjects');
		$query = $this->db->get('intern_applications');
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}




	//get the list of final selected applicants
	public function get_final_selected_applicants($limit)
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$this->db->where('recruiter_username', $session_data['username']);
		$this->db->where('application_status', "Final Selection");
		$query = $this->db->get('intern_applications',$limit,$this->uri->segment(4));
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
	//get data to export to excel; final list of selected students
	public function export_final_selected_excel()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$this->db->where('recruiter_username', $session_data['username']);
		$this->db->where('application_status', "Final Selection");
		$this->db->select('date_time,student_rollnumber,first_name,last_name,dob,email,mobile,Xth_aggregate,XIIth_aggregate,branch_ug,sem1_ug,sem2_ug,sem3_ug,sem4_ug,sem5_ug,sem6_ug,sem7_ug,sem8_ug,aggregate_ug,branch_pg,sem1_pg,sem2_pg,sem3_pg,sem4_pg,aggregate_pg,resume_link,extra_curriculars,professional_societies,number_of_backlogs,backlog_subjects');
		$query = $this->db->get('intern_applications');
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
















	//check if old password matches in the my accounts section
	public function check_recruiter_password($old_password)
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$this->db->where('recruiter_username', $session_data['username']);
		$this->db->where('password', md5($old_password));
		$this->db->limit(1);
		$query = $this->db->get('intern_recruiter');
		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}
	}
	//change the password
	public function change_recruiter_password()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$data = array(
			'password' => md5($this->input->post('new_password', TRUE))
			);
		$this->db->where('recruiter_username', $session_data['username']);
		$query = $this->db->update('intern_recruiter', $data);

		if($query){
			return $query;
		}
		else{
			return false;
		}
	}
	//change security question
	public function change_recruiter_security_question()
	{
		$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
		$data = array(
			'security_question' => $this->input->post('security_question', TRUE),
			'security_answer' => $this->input->post('security_answer', TRUE)	
			);
		$this->db->where('recruiter_username', $session_data['username']);
		$query = $this->db->update('intern_recruiter', $data);

		if($query){
			return $query;
		}
		else{
			return false;
		}
	}




}






