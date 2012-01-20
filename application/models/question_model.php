<?php
class Question_model extends CI_Model {
    
	function get_random_question()
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(1);
        $query = $this->db->get('questions');
        return $query->row();
    }
    
  function get_row_by_chatroomID($id){
    $this->db->where('chatroom_id', $id);
    $this->db->where('used', 0);
    $this->db->order_by('id', 'RANDOM');
    $this->db->limit(1);
    $query = $this->db->get('answers');
    $this->db->where('id', $question_id);
    $data = array(
                   'used' => 1
                );
    $this->db->update('answers', $data);
    return $query;

  }

}
