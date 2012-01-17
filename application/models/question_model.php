<?php
class Question_model extends CI_Model {
    
    var id_to_question = array( 1 => "What is a fun activity you did last summer?",
                              2 => "How many siblings do you have?",
                              3 => "What is your favorite color?",
                              4 => "What is your favorite sport?",
                              5 => "What is your favorite TV-Show?",
                              6 => "What is your favorite movie?"
                            );
    

	function insert_question($chatroom_id, $user_id,  $question, $answer)
	{
	    $this->chatroom_id = $chatroom_id;
	    $this->user_id = $user_id;
	    $this->question = $question;
	    $this->answer = $answer;
		$insert = $this->db->insert('answers', $this);
		return $insert;
	}
}
