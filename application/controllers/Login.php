<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login_view');
	}

	
	//handle student login info
	public function student_login_handle()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('student_username_rollnumber', 'Student Username', 'trim|required');
		$this->form_validation->set_rules('student_password', 'Password', 'trim|required|callback__check_database');

		if($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$session_data['requested_url_student'] = $this->session->userdata('redirect_url_student');
			if(empty($session_data['requested_url_student'])){
				redirect('/student','refresh');	
			}
			else{
				redirect($session_data['requested_url_student'], 'refresh');
			}
			
		}
	}
	//check student database for password entered
	public function _check_database($password)
	{
		$student_username = $this->input->post('student_username_rollnumber', TRUE);

		$this->load->model('login_model');
		$result = $this->login_model->validate_student_login($student_username, $password);

		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row->id,
					'username' => $row->username_rollnumber
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		}
		else{
			$this->form_validation->set_message('_check_database', 'Invalid Roll Number/Password!');
			return false;
		}
	}




	//handle recruiter login
	public function recruiter_login_handle()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('recruiter_username', 'Recruiter Username', 'trim|required');
		$this->form_validation->set_rules('recruiter_password', 'Password', 'trim|required|callback__check_recruiter_database');

		if($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$session_data['requested_url_recruiter'] = $this->session->userdata('redirect_url_recruiter');
			if(empty($session_data['requested_url_recruiter'])){
				redirect('/recruiter','refresh');
			}
			else{
				redirect($session_data['requested_url_recruiter'], 'refresh');
			}
		}
	}
	//check recruiter database for password entered
	public function _check_recruiter_database($password)
	{
		$recruiter_username = $this->input->post('recruiter_username', TRUE);

		$this->load->model('login_model');
		$result = $this->login_model->validate_recruiter_login($recruiter_username, $password);

		if($result){
			$sess_array_2 = array();
			foreach($result as $row){
				$sess_array_2 = array(
						'id' => $row->id,
						'username' => $row->recruiter_username
					);
				$this->session->set_userdata('is_logged_in', $sess_array_2);
			}
			return true;
		}
		else{
			$this->form_validation->set_message('_check_recruiter_database', 'Invalid Recruiter Username or Password!');
			return false;
		}
	}

}
