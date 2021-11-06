<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern_student_model extends CI_Model{

	//check if student is debarred
	public function student_debarred()
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$this->db->where('debarr', 1);
		$query = $this->db->get('intern_student');

		if($query->num_rows() == 1):
			return true;
		else:
			return false;
		endif;
	}


	//grab data for navigation
	public function student_navigation()
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->get('intern_student');
		if($query->num_rows() == 1){
			return $query->result_array();
		}
		else{
			return false;
		}
	}


	

	//get notifications
	public function get_notifications($limit)
	{
		$this->db->order_by('date_time', 'desc');
		$query = $this->db->get('intern_notifications',$limit, $this->uri->segment(4));
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}




	//get recruiter info for printing in job openings view
	public function get_recruiter_info($limit, $uri_segment)
	{
		$this->db->order_by('application_deadline', 'desc');
		$query = $this->db->get('intern_recruiter',$limit, $this->uri->segment($uri_segment));
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
	//search for job openings in recruiter
	public function search_jobs_in_recruiter($search_string)
	{
		$this->db->like('company_name', $search_string);
		$this->db->or_like('btech_branches', $search_string);
		$this->db->or_like('mtech_branches', $search_string);
		$this->db->or_like('btech', $search_string);
		$this->db->or_like('mtech', $search_string);
		$this->db->or_like('mba', $search_string);
		$this->db->order_by('application_deadline', 'desc');
		$query = $this->db->get('intern_recruiter');
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
	//get specific recruiter info for printing in the specific recruiter profile view when a student clicks on a company
	public function get_specific_recruiter_info($recruiter_username)
	{
		$this->db->where('recruiter_username', $recruiter_username);
		$query = $this->db->get('intern_recruiter');
		if($query->num_rows() == 1){
			return $query->result_array();
		}
		else{
			return false;
		}
	}



	

	//check for correct recruiter username before submitting application
	public function correct_recruiter_username($recruiter_username)
	{
		$this->db->where('recruiter_username', $recruiter_username);
		$query = $this->db->get('intern_recruiter');
		if($query->num_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}
	//check already applied
	public function check_already_applied($recruiter_username)
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('student_rollnumber', $session_data['username']);
		$this->db->where('recruiter_username', $recruiter_username);
		$query = $this->db->get('intern_applications');
		if($query->num_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}
	//enter the application data
	public function enter_application($recruiter_username)
	{
		//get student information
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->get('intern_student');
		if($query->num_rows() == 1){
			foreach($query->result_array() as $row){
				$student_rollnumber = $row['username_rollnumber'];
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$dob = $row['dob'];
				$email = $row['email'];
				$mobile = $row['mobile'];
				$aggregate10 = $row['aggregate10'];
				$aggregate12 = $row['aggregate12'];
				$branch_ug = $row['branchgrad'];
				$sem1_ug = $row['sem1grad'];
				$sem2_ug = $row['sem2grad'];
				$sem3_ug = $row['sem3grad'];
				$sem4_ug = $row['sem4grad'];
				$sem5_ug = $row['sem5grad'];
				$sem6_ug = $row['sem6grad'];
				$sem7_ug = $row['sem7grad'];
				$sem8_ug = $row['sem8grad'];
				$aggregate_ug = $row['aggregategrad'];
				$branch_pg = $row['branchpg'];
				$sem1_pg = $row['sem1pg'];
				$sem2_pg = $row['sem2pg'];
				$sem3_pg = $row['sem3pg'];
				$sem4_pg = $row['sem4pg'];
				$aggregate_pg = $row['aggregatepg'];
				$cv_link = $row['resume_link'];
				$extra_curriculars = $row['extra_curriculars'];
				$professional_societies = $row['professional_societies'];
				$pursuing = $row['pursuing'];
			}
		}
		//get recruiter information
		$this->db->where('recruiter_username', $recruiter_username);
		$query2 = $this->db->get('intern_recruiter');
		if($query2->num_rows() == 1){
			foreach($query2->result_array() as $row2){
				$company_name = $row2['company_name'];
				$date_of_visit = $row2['date_of_visit'];
			}
		}
		//finally add application into the database
		$data_to_insert = array(
				'recruiter_username' => $recruiter_username,
				'company_name' => $company_name,
				'date_of_visit' => $date_of_visit,
				'student_rollnumber' => $student_rollnumber,
				'first_name' => $firstname,
				'last_name' => $lastname,
				'dob' => $dob,
				'email' => $email,
				'mobile' => $mobile,
				'Xth_aggregate' => $aggregate10,
				'XIIth_aggregate' => $aggregate12,
				'branch_ug' => $branch_ug,
				'sem1_ug' => $sem1_ug,
				'sem2_ug' => $sem2_ug,
				'sem3_ug' => $sem3_ug,
				'sem4_ug' => $sem4_ug,
				'sem5_ug' => $sem5_ug,
				'sem6_ug' => $sem6_ug,
				'sem7_ug' => $sem7_ug,
				'sem8_ug' => $sem8_ug,
				'aggregate_ug' => $aggregate_ug,
				'branch_pg' => $branch_pg,
				'sem1_pg' => $sem1_pg,
				'sem2_pg' => $sem2_pg,
				'sem3_pg' => $sem3_pg,
				'sem4_pg' => $sem4_pg,
				'aggregate_pg' => $aggregate_pg,
				'resume_link' => $cv_link,
				'extra_curriculars' => $extra_curriculars,
				'professional_societies' => $professional_societies,
				'pursuing' => $pursuing
			);
			$query3 = $this->db->insert('intern_applications', $data_to_insert);
			if($query3){
				return true;
			}
			else{
				return false;
			}
	}





	//get applied applications for myapplications view
	public function get_applications_student()
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('student_rollnumber', $session_data['username']);
		$query = $this->db->get('intern_applications');
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	//get final selected applications for particular student
	public function get_final_selected()
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('student_rollnumber', $session_data['username']);
		$this->db->where('application_status', 'Final Selection');
		$query = $this->db->get('intern_applications');
		//return false if no final selection yet
		if($query->num_rows() > 0):
			return $query->result_array();
		else:
			return false;
		endif;
	}



	
	

	//grab data for personal info in profiles
	public function get_personal_info()
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->get('intern_student');
		if($query->num_rows() == 1){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
	//update personal info
	public function update_personal_info()
	{
		$data_to_update = array(
			'firstname' => $this->input->post('firstname', TRUE),
			'lastname' => $this->input->post('lastname', TRUE),
			'guardianname' => $this->input->post('guardianname', TRUE),
			'email' => $this->input->post('email', TRUE),
			'jobinterest' => $this->input->post('jobinterest', TRUE),
			'mobile' => $this->input->post('mobile', TRUE),
			'guardianmobile' => $this->input->post('guardianmobile', TRUE),
			'dob' => $this->input->post('dob', TRUE),
			'currentaddress' => $this->input->post('currentaddress', TRUE),
			'permanentaddress' => $this->input->post('permanentaddress', TRUE),
			'sex' => $this->input->post('sex', TRUE),
			'category' => $this->input->post('category', TRUE),
			'height' => $this->input->post('height', TRUE),
			'weight' => $this->input->post('weight', TRUE),
			'placeofbirth' => $this->input->post('placeofbirth', TRUE),
			'hometown' => $this->input->post('hometown', TRUE),
			'homestate' => $this->input->post('homestate', TRUE),
			'maritalstatus' => $this->input->post('maritalstatus', TRUE),
			'citizenship' => $this->input->post('citizenship', TRUE),
			'languages' => $this->input->post('languages', TRUE),
			);
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->update('intern_student', $data_to_update);

		if($query){
			return true;
		}
		else{
			return false;
		}

	}
	//upload photo
	public function upload_photo_path($file_name)
	{
		$data_to_update = array(
			'photo' => $file_name
			);
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->update('intern_student', $data_to_update);
		if($query){
			return true;
		}
		else{
			return false;
		}
	}
	


	

	//update academic info into the databse
	public function update_academic_info()
	{
		$data_to_update = array(
				'resume_link' => $this->input->post('resume_link'),
				'schoolname10' => $this->input->post('schoolname10'),
				'board10' => $this->input->post('board10'),
				'passingyear10' => $this->input->post('passingyear10'),	
				'aggregate10' => $this->input->post('aggregate10'),
				'subjects10' => $this->input->post('subjects10'),
				'schoolname12' => $this->input->post('schoolname12'),
				'board12' => $this->input->post('board12'),
				'passingyear12' => $this->input->post('passingyear12'),
				'aggregate12' => $this->input->post('aggregate12'),
				'subjects12' => $this->input->post('subjects12'),
				'entrance' => $this->input->post('entrance'),
				'entrance_category' => $this->input->post('entrance_category'),
				'rank' => $this->input->post('rank'),
				'branchgrad' => $this->input->post('branchgrad'),
				'yearofgradgrad' => $this->input->post('yearofgradgrad'),
				'sem1grad' => $this->input->post('sem1grad'),
				'sem2grad' => $this->input->post('sem2grad'),
				'sem3grad' => $this->input->post('sem3grad'),
				'sem4grad' => $this->input->post('sem4grad'),
				'sem5grad' => $this->input->post('sem5grad'),
				'sem6grad' => $this->input->post('sem6grad'),
				'sem7grad' => $this->input->post('sem7grad'),
				'sem8grad' => $this->input->post('sem8grad'),
				'aggregategrad' => $this->input->post('aggregategrad'),
				'universitygrad' => $this->input->post('universitygrad'),
				'branchpg' => $this->input->post('branchpg'),
				'sem1pg' => $this->input->post('sem1pg'),
				'sem2pg' => $this->input->post('sem2pg'),
				'sem3pg' => $this->input->post('sem3pg'),
				'sem4pg' => $this->input->post('sem4pg'),
				'yearofgradpg' => $this->input->post('yearofgradpg'),
				'aggregatepg' => $this->input->post('aggregatepg'),
				'project' => $this->input->post('project'),
				'training' => $this->input->post('training'),
				'gapreason' => $this->input->post('gapreason'),
				'number_of_backlogs' => $this->input->post('number_of_backlogs'),
				'backlogreason' => $this->input->post('backlogreason')
			);
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->update('intern_student', $data_to_update);

		if($query){
			return $query;
		}
		else{
			return false;
		}
	}




	

	//update extra info into the databse
	public function update_extra_info()
	{
		$data_to_update = array(
				'professional_societies' => $this->input->post('professional_societies', TRUE),
				'extra_curriculars' => $this->input->post('extra_curriculars', TRUE),
				'career_objective' => $this->input->post('career_objective', TRUE),
				'technical_skills' => $this->input->post('technical_skills', TRUE),
				'other_skills' => $this->input->post('other_skills', TRUE),
				'hobbies' => $this->input->post('hobbies', TRUE),
			);
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->update('intern_student', $data_to_update);

		if($query){
			return $query;
		}
		else{
			return false;
		}
	}









	//check if old password matches in the my accounts section
	public function check_student_password($old_password)
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$this->db->where('username_rollnumber', $session_data['username']);
		$this->db->where('password', md5($old_password));
		$this->db->limit(1);
		$query = $this->db->get('intern_student');
		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}
	}
	//change the password
	public function change_student_password()
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$data = array(
			'password' => md5($this->input->post('new_password', TRUE))
			);
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->update('intern_student', $data);

		if($query){
			return $query;
		}
		else{
			return false;
		}
	}
	//change security question
	public function change_security_question()
	{
		$session_data = $this->session->userdata('intern_student_is_logged_in');
		$data = array(
			'security_question' => $this->input->post('security_question', TRUE),
			'security_question_answer' => $this->input->post('security_answer', TRUE)	
			);
		$this->db->where('username_rollnumber', $session_data['username']);
		$query = $this->db->update('intern_student', $data);

		if($query){
			return $query;
		}
		else{
			return false;
		}
	}


}