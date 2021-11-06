<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_debarred extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			$this->session->set_userdata('redirect_url_student', current_url());
			redirect('/login','refresh');
		}
		elseif($this->session->userdata('logged_in') && $this->_student_debarr_check2() == false){
			redirect('student/', 'refresh');
		}
		else{
			$this->load->model('student_model');
		}
	}


	//check if student is debarred
	function _student_debarr_check2(){
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
		$config['base_url'] = base_url().'student_debarred/index/';
		$config['total_rows'] = $this->db->get('notifications')->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$data['notifications'] = $this->student_model->get_notifications($config['per_page']);
		$data['info'] = $this->student_model->student_navigation();
		$data['debarred'] = "You Have Been Debarred!";
		$this->load->student_view_template('student/notifications_view', $data);
	}

}