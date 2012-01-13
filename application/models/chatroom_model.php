<?php
class Chatroom_model extends CI_Model {
    
    
    var $status = 'FILLING';
    var $usercount = 0;
    var $tokboxID = 0;
    var $user_0 = '';
    var $user_1 = '';
    var $user_2 = '';
    var $user_3 = '';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function create_chatroom()
	{
		$insert = $this->db->insert('chatrooms', $this);
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
			$data = array('user_'. $count => $arr['email_address'],
    	                  'usercount' => $row->usercount + 1    
    	                 );
    	    $this->db->where('id' , $arr['id'] );
    	    $result = $this->db->update('chatrooms', $data);
    	    return $result;
		}

	    
	    
	}
}