<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_loader{

	/*
	 *	written to minimise redundancy in loading the views
	 *  first method is to load all the student views: student_view_template
	 *	second method is to parse all the student views where parse library is used: student_view_parse_template
	 *  third method is to load all the recruiter views: recruiter_view_template
	 *	fourth method is to parse all the recruiter views where parse library is used: recruiter_view_parse_template
	*/
	public function student_view_template($template_name, $vars = array(), $return=FALSE)
	{
		if($return):
			$content = $this->view('partials/header_view', $vars, $return);
			$content .= $this->view('partials/student_navigation_view', $vars, $return);
			$content .= $this->view($template_name, $vars, $return);
			$content .= $this->view('partials/footer_view', $vars, $return);

			return $content;
		else:
			$this->view('partials/header_view', $vars);
			$this->view('partials/student_navigation_view', $vars);
			$this->view($template_name, $vars);
			$this->view('partials/footer_view', $vars);
		endif;
	}


	public function student_view_parse_template($template_name, $vars = array(), $return=FALSE)
	{
		$this->library('parser');
		if($return):
			$content = $this->view('partials/header_view', $vars, $return);
			$content .= $this->view('partials/student_navigation_view', $vars, $return);
			$content .= $this->parser->parse($template_name, $vars, $return);
			$content .= $this->view('partials/footer_view', $vars, $return);

			return $content;
		else:
			$this->view('partials/header_view', $vars);
			$this->view('partials/student_navigation_view', $vars);
			$this->parser->parse($template_name, $vars);
			$this->view('partials/footer_view', $vars);
		endif;
	}


	public function recruiter_view_template($template_name, $vars = array(), $return=FALSE)
	{
		if($return):
			$content = $this->view('partials/recruiter_header_view', $vars, $return);
			$content .= $this->view('partials/recruiter_navigation_view', $vars, $return);
			$content .= $this->view($template_name, $vars, $return);
			$content .= $this->view('partials/recruiter_footer_view', $vars, $return);

			return $content;
		else:
			$this->view('partials/recruiter_header_view', $vars);
			$this->view('partials/recruiter_navigation_view', $vars);
			$this->view($template_name, $vars);
			$this->view('partials/recruiter_footer_view', $vars);
		endif;
	}

	public function recruiter_view_parse_template($template_name, $vars = array(), $return=FALSE)
	{
		$this->library('parser');
		if($return):
			$content = $this->view('partials/recruiter_header_view', $vars, $return);
			$content .= $this->view('partials/recruiter_navigation_view', $vars, $return);
			$content .= $this->parser->parse($template_name, $vars, $return);
			$content .= $this->view('partials/recruiter_footer_view', $vars, $return);

			return $content;
		else:
			$this->view('partials/recruiter_header_view', $vars);
			$this->view('partials/recruiter_navigation_view', $vars);
			$this->parser->parse($template_name, $vars);
			$this->view('partials/recruiter_footer_view', $vars);
		endif;
	}


	public function admin_view_template($template_name, $vars = array(), $return=FALSE)
	{
		if($return):
			$content = $this->view('admin/partials/admin_header_view', $vars, $return);
			$content .= $this->view('admin/partials/admin_navigation_view', $vars, $return);
			$content .= $this->view($template_name, $vars, $return);
			$content .= $this->view('admin/partials/admin_footer_view', $vars, $return);
			
			return $content;
		else:
			$this->view('admin/partials/admin_header_view', $vars);
			$this->view('admin/partials/admin_navigation_view', $vars);
			$this->view($template_name, $vars);
			$this->view('admin/partials/admin_footer_view', $vars);
		endif;

	}


	public function intern_admin_view_template($template_name, $vars = array(), $return=FALSE)
	{
		if($return):
			$content = $this->view('intern/intern_admin/partials/intern_admin_header_view', $vars, $return);
			$content .= $this->view('intern/intern_admin/partials/intern_admin_navigation_view', $vars, $return);
			$content .= $this->view($template_name, $vars, $return);
			$content .= $this->view('intern/intern_admin/partials/intern_admin_footer_view', $vars, $return);
			
			return $content;
		else:
			$this->view('intern/intern_admin/partials/intern_admin_header_view', $vars);
			$this->view('intern/intern_admin/partials/intern_admin_navigation_view', $vars);
			$this->view($template_name, $vars);
			$this->view('intern/intern_admin/partials/intern_admin_footer_view', $vars);
		endif;

	}



	/* intern view loads starts here*/

	public function intern_student_view_template($template_name, $vars = array(), $return=FALSE)
	{
		if($return):
			$content = $this->view('intern/intern_partials/header_view', $vars, $return);
			$content .= $this->view('intern/intern_partials/student_navigation_view', $vars, $return);
			$content .= $this->view($template_name, $vars, $return);
			$content .= $this->view('intern/intern_partials/footer_view', $vars, $return);

			return $content;
		else:
			$this->view('intern/intern_partials/header_view', $vars);
			$this->view('intern/intern_partials/student_navigation_view', $vars);
			$this->view($template_name, $vars);
			$this->view('intern/intern_partials/footer_view', $vars);
		endif;
	}


	public function intern_student_view_parse_template($template_name, $vars = array(), $return=FALSE)
	{
		$this->library('parser');
		if($return):
			$content = $this->view('intern/intern_partials/header_view', $vars, $return);
			$content .= $this->view('intern/intern_partials/student_navigation_view', $vars, $return);
			$content .= $this->parser->parse($template_name, $vars, $return);
			$content .= $this->view('intern/intern_partials/footer_view', $vars, $return);

			return $content;
		else:
			$this->view('intern/intern_partials/header_view', $vars);
			$this->view('intern/intern_partials/student_navigation_view', $vars);
			$this->parser->parse($template_name, $vars);
			$this->view('intern/intern_partials/footer_view', $vars);
		endif;
	}


	public function intern_recruiter_view_template($template_name, $vars = array(), $return=FALSE)
	{
		if($return):
			$content = $this->view('intern/intern_partials/recruiter_header_view', $vars, $return);
			$content .= $this->view('intern/intern_partials/recruiter_navigation_view', $vars, $return);
			$content .= $this->view($template_name, $vars, $return);
			$content .= $this->view('intern/intern_partials/recruiter_footer_view', $vars, $return);

			return $content;
		else:
			$this->view('intern/intern_partials/recruiter_header_view', $vars);
			$this->view('intern/intern_partials/recruiter_navigation_view', $vars);
			$this->view($template_name, $vars);
			$this->view('intern/intern_partials/recruiter_footer_view', $vars);
		endif;
	}

	public function intern_recruiter_view_parse_template($template_name, $vars = array(), $return=FALSE)
	{
		$this->library('parser');
		if($return):
			$content = $this->view('intern/intern_partials/recruiter_header_view', $vars, $return);
			$content .= $this->view('intern/intern_partials/recruiter_navigation_view', $vars, $return);
			$content .= $this->parser->parse($template_name, $vars, $return);
			$content .= $this->view('intern/intern_partials/recruiter_footer_view', $vars, $return);

			return $content;
		else:
			$this->view('intern/intern_partials/recruiter_header_view', $vars);
			$this->view('intern/intern_partials/recruiter_navigation_view', $vars);
			$this->parser->parse($template_name, $vars);
			$this->view('intern/intern_partials/recruiter_footer_view', $vars);
		endif;
	}

}