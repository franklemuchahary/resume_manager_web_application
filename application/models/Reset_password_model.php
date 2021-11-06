<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password_model extends CI_Model{

	public function check_roll_no($username_roll)
	{
		$this->db->select('username_rollnumber, email');
		$this->db->from('student_personal');
		$this->db->where('username_rollnumber', $username_roll);
		$query = $this->db->get();

		if($query->num_rows()!= 1):
			return false;
		else:
			return true;
		endif;
	}



	public function check_email_roll($username_roll, $email)
	{
		$this->db->select('username_rollnumber, email');
		$this->db->from('student_personal');
		$this->db->where('username_rollnumber', $username_roll);
		$this->db->where('email', $email);
		$query = $this->db->get();

		if($query->num_rows() !== 1):
			return false;
		else:
			return true;
		endif;
	}


	public function save_request_to_db()
	{
		$rdm_str = rand(100,10000).rand(100,10000).rand(100,10000);
		$hash = password_hash($rdm_str, PASSWORD_BCRYPT);

		$username_roll = $this->input->post('reset_pass_roll_no');
		$email = $this->input->post('reset_pass_email');

		$data_to_insert = array(
				'username_roll' => $username_roll,
				'email' => $email,
				'hash' => $hash
			);

		$this->db->trans_start();
		$query = $this->db->insert('password_recovery', $data_to_insert);
		$this->db->trans_complete();

		$send_mail = $this->send_recovery_email($username_roll, $email, $hash);

		if($this->db->trans_status() === FALSE):
			return false;
		elseif($send_mail == false):
			return false;
		else:
			return true;
		endif;
	}


	//send the recovery email
	private function send_recovery_email($username_roll, $email, $hash)
	{
		$this->load->library('My_PHPMailer');
		$mail = new PHPMailer();
        $mail->IsSMTP(); //to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "password_reset_email_sender@resumemanager.com";  // user email address
        $mail->Password   = "";            // password in GMail
        $mail->SetFrom('password_reset_email_sender@resumemanager.com', 'Password Recovery RM DTU');  //Who is sending the email
        //$mail->AddReplyTo("response@yourdomain.com","Firstname Lastname");  //email address that receives the response
        $mail->isHTML(true);
        $mail->Subject    = "Request for Password Recovery RM DTU";
        $mail->Body      = '
        	<html>
        	<head>
        		<title>Password Recovery RM DTU 2016</title>
        	</head>
        	<body>
        	<h3>Request for Password Recovery RM DTU 2016-17</h3>
        	<p>Your request for password recovery has been processed!</p><br>
        	<p>Click on the link below to change your password: </p><br>
        	<a href="'.base_url().'reset_password/reset_old_password/'.urlencode($username_roll).'/'.urlencode($email).'/'.urlencode($hash).'">Change Password</a><br><br><br><br>
        	<p>With Regards</p>
        	<p>Training and Placement Cell, DTU, 2016-17</p>
        	</body>
        	</html>
        ';
        $destino = $email; // Who the email is adressed to
        $mail->AddAddress($destino, "RM DTU");
        if(!$mail->Send()) {
            return false;
        } else {
            return true;
        }
	}



	//the following methods are responsible for resetting the password securely
	public function check_hash($username_roll,$email,$hash)
	{
		$this->db->select('username_roll, email');
		$this->db->from('password_recovery');
		$this->db->where('username_roll', $username_roll);
		$this->db->where('email', $email);
		$this->db->where('hash', $hash);
		$query = $this->db->get();

		if($query->num_rows() != 1):
			return false;
		else:
			return true;
		endif;
	}

	function update_password_in_db()
	{
		$data_to_update = array('password' => md5($this->input->post('new_password', true)));

		$this->db->trans_start();
		$this->db->where('username_rollnumber', $this->input->post('username_roll', true));
		$this->db->where('email', $this->input->post('email', true));
		$query = $this->db->update('student_personal', $data_to_update);
		$this->db->trans_complete();

		$query2 = $this->remove_hash_after_pass_change();

		if($this->db->trans_status() === FALSE && $query2 == false):
			return false;
		else:
			return true;
		endif;
	}
	//for future debugging purpose to check if the password was really changed. developer purpose only
	function remove_hash_after_pass_change()
	{
		$data_to_update = array('hash'=> NULL);

		$this->db->trans_start();
		$this->db->where('username_roll', $this->input->post('username_roll', true));
		$this->db->where('email', $this->input->post('email', true));
		$this->db->where('hash', $this->input->post('hash', true));
		$query = $this->db->update('password_recovery', $data_to_update);
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE):
			return false;
		else:
			return true;
		endif;
	}

}