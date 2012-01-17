<?php

require_once('application/tokbox_SDK/API_Config.php');
require_once('application/tokbox_SDK/OpenTokSDK.php');
require_once('application/tokbox_SDK/SessionPropertyConstants.php');

class Chatroom_model extends CI_Model {
    


    var $apiObj;
    var $session;
    var $sessionId;
    
    var $status = 'FILLING';
    var $usercount = 0;
    var $tokboxID = 0;
    var $user_0 = 0;
    var $user_1 = 0;
    var $user_2 = 0;
    var $user_3 = 0;
    
    //var $question_0 = '';
    //var $question_1 = '';
    //var $question_2 = '';
    //var $question_in_use = '';
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->apiObj =  new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
        $this->session = $this->apiObj->create_session($_SERVER["REMOTE_ADDR"]); 
        $this->sessionId = substr($this->session->getSessionId()->asXML(), 12 , -13);
    }
	
	function create_chatroom() //Hacky As Fuck (HAF)
	{
	    $this->tokboxID = $this->sessionId; 	    
	    $data = array( 'status' => $this->status,
	                    'usercount' => $this->usercount,
	                    'tokboxID' => $this->sessionId,
	                    'user_0' => $this->user_0,
	                    'user_1' => $this->user_1,
	                    'user_2' => $this->user_2,
	                    'user_3' => $this->user_3
	                 );
		$insert = $this->db->insert('chatrooms', $data);
		return $insert;
	}
	
	function get_current_chatroom(){
	    $this->db->where('status', 'FILLING');
	    $query = $this->db->get('chatrooms',1);
	    return $query->row();
	}
	
	//Adds user to a chatroom that is still not completely filled up
	function add_user($arr){
	    $query = $this->db->get_where('chatrooms', array('id' => $arr['id']), 1);
	    
	    if($query->num_rows == 1)
		{
		    $row = $query->row();
		    $count = $row->usercount;
		    if($count + 1 == 4){ // The chatroom just got full. Create a new one and put the user in it
		        $data = array('user_'. $count => $arr['user_id'],
        	                  'usercount' => $row->usercount + 1,
        	                  'status' => 'FULL'    
        	                 );
        	    $this->db->where('id' , $arr['id'] );
        	    $result = $this->db->update('chatrooms', $data);
        	    return $result;
		    } else {
		        $data = array('user_'. $count => $arr['user_id'],
        	                  'usercount' => $row->usercount + 1    
        	                 );
        	    $this->db->where('id' , $arr['id'] );
        	    $result = $this->db->update('chatrooms', $data);
        	    return $result; 
		        
		    }
		}	    
	}
}