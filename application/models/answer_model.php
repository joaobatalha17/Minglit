<?php
class Answer_model extends CI_Model {
    
    var $chatroom_id;
    var $user_id;
    var $question = '';
    var $answer = '';
    
    function __construct()
    {
        parent::__construct();
    }
	
	function insert_question($chatroom_id, $user_id,  $question, $answer)
	{
	    $this->chatroom_id = $chatroom_id;
	    $this->user_id = $user_id;
	    $this->question = $question;
	    $this->answer = $answer;
		$insert = $this->db->insert('answers', $this);
		return $insert;
	}
	
	function get_by_chatroom($chatroom_id){
	    $this->db->where('chatroom_id', $chatroom_id);
	    $query = $this->db->get('answers');
	    return $query->row_array();
	}
	
	function get_by_id($id){
	    $this->db->where('id', $id);
	    $query = $this->db->get('answers');
	    return $query;
	}
	
	function get_by_userid($user_id){
	    $this->db->where('user_id', $user_id);
	    $query = $this->db->get('answers');
	    return $query->row_array();
	}
}
