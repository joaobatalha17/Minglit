<?php

class Login extends CI_Controller {
	
	function index()
	{
		$this->load->view('login_form');		
	}
	
	function give_question(){
		echo "hellow there";
		/*
		$item = trim($this->input->post('item'));
		$array = array('result' => $item);
		echo json_encode($array);*/
	}
	
	function validate_credentials()
	{		
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		
		if($query[0])
		{
			$data = array(
				'email_address' => $this->input->post('email_address'),
				'user_id' => $query[1],
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('site/members_area');
		}
		else // incorrect email or password
		{
			$this->index(); // load login form again
		}
	}	
	
	function signup()
	{
		$this->load->view('signup_form');
	}
	
	
	function give_question(){
	    $item = ($this->input->post('item'));
	    $array = array('result' => $item);
	    echo json_encode($array);
	}
	
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{   
				$this->load->view('questions_form');
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}