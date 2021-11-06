<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* This is the admin controller for admin responsible for most of the admin functions
*	
* The url to access this is: http://example.com/admin/admin_intern/
*
* This page will be password protected
*/

class Admin_intern extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in')){
			$this->session->set_userdata('redirect_url_admin', current_url());
			redirect('admin/admin_login','refresh');
		}
		elseif($this->session->userdata('admin_logged_in') && $this->_check_if_intern() == false){
			redirect('admin/admin_main','refresh');
		}
		else{
			$this->load->model('admin_models/admin_intern_model');
		}
	}


	function _check_if_intern()
	{
		$this->load->model('admin_models/admin_intern_model');
		if($this->admin_intern_model->intern_admin_logged() == true):
			return true;
		else:
			return false;
		endif;
	}


	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/admin_intern/index/';
		$config['total_rows'] = $this->db->get('intern_notifications')->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$data['notifications'] = $this->admin_intern_model->get_all_notifications($config['per_page']);
		$this->load->intern_admin_view_template('intern/intern_admin/intern_admin_view_rem_notif_view', $data);
	}


	//this method is for deleting unwanted notifications
	public function delete_notifications($id, $recruiter_username)
	{
		$result = $this->admin_intern_model->delete_notifications($id, $recruiter_username);
		if($result):
			echo '<script> alert("Notification Deleted!"); </script>';
			redirect('admin/admin_intern/', 'refresh');
		else:
			redirect('admin/admin_intern/', 'refresh');
		endif;
	}


	//this method is for loading the post notifications view
	public function admin_add_notif()
	{
		$this->load->intern_admin_view_template('intern/intern_admin/intern_admin_post_notifications_view');
	}


	//this method is for adding new notifications
	public function admin_add_new_notif()
	{
		$result = $this->admin_intern_model->admin_post_notifications();

		if($result):
			echo '<script> alert("Notification Posted!"); </script>';
			redirect('admin/admin_intern/', 'refresh');
		else:
			redirect('admin/admin_intern/admin_add_notif', 'refresh');
		endif;
	}



	//this method is for loading the add recruiter view
	public function add_recruiter()
	{
		$this->load->intern_admin_view_template('intern/intern_admin/intern_admin_add_recruiter_view');
	}


	//this method adds the new recruiter to the database
	public function make_new_recruiter()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('recruiter_username', 'Recruiter Username', 'trim|required|callback__check_unique_rec_username');
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('coordinator', 'Coordinator', 'trim|required');
		$this->form_validation->set_rules('coordinator_mobile', 'Coordinator Mobile', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('confirm_password', 'Re-enter Password', 'trim|required|matches[password]');

		if($this->form_validation->run() == false):
			$this->add_recruiter();
		else:
			$result = $this->admin_intern_model->create_new_recruiter();
			if($result){
				echo '<script> alert("Intern Recruiter Created!"); </script>';
				redirect('admin/admin_intern/add_recruiter', 'refresh');
			}
			else{
				echo '<script> alert("Error Creating Intern Recruiter!"); </script>';
				redirect('admin/admin_intern/add_recruiter', 'refresh');
			}
		endif;

	}
	//check if the recruiter username is being repeated
	public function _check_unique_rec_username($recruiter_username)
	{
		$username_available = $this->admin_intern_model->check_if_rec_username_available($recruiter_username);

		if($username_available == FALSE):
			$this->form_validation->set_message('_check_unique_rec_username', 'Username Already In Use!');
			return FALSE;
		else:
			return TRUE;
		endif;
	}





	//this method is for loading the add debarr student view
	public function debarr_student()
	{
		$data['debarred_students'] = $this->admin_intern_model->get_debarred_students();
		$this->load->intern_admin_view_template('intern/intern_admin/intern_admin_debarr_view', $data);
	}

	//this handles the roll number to be debarred
	public function debarr_roll_number()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('debarr_roll_no', 'Roll Number', 'trim|required');

		if($this->form_validation->run() == false):
			$this->debarr_student();
		else:
			$result = $this->admin_intern_model->debarr_student_roll_no();
			echo '<script> alert("Debarred Successfully!"); </script>';
			redirect('admin/admin_intern/debarr_student', 'refresh');
		endif;
	}

	//this method undebarrs a debarred student
	public function undebarr_student()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('undebarr_roll_no[]', 'Debarred Roll Number', 'trim|required');

		if($this->form_validation->run() == false):
			$this->debarr_student();
		else:
			$this->admin_intern_model->undebarr_student_roll();
			echo '<script> alert("Undebarred Successfully!"); </script>';
			redirect('admin/admin_intern/debarr_student', 'refresh');
		endif;
	} 




	//create a new student account
	public function create_new_student_account()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username_rollnumber', 'Username/Roll Number', 'trim|required|callback__check_unique_student_roll');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('student_course', 'Student Course', 'trim|required');

		if($this->form_validation->run() == false):
			$this->add_recruiter();
		else:
			$result = $this->admin_intern_model->create_student_account();
			if($result){
				echo '<script> alert("Student Account Created!"); </script>';
				redirect('admin/admin_intern/add_recruiter', 'refresh');
			}
			else{
				echo '<script> alert("Error Creating Account!"); </script>';
				redirect('admin/admin_intern/add_recruiter', 'refresh');	
			}
		endif;
	}

	//check if the roll_number/username entered is unique
	public function _check_unique_student_roll($username_rollnumber)
	{
		$username_roll_unique = $this->admin_intern_model->username_rollnumber_check($username_rollnumber);

		if($username_roll_unique == FALSE):
			$this->form_validation->set_message('_check_unique_student_roll', 'RollNumber Already in Use!');
			return false;
		else:
			return true;
		endif;
	}





	//load the search recruiters view
	public function admin_search_recruiter()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/admin_intern/admin_search_recruiter/');
		$config['total_rows'] = $this->db->get('intern_recruiter')->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$uri_segment = 4;

		$this->load->model('intern_models/intern_student_model');
		$data['recruiter_info'] = $this->intern_student_model->get_recruiter_info($config['per_page'], $uri_segment);
		$this->load->intern_admin_view_template('intern/intern_admin/intern_admin_search_recruiter_view', $data);
	}
	//ajax search for recruiters/job openings
	public function search_recruiter($search_string = '')
	{
		$string = urldecode($search_string);
		$this->load->model('intern_models/intern_student_model');
		$data['search_result'] = $this->intern_student_model->search_jobs_in_recruiter($string);
		$this->load->view('intern/intern_admin/search_result_views/intern_admin_search_recruiters_result_view', $data);
	}
	//show recruiter received applications and recruiter info 
	public function recruiter_profile_applications($recruiter_username = 'facebook')
	{
		$this->load->model('intern_models/intern_student_model');
		$data['recruiter_info'] = $this->intern_student_model->get_specific_recruiter_info($recruiter_username);
		$data['applications_info'] = $this->admin_intern_model->get_specific_recruiter_applications($recruiter_username);
		$this->load->intern_admin_view_template('intern/intern_admin/intern_admin_recruiter_info_applic_view', $data);
	}
	



	//this method loads the search students view
	public function admin_search_students()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/admin_intern/admin_search_students');
		$config['total_rows'] = $this->db->get('intern_student')->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$this->load->model('admin_intern_model');
		$data['student_info'] = $this->admin_intern_model->get_student_info($config['per_page']);
		$this->load->intern_admin_view_template('intern/intern_admin/intern_admin_search_students_view', $data);
	}
	//search students admin
	public function search_students($search_string = '')
	{
		$string = urldecode($search_string);
		$data['student_search_result'] = $this->admin_intern_model->search_students_admin($string);
		$this->load->view('intern/intern_admin/search_result_views/intern_students_search_result_view', $data);
	}



	//this method gets all the received applications till date and prints them
	public function admin_get_all_applications()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/admin_intern/admin_get_all_applications');
		$config['total_rows'] = $this->db->get('intern_applications')->num_rows();
		$config['per_page'] = 1;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$this->load->model('admin_intern_model');
		$data['applications_info'] = $this->admin_intern_model->get_all_received_applications($config['per_page']);
		$this->load->intern_admin_view_template('intern/intern_admin/intern_admin_all_applications_view', $data);

	}

	//search students admin
	public function all_applications_search($search_string = '')
	{
		$string = urldecode($search_string);
		$data['applications_search_result'] = $this->admin_intern_model->search_all_applications($string);
		$this->load->view('intern/intern_admin/search_result_views/intern_all_applications_search_result_view', $data);
	}

}