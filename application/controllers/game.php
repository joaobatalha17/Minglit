<?php

class Game extends CI_Controller {
    
    //create variable for the number of active chatrooms
	
	function index()
	{
		//$data['main_content'] = 'login_form';
		//$this->load->view('includes/template', $data);		
	}
	
	function submit_questions()
	{		
		redirect('site/chatroom_area');
	}	
	
	//Include a function where we always have a current chatroom
	//we keep adding users to that current chatroom until we reach 4 users
	//once we reach those users we generate another object.

}