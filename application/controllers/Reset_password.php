<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reset_password_model');
	}


	public function index()
	{
		if(!empty($this->input->post('reset_pass_roll_no')) && !empty($this->input->post('reset_pass_email'))):

			$this->load->library('form_validation');
			$this->form_validation->set_rules('reset_pass_roll_no', 'Roll Number', 'trim|required|callback__check_valid_roll');
			$this->form_validation->set_rules('reset_pass_email', 'Roll Number', 'trim|required|callback__check_valid_email');

			if($this->form_validation->run()==FALSE){
				$val_err = validation_errors();
				echo '<script> alert("'.str_replace(array("\r","\n"), '\n', strip_tags($val_err)).'"); </script>';
				redirect('/login', 'refresh');
			}
			else{
				$result1 = $this->reset_password_model->save_request_to_db();
				if($result1 == true):
					echo '<script>alert("Please Check Your Mailbox")</script>';
					redirect('/login', 'refresh');
				else:
					echo '<script>alert("Error! Try Again")</script>';
					redirect('/login', 'refresh');
				endif;
			}

		else:
			echo '<script>alert("Please Fill Valid Details!")</script>';
			redirect('/login', 'refresh');
		endif;	
	}


	//callback for rollnumber check
	function _check_valid_roll($username_roll='')
	{
		$result = $this->reset_password_model->check_roll_no($username_roll);

		if($result == true):
			return true;
		else:
			$this->form_validation->set_message('_check_valid_roll', 'Please Enter Valid Roll');
			return false;
		endif;
	}
	//callback for email related to the roll number check
	function _check_valid_email($email='')
	{
		$username_roll = $this->input->post('reset_pass_roll_no');

		$result = $this->reset_password_model->check_email_roll($username_roll, $email);

		if($result == true):
			return true;
		else:
			$this->form_validation->set_message('_check_valid_email', 'Please Enter Valid Email');
			return false;
		endif;
	}



	//after the user clicks on the reset link the following method is responsible
	function reset_old_password($one='', $two='', $three='')
	{
		$username_roll = urldecode($one);
		$email = urldecode($two);
		$hash = urldecode($three);

		$verify_hash = $this->reset_password_model->check_hash($username_roll,$email,$hash);

		if($verify_hash == false):
			echo '<script>alert("ERROR!")</script>';
			redirect('/login', 'refresh');
		else:
			$data = array(
				'username_roll' => $username_roll,
				'email' => $email,
				'hash' => $hash
				);
			$this->load->view('password_recovery/set_new_password_view', $data);
		endif;  
	}


	//this method is responsible for updating the new password after the check
	function update_new_password()
	{
		$username_roll = $this->input->post('username_roll', true);
		$email = $this->input->post('email', true);
		$hash = $this->input->post('hash', true);


		$verify_hash = $this->reset_password_model->check_hash($username_roll,$email,$hash);

		if($verify_hash == false):
			echo '<script>alert("ERROR!")</script>';
			redirect('/login', 'refresh');
		else:
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username_roll','Username Roll Number', 'trim|required');
			$this->form_validation->set_rules('hash', 'Hash', 'trim|required');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|matches[new_password]');

			if($this->form_validation->run() == false){
				$this->reset_old_password($username_roll, $email, $hash);
			}
			else{
				$result = $this->reset_password_model->update_password_in_db();
				if($result == true):
					echo '<script>alert("Password Updated! You can login now!")</script>';
					redirect('/login', 'refresh');
				else:
					echo '<script>alert("Error! Try Again!")</script>';
					redirect('/login', 'refresh');
				endif;
			}
		endif;
	}
}