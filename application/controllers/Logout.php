<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller{

	public function index()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login/','refresh');
	}

	public function recruiter_logout()
	{
		$this->session->unset_userdata('is_logged_in');
		session_destroy();
		redirect('login/','refresh');
	}

	public function admin_logout()
	{
		$this->session->unset_userdata('admin_logged_in');
		session_destroy();
		redirect('admin/admin_login', 'refresh');
	}


	//intern logout methods are following
	public function intern_student_logout()
	{
		$this->session->unset_userdata('intern_student_is_logged_in');
		session_destroy();
		redirect('intern/intern_login/','refresh');
	}


	public function intern_recruiter_logout()
	{
		$this->session->unset_userdata('intern_recruiter_is_logged_in');
		session_destroy();
		redirect('intern/intern_login/','refresh');
	}

}