<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller{
	/**
	 * This is the main class for the admin panel.
	 *
	 * Maps to the following url
	 *	http://example.com/admin/admin_login/
	 *
	 * This is not the default controller.
	 *
	 * The first method will give out the admin login page at the previously mentioned url
	 */


	public function index()
	{
		$this->load->view('admin/admin_login_view');
	}



	//this method will handle the admin logins
	public function admin_login_handle()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('admin_username', 'Admin Username', 'trim|required');
		$this->form_validation->set_rules('admin_password', 'Admin Password', 'trim|required|callback__check_admin_password');

		if($this->form_validation->run() == FALSE):
			$this->index();
		else:
			$session_data['requested_url_admin'] = $this->session->userdata('redirect_url_admin');
			if(empty($session_data['requested_url_admin'])){
				redirect('/admin/admin_main','refresh');	
			}
			else{
				redirect($session_data['requested_url_admin'], 'refresh');
			}
		endif;
	}


	public function _check_admin_password($password)
	{
		$admin_username = $this->input->post('admin_username', true);

		$this->load->model('admin_models/admin_login_model');
		$result = $this->admin_login_model->validate_admin_login($admin_username, $password);

		if($result):
			$sess_array_3 = array();
			foreach($result as $row){
				$sess_array_3 = array(
						'user_ip' => $_SERVER['REMOTE_ADDR'],
						'username' => $row->admin_username,
						'admin_name' => $row->admin_name
					);
				$this->session->set_userdata('admin_logged_in', $sess_array_3);
			}
			return true;
		else:
			$this->form_validation->set_message('_check_admin_password', 'Invalid Username or Password');
			return false;
		endif;
	}

}	