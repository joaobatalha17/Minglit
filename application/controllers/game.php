<?php


class Game extends CI_Controller {
    
    public $chatroom_size = 2;
	public $count = 0;
	public $game_logic;
	
	public function __construct(){
	    parent::__construct();
	    $this->chatroom_size = 2;
	    
	}
	
	function index(){
		
	}
	
	function submit_questions(){		
	    
		redirect('site/chatroom_area');
	}	
	
	function create_chatroom(){		
	    $this->load->model('chatroom_model');
	    $this->chatroom_model->create_chatroom();
	}
	
	function enter_chatroom(){
	    
	    $this->load->model('chatroom_model');
	    $current_chatroom = $this->chatroom_model->get_current_chatroom();
	    if($current_chatroom)
		{
			$data['id'] = $current_chatroom->id;
			$data['email_address'] = $this->session->userdata('email_address');
			$this->chatroom_model->add_user($data);
			
		}
		else
		{
			$query = $this->chatroom_model->create_chatroom();
			
			$data['id'] = $query['id'];
			$data['email'] = $this->session->userdata('email');
			$this->chatroom_model->add_user($data);
						
		}
	    
	    
	    //self::$current_chatroom->add_user($this->session->userdata('email_address'));
	    //if(self::$current_chatroom->get_usercount() >= $this->chatroom_size){
	    //$data['users'] = self::$current_chatroom->get_users();
	    //$data['count'] = Game_logic::increment();
	    //self::$current_chatroom = new Chatroom_model();
	    //$this->load->view('chatroom', $data);
	        
	        

	    //}
	    
	}
	//Include a function where we always have a current chatroom
	//we keep adding users to that current chatroom until we reach 4 users
	//once we reach those users we generate another object.

}