<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern_recruiter extends CI_Controller{

	//parent function; check for session logged in or else redirect
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('intern_recruiter_is_logged_in')){
			$this->session->set_userdata('intern_redirect_url_recruiter', current_url());
			redirect('intern/intern_login','refresh');
		}
		else{
			$this->load->model('intern_models/intern_recruiter_model');
		}
	}

	
	//default function; load the post notifications view
	public function index()
	{
		$data['recruiter_info'] = $this->intern_recruiter_model->recruiter_navigation();	
		$this->load->intern_recruiter_view_template('intern/intern_recruiter/post_notifications_view', $data);
	}
	//post the notification posted by recruiter
	public function post_notifications_recruiter()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('summernote_content', 'Notification Content', 'trim|required');

		if($this->form_validation->run() == false):
			echo '<script> alert("'.str_replace(array("\r","\n"), '\n', strip_tags(validation_errors())).'"); </script>';
			redirect('intern/intern_recruiter/', 'refresh');
		else:
			$result = $this->intern_recruiter_model->insert_notification();
			if($result){
				echo '<script>alert("Your notification has been posted!")</script>';
				redirect('intern/intern_recruiter/', 'refresh');
			}
		endif;
	}



	//load the gonative iframe view for push notifications
	public function push_notifications()
	{
		$data['recruiter_info'] = $this->intern_recruiter_model->recruiter_navigation();
		$this->load->intern_recruiter_view_template('intern/intern_recruiter/push_notifications_view', $data);
	}



	//load the company info view 
	public function company_info_view()
	{
		$data['recruiter_info'] = $this->intern_recruiter_model->get_recruiter_info();
		$data['recruiter_info'] = $this->intern_recruiter_model->recruiter_navigation();	
		$this->load->intern_recruiter_view_parse_template('intern/intern_recruiter/company_info_view', $data);
	}
	//update the company and job info
	public function update_company_info()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('ctc', 'CTC', 'trim|required');
		$this->form_validation->set_rules('about_company', 'About Company', 'trim');
		$this->form_validation->set_rules('btech', 'BTech', 'trim');
		$this->form_validation->set_rules('btech_cutoff', 'BTech Cut-off', 'trim');
		$this->form_validation->set_rules('mtech', 'MTech', 'trim');
		$this->form_validation->set_rules('mtech_cutoff', 'MTech Cut-off', 'trim');
		$this->form_validation->set_rules('mba', 'MBA', 'trim');
		$this->form_validation->set_rules('mba_cutoff', 'MBA Cut-off', 'trim');
		$this->form_validation->set_rules('job_description', 'Job Description', 'trim');
		$this->form_validation->set_rules('location', 'Location', 'trim');
		$this->form_validation->set_rules('coordinator', 'Coordinator', 'trim');
		$this->form_validation->set_rules('date_of_visit', 'Date of Visit', 'trim|required');
		$this->form_validation->set_rules('application_deadline', 'Application Deadline', 'trim|required');
		$this->form_validation->set_rules('note', 'Note', 'trim');

		if($this->form_validation->run() == FALSE){
			$this->company_info_view();
		}
		else{
			$result = $this->intern_recruiter_model->update_company_info();
			if($result){
				echo '<script>alert("Company Info Updated!")</script>';
				redirect('intern/intern_recruiter/company_info_view', 'refresh');
			}
		}
	}




	//received applications load the view
	public function received_applications()
	{
		$data['applications_received'] = $this->intern_recruiter_model->get_received_applications();
		$data['recruiter_info'] = $this->intern_recruiter_model->recruiter_navigation();	
		$this->load->intern_recruiter_view_template('intern/intern_recruiter/received_applications_view', $data);
	}
	//update application status
	public function application_status()
	{
		$query = $this->intern_recruiter_model->update_application_status();
		if($query == true){
			echo '<script>alert("Application Statuses Updated!")</script>';
			redirect('intern/intern_recruiter/received_applications/','refresh');
		}
		else{
			echo '<script>alert("Nothing to Update!")</script>';
			redirect('intern/intern_recruiter/received_applications/','refresh');
		}
	}




	//load the final list of selected applicants view
    public function final_selected()
    {
    	$session_data = $this->session->userdata('intern_recruiter_is_logged_in');
    	$this->load->library('pagination');
    	$config['base_url'] = base_url('intern/intern_recruiter/final_selected');
    	$config['total_rows'] = $this->db->get_where('intern_applications', array('recruiter_username'=>$session_data['username'],'application_status'=>'Final Selection'))->num_rows();
    	$config['per_page'] = 40;
    	$config['num_links'] = 8;
    	$this->pagination->initialize($config);

    	$data['final_selections'] = $this->intern_recruiter_model->get_final_selected_applicants($config['per_page']);
    	$data['recruiter_info'] = $this->intern_recruiter_model->recruiter_navigation();
    	$this->load->intern_recruiter_view_template('intern/intern_recruiter/final_selected_view', $data);	
    }




    //function to load recruiter my account view 
    public function recruiter_myaccount()
    {
    	$data['recruiter_info'] = $this->intern_recruiter_model->recruiter_navigation();
    	$this->load->intern_recruiter_view_template('intern/intern_recruiter/recruiter_myaccount_view', $data);
    }
	//function to change password
    public function recruiter_change_password()
    {
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|callback__check_recruiter_database_password');
    	$this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
    	$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|matches[new_password]');

    	if($this->form_validation->run() == FALSE){
    		$this->recruiter_myaccount();
    	}
    	else{
    		$query = $this->intern_recruiter_model->change_recruiter_password();
    		if($query){
    			echo '<script>alert("Your password was changed successfully!")</script>';
    			redirect('intern/intern_recruiter/recruiter_myaccount','refresh');
    		}
    	}

    }
	//function for checking databse and see if the old password provided matches
    public function _check_recruiter_database_password($old_password)
    {
    	$result = $this->intern_recruiter_model->check_recruiter_password($old_password);
    	if($result){
    		return true;
    	}
    	else{

    		$this->form_validation->set_message('_check_recruiter_database_password', 'Please Enter Correct Old Password');
    		return false;
    	}
    }
	//security question change
    public function recruiter_change_security_question()
    {
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('security_question', 'Security Question', 'trim|required');
    	$this->form_validation->set_rules('security_answer', 'Security Answer', 'trim|required');

    	if($this->form_validation->run()==FALSE){
    		$this->recruiter_myaccount();
    	}
    	else{
    		$query = $this->intern_recruiter_model->change_recruiter_security_question();
    		if($query){
    			echo '<script>alert("Your security question and answer has been changed!")</script>';
    			redirect('intern/intern_recruiter/recruiter_myaccount','refresh');
    		}
    	}
    }



}