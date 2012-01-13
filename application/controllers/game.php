<?php
include('chatroom_model.php');
include('game_logic.php');

class Game extends CI_Controller {
    
    public $chatroom_size = 2;
	public static $current_chatroom;
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
	
	function enter_chatroom(){
	    //self::$current_chatroom->add_user($this->session->userdata('email_address'));
	    //if(self::$current_chatroom->get_usercount() >= $this->chatroom_size){
	    //$data['users'] = self::$current_chatroom->get_users();
	    $data['count'] = Game_logic::increment();
	    //self::$current_chatroom = new Chatroom_model();
	    $this->load->view('chatroom', $data);
	        
	        

	    //}
	    
	}
	//Include a function where we always have a current chatroom
	//we keep adding users to that current chatroom until we reach 4 users
	//once we reach those users we generate another object.

}