<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_controller{

	//parent function construct; check for session logged in and load student model by default and also the navigation views
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			$this->session->set_userdata('redirect_url_student', current_url());
			redirect('/login','refresh');
		}
		elseif($this->session->userdata('logged_in') && $this->_student_debarr_check() == true){
			redirect('student_debarred/', 'refresh');
		}
		else{
			$this->load->model('student_model');
		}
	}

	

	//check if student is debarred
	function _student_debarr_check(){
		$this->load->model('student_model');
		if($this->student_model->student_debarred()==true):
			return true;
		else:
			return false;
		endif;
	}
	

	//default function to run and default view to load; the notifications view
	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'student/index/';
		$config['total_rows'] = $this->db->get('notifications')->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$data['notifications'] = $this->student_model->get_notifications($config['per_page']);
		$data['info'] = $this->student_model->student_navigation();
		$this->load->student_view_template('student/notifications_view', $data);
	}


	


	//load job openings view
	public function job_openings()
	{
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/git-repos/rm_dtu/student/job_openings';
		$config['total_rows'] = $this->db->get('recruiter')->num_rows();
		$config['per_page'] = 1;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$uri_segment = 3;

		$data['recruiter_info'] = $this->student_model->get_recruiter_info($config['per_page'], $uri_segment);
		$data['info'] = $this->student_model->student_navigation();
		$this->load->student_view_template('student/jobopenings_view', $data);
	}
	//search job openings
	public function search_job_openings($search_string = '')
	{
		$string = urldecode($search_string);
		$data['search_result'] = $this->student_model->search_jobs_in_recruiter($string);
		$this->load->view('/student/jobopenings_search_view', $data);
	}
//load the recruiter profile view when student clicks on a company to view it
	public function recruiter_profile($recruiter_username = 'facebook')
	{
		$data['specific_recruiter'] = $this->student_model->get_specific_recruiter_info($recruiter_username);
		$data['student_info'] = $this->student_model->get_personal_info();
		$data['final_selected'] = $this->student_model->get_final_selected();
		
		if($this->student_model->check_already_applied($recruiter_username)){
			$data['applied'] = "Your have successfully applied for this opening!";
		} 
		$data['info'] = $this->student_model->student_navigation();
		$this->load->student_view_template('student/recruiter_profile_view', $data);
	}





//first check for correct recruiter username apply for a company
	public function submit_application($recruiter_username)
	{
		$check_recruiter_username = $this->student_model->correct_recruiter_username($recruiter_username);
		$check_if_already_applied = $this->student_model->check_already_applied($recruiter_username);
		$check_if_final_selected = $this->student_model->get_final_selected();
		$check_if_debarred = $this->_student_debarr_check();
		$student_eligibility = $this->_check_student_eligibility($recruiter_username);
		
		if($check_recruiter_username && !$check_if_already_applied && ($check_if_debarred ==false) && ($check_if_final_selected ==false) && ($student_eligibility == true)){
			$query = $this->student_model->enter_application($recruiter_username);
			if($query){
				$data['application_submitted'] = 'Your application has been successfully submitted!';
				$data['specific_recruiter'] = $this->student_model->get_specific_recruiter_info($recruiter_username);
				$data['student_info'] = $this->student_model->get_personal_info();
				if($this->student_model->check_already_applied($recruiter_username)){
					$data['applied'] = "Your have successfully applied for this opening!";
				} 
				$data['info'] = $this->student_model->student_navigation();
				$this->load->student_view_template('student/recruiter_profile_view', $data);
			}
		}
		elseif($check_if_debarred == true){
			echo '<script> alert("YOU HAVE BEEN DEBARRED! YOU CANNOT APPLY!")</script>';
			redirect('student/recruiter_profile/'.$recruiter_username, 'refresh');
		}
		elseif($check_if_already_applied){
			echo '<script> alert("YOU HAVE ALREADY APPLIED FOR THIS OPENING")</script>';
			redirect('student/recruiter_profile/'.$recruiter_username, 'refresh');
		}
		elseif($check_if_final_selected == true){
			echo '<script> alert("YOU HAVE ALREADY BEEN FINALLY SELECTED FOR A COMPANY")</script>';
			redirect('student/recruiter_profile/'.$recruiter_username, 'refresh');
		}
		elseif($student_eligibility == false){
			$data['student_eligible'] = '<script> alert("'.str_replace(array("\r","\n"), '\n', "ERROR! CHECK IF YOU ARE ELIGIBLE AND APPLY AGAIN!").'"); </script>';
			$data['specific_recruiter'] = $this->student_model->get_specific_recruiter_info($recruiter_username);
			$data['student_info'] = $this->student_model->get_personal_info();
			$data['info'] = $this->student_model->student_navigation();
			$this->load->student_view_template('student/recruiter_profile_view', $data);	
		}
		else{
			echo '<script>alert("ERROR! APPLY AGAIN CORRECTLY!")</script>';
			redirect('student/job_openings', 'refresh');
		}
	}

	//method to check for eligibility of the student in the backend
	public function _check_student_eligibility($recruiter_username)
	{
		$specific_recruiter_result = $this->student_model->get_specific_recruiter_info($recruiter_username);
		$student_info = $this->student_model->get_personal_info();

		if(isset($specific_recruiter_result) && !empty($specific_recruiter_result)):
			foreach($specific_recruiter_result as $row){
				$btech = $row['btech'];
				$btech_cutoff = $row['btech_cutoff'];
				$mtech = $row['mtech'];
				$mtech_cutoff = $row['mtech_cutoff'];
				$btech_branches = $row['btech_branches'];
				$btech_array = explode(",", $btech_branches);

				$mtech_branches = $row['mtech_branches'];
				$mtech_array = explode(",", $mtech_branches);


				foreach($student_info as $row2){
					$student_branch_btech = $row2['branchgrad'];
					$student_btech_aggregate = $row2['aggregategrad'];
					$student_branch_mtech = $row2['branchpg'];
					$student_mtech_aggregate = $row2['aggregatepg'];
				}

				if(strtotime($row['application_deadline'])>strtotime('now')){
			//check for btech students
					if(!empty($btech) && !empty($student_branch_btech) && empty($student_branch_mtech)){
						$x = 0;
					for($i=0;$i<16;$i++){ //iterating for 15 btech branches
						if(isset($btech_array[$i]) && ($btech_array[$i]==$student_branch_btech)){
							$x = $x + 1;
						}
						else{
							$x = $x + 0;
						}
					}
					if($x == 1){
						if(!empty($student_btech_aggregate)&&$student_btech_aggregate>=$btech_cutoff){
							return true;
						}
						else{
							return false;
						}
					}
					else{
						return false;
					}
				}
			//check for mtech students
				elseif(!empty($mtech) && !empty($student_branch_mtech)){
					$y = 0;
					for($j=0;$j<23;$j++){ //iterating for 23 mtech branches
						if(isset($mtech_array[$j]) && ($mtech_array[$j]==$student_branch_mtech)){
							$y = $y + 1;
						}
						else{
							$y = $y + 0;
						}
					}
					if($y == 1){
						if(!empty($student_mtech_aggregate)&&$student_mtech_aggregate>=$mtech_cutoff){
							return true;
						}
						else{
							return false;
						}
					}
					else{
						return false;
					}
				}
			//to print if job is not open for mtech
				elseif(empty($mtech) && !empty($student_branch_mtech)){
					return false;
				}
			//to print if job is not open for btech
				elseif(empty($btech) && !empty($student_branch_btech)){
					return false;
				}	
			}
			else{
				return false;
			}

		}
		endif;
	}








//load my applications view
	public function myapplications()
	{
		$data['myapplications'] = $this->student_model->get_applications_student();
		$data['info'] = $this->student_model->student_navigation();
		$this->load->student_view_template('student/myapplications_view', $data);
	}








//function to load profile personal info 
	public function personal_info()
	{
		$data['personal_info'] = $this->student_model->get_personal_info();
		$data['info'] = $this->student_model->student_navigation();
		$this->load->student_view_parse_template('student/profile/personal_view', $data);
	}
//add and edit personal info into the database
	public function change_personal_info()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('guardianname', 'Guardian Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('jobinterest', 'Job Interest', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('guardianmobile', 'Guardian Mobile', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('currentaddress', 'Current Address', 'trim|required');
		$this->form_validation->set_rules('permanentaddress', 'Permanent Address', 'trim|required');
		$this->form_validation->set_rules('sex', 'Sex', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('height', 'Height', 'trim|required');
		$this->form_validation->set_rules('weight', 'Weight', 'trim|required');
		$this->form_validation->set_rules('placeofbirth', 'Place of Birth', 'trim|required');
		$this->form_validation->set_rules('hometown', 'Hometown', 'trim|required');
		$this->form_validation->set_rules('homestate', 'Homestate', 'trim|required');
		$this->form_validation->set_rules('maritalstatus', 'Marital Status', 'trim|required');
		$this->form_validation->set_rules('citizenship', 'Citizenship', 'trim|required');
		$this->form_validation->set_rules('languages', 'Languages', 'trim|required');

		if($this->form_validation->run() == FALSE){
			$this->personal_info();
		}
		else{
			$query = $this->student_model->update_personal_info();
			$upload_photo = $this->_do_upload(); 
			if($query && $upload_photo){
				$data['profile_updated'] = "Your Profile & Photo has been updated!";
				$data['personal_info'] = $this->student_model->get_personal_info();
				$data['info'] = $this->student_model->student_navigation();
				$this->load->student_view_parse_template('student/profile/personal_view', $data);
			}
			elseif($query == true && $upload_photo == false){	
				$data['error_updating'] = "Profile Updated!";
				$data['personal_info'] = $this->student_model->get_personal_info();
				$data['info'] = $this->student_model->student_navigation();
				$this->load->student_view_parse_template('student/profile/personal_view', $data);
			}
			else{	
				$data['error_updating'] = "Photo and Profile not Updated!";
				$data['personal_info'] = $this->student_model->get_personal_info();
				$data['info'] = $this->student_model->student_navigation();
				$this->load->student_view_parse_template('student/profile/personal_view', $data);
			}
		}
	}
	//upload photo function
	public function _do_upload()
	{
		$config['upload_path']          = '/var/www/html/git-repos/rm_dtu/uploads/student_photos/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5120;
		$config['max_width']            = 500;
		$config['max_height']           = 500;

		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload('photo'))
		{
			$data = array('error' => $this->upload->display_errors());
			return false;
		}
		else
		{
			$file_name = $this->upload->data('file_name');
			$query = $this->student_model->upload_photo_path($file_name);
			if($query){
				$data = array('upload_data' => $this->upload->data());	
				return true;
			}	
		}
	}






//function for loading academic profile view
	public function academic_info()
	{
		$data['academic_info'] = $this->student_model->get_personal_info();
		$data['info'] = $this->student_model->student_navigation();
		$this->load->student_view_parse_template('student/profile/academic_view', $data);
	}
//edit and add academic info into the databse
	public function change_academic_info()
	{
		echo '<script>confirm("I hereby acknowledge that the information provided be me is correct to the best of my knowledge and I am solely responsible for any discrepency!")</script>';

		$this->load->library('form_validation');

		$this->form_validation->set_rules('resume_link', 'Resume Link', 'trim|required|regex_match[/^(https?:\/\/(www.)?drive.google.com)[^\n]*/]');
		$this->form_validation->set_rules('schoolname10', 'School Name', 'trim|required');
		$this->form_validation->set_rules('board10', 'Tenth Board', 'trim|required');
		$this->form_validation->set_rules('passingyear10', 'Year of Passing Tenth', 'trim|required');
		$this->form_validation->set_rules('aggregate10', 'Tenth Aggregate', 'trim|required');
		$this->form_validation->set_rules('subjects10', 'Tenth Subjects', 'trim|required');
		$this->form_validation->set_rules('schoolname12', 'Twelfth School Name', 'trim|required');
		$this->form_validation->set_rules('board12', 'Twelfth Board', 'trim|required');
		$this->form_validation->set_rules('passingyear12', 'Year of Passing Twelfth', 'trim|required');
		$this->form_validation->set_rules('aggregate12', 'Twelfth Aggregate', 'trim|required');
		$this->form_validation->set_rules('subjects12', 'Twelfth Subjects', 'trim|required');
		$this->form_validation->set_rules('entrance', 'Entrance Name', 'trim|required');
		$this->form_validation->set_rules('entrance_category', 'Category', 'trim|required');
		$this->form_validation->set_rules('rank', 'Rank', 'trim|required');
		$this->form_validation->set_rules('branchgrad', 'UG Branch', 'trim|required');
		$this->form_validation->set_rules('yearofgradgrad', 'UG Year of Graduation', 'trim|required');
		$this->form_validation->set_rules('sem1grad', 'UG Semester 1', 'trim|required');
		$this->form_validation->set_rules('sem2grad', 'UG Semester 2', 'trim|required');
		$this->form_validation->set_rules('sem3grad', 'UG Semester 3', 'trim|required');
		$this->form_validation->set_rules('sem4grad', 'UG Semester 4', 'trim|required');
		$this->form_validation->set_rules('sem5grad', 'UG Semester 5', 'trim|required');
		$this->form_validation->set_rules('sem6grad', 'UG Semester 6', 'trim|required');
		$this->form_validation->set_rules('sem7grad', 'UG Semester 7', 'trim');
		$this->form_validation->set_rules('sem8grad', 'UG Semester 8', 'trim');
		$this->form_validation->set_rules('aggregategrad', 'UG Aggregate', 'trim|required');
		$this->form_validation->set_rules('universitygrad', 'UG University', 'trim');
		$this->form_validation->set_rules('branchpg', 'PG Branch', 'trim');
		$this->form_validation->set_rules('sem1pg', 'PG Semester 1', 'trim');
		$this->form_validation->set_rules('sem2pg', 'PG Semester 2', 'trim');
		$this->form_validation->set_rules('sem3pg', 'PG Semester 3', 'trim');
		$this->form_validation->set_rules('sem4pg', 'PG Semester 4', 'trim');
		$this->form_validation->set_rules('yearofgradpg', 'PG Year of Graduation', 'trim');
		$this->form_validation->set_rules('aggregatepg', 'PG Aggregate', 'trim');
		$this->form_validation->set_rules('project', 'Projects', 'trim');
		$this->form_validation->set_rules('training', 'Training', 'trim');
		$this->form_validation->set_rules('work_experience', 'Work Experience', 'trim');
		$this->form_validation->set_rules('gapreason', 'Gap Reason', 'trim');
		$this->form_validation->set_rules('number_of_backlogs', 'Number of Backlogs', 'trim|required|numeric');
		$this->form_validation->set_rules('backlog_subjects', 'Backlog Subjects', 'trim');
		$this->form_validation->set_rules('backlogreason', 'Backlog Reason', 'trim');
		$this->form_validation->set_rules('tnc_declaration', 'Declaration', 'trim');

		if($this->form_validation->run() == FALSE){
			$this->academic_info();
		}	
		else{
			$query = $this->student_model->update_academic_info();
			$data['profile_updated'] = 'Your Profile has been Updated!';
			$data['academic_info'] = $this->student_model->get_personal_info();
			$data['info'] = $this->student_model->student_navigation();
			$this->load->student_view_parse_template('student/profile/academic_view', $data);
		}
	}






//load profile extras view
	public function extra_info()
	{
		$data['extra_info'] = $this->student_model->get_personal_info();
		$data['info'] = $this->student_model->student_navigation();
		$this->load->student_view_parse_template('student/profile/extra_view', $data);
	}
//edit and add extra info into the database
	public function change_extra_info()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('professional_societies', 'Professional Societies', 'trim|required|max_length[400]');
		$this->form_validation->set_rules('extra_curriculars', 'Extra Curriculars', 'trim');
		$this->form_validation->set_rules('career_objective', 'Career Objective', 'trim|required');
		$this->form_validation->set_rules('technical_skills', 'Technical Skills', 'trim|required|max_length[300]');
		$this->form_validation->set_rules('other_skills', 'Other Skills', 'trim|max_length[400]');
		$this->form_validation->set_rules('hobbies', 'Hobbies', 'trim|max_length[200]');

		if($this->form_validation->run() == FALSE){
			$this->extra_info();
		}
		else{
			$query = $this->student_model->update_extra_info();
			$data['profile_updated'] = 'Your Profile has been Updated!';
			$data['extra_info'] = $this->student_model->get_personal_info();
			$data['info'] = $this->student_model->student_navigation();
			$this->load->student_view_parse_template('student/profile/extra_view', $data);
		}
	}











	//function to load my account view 
	public function myaccount()
	{
		$data['info'] = $this->student_model->student_navigation();
		$this->load->student_view_template('student/profile/myaccount_view', $data);
	}
	//function to change password
	public function change_password()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|callback__check_database_password');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|matches[new_password]');

		if($this->form_validation->run() == FALSE){
			$this->myaccount();
		}
		else{
			$query = $this->student_model->change_student_password();
			if($query){
				$data['password_changed'] = "Your password has been changed!";
				$data['info'] = $this->student_model->student_navigation();
				$this->load->student_view_template('student/profile/myaccount_view', $data);
			}
		}

	}
	//function for checking databse and see if the old password provided matches
	public function _check_database_password($old_password)
	{
		$result = $this->student_model->check_student_password($old_password);
		if($result){
			return true;
		}
		else{

			$this->form_validation->set_message('_check_database_password', 'Please Enter Correct Old Password');
			return false;
		}
	}
	//security question change
	public function change_security_question()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('security_question', 'Security Question', 'trim|required');
		$this->form_validation->set_rules('security_answer', 'Security Answer', 'trim|required');

		if($this->form_validation->run()==FALSE){
			$this->myaccount();
		}
		else{
			$query = $this->student_model->change_security_question();
			if($query){
				$data['security_changed'] = "Your security question and answer has been changed!";
				$data['info'] = $this->student_model->student_navigation();
				$this->load->student_view_template('student/profile/myaccount_view', $data);
			}
		}
	}	

}