<?php


class Game extends CI_Controller {
    
	public function __construct(){
	    parent::__construct();    
	}
	
	function index(){
	}
	
	//We will have to change this later when we have a database with questions
	function submit_questions(){
	    $this->load->model('answer_model');
	    $return_array = $this->enter_chatroom();
	    $chatroom_id = $return_array[0];
	    $tokboxID = $return_array[1];
	    $data['tokboxID'] = $tokboxID;
	    $this->answer_model->insert_question($chatroom_id, 
	                                           $this->session->userdata('user_id'),  
	                                           'What is a fun activity you did last summer?', 
	                                           $this->input->post('answer1'));
   	    $this->answer_model->insert_question($chatroom_id, 
   	                                           $this->session->userdata('user_id'),  
   	                                           'How many siblings do you have?', 
   	                                           $this->input->post('answer2'));
	    $this->answer_model->insert_question($chatroom_id, 
	                                           $this->session->userdata('user_id'),  
	                                           'What is your favorite color?', 
	                                           $this->input->post('answer3'));

		$this->load->view('game_room', $data);
	}	
	
	function create_chatroom(){		
	    $this->load->model('chatroom_model');
	    $this->chatroom_model->create_chatroom();
	}
	
	function enter_chatroom(){
	    $chatroom_id;
	    $tokboxID;
	    $this->load->model('chatroom_model');
	    $current_chatroom = $this->chatroom_model->get_current_chatroom();
	    if($current_chatroom)
		{
			$data['id'] = $current_chatroom->id;
			$data['user_id'] = $this->session->userdata('user_id');
			$this->chatroom_model->add_user($data);
			$chatroom_id = $current_chatroom->id;
			$tokboxID = $current_chatroom->tokboxID;
		}
		else
		{
			$query = $this->chatroom_model->create_chatroom();
			$data['id'] = $query->id;
			$data['user_id'] = $this->session->userdata('user_id');
			$this->chatroom_model->add_user($data);
		    $chatroom_id = $query->id;
		    $tokboxID = $query->tokboxID;
		}
		return array($chatroom_id, $tokboxID );
	    
	}
	//Include a function where we always have a current chatroom
	//we keep adding users to that current chatroom until we reach 4 users
	//once we reach those users we generate another object.

}