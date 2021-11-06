<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern_student_debarred extends CI_controller{

	//parent function construct; check for session logged in and load student model by default and also the navigation views
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('intern_student_is_logged_in')){
			$this->session->set_userdata('intern_redirect_url_student', current_url());
			redirect('intern/intern_login','refresh');
		}
		elseif($this->session->userdata('intern_student_is_logged_in') && $this->_student_debarr_check2() == false){
			redirect('intern/intern_student/', 'refresh');
		}
		else{
			$this->load->model('intern_models/intern_student_model');
		}
	}

	//check if student is debarred
	function _student_debarr_check2(){
		$this->load->model('intern_models/intern_student_model');
		if($this->intern_student_model->student_debarred()==true):
			return true;
		else:
			return false;
		endif;
	}

	
	

	//default function to run and default view to load; the notifications view
	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'intern/intern_student_debarred/index/';
		$config['total_rows'] = $this->db->get('intern_notifications')->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$data['notifications'] = $this->intern_student_model->get_notifications($config['per_page']);
		$data['info'] = $this->intern_student_model->student_navigation();
		$data['debarred'] = "You Have Been Debarred!";
		$this->load->intern_student_view_template('intern/intern_student/notifications_view', $data);
	}
}