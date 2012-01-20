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
    $question_id;
    $this->db->where('chatroom_id', $id);
    $this->db->where('used', 0);
    $this->db->order_by('id', 'RANDOM');
    $this->db->limit(1);
    $query = $this->db->get('answers');
    $row = $query->row();
    $question_id = $row->id;
    echo '<pre>';
	  print_r($query->result());
	  echo '</pre>';
    $data = array(
                   'used' => 1
                );
    $this->db->where('id', $question_id);
    $this->db->update('answers', $data);
    return $query;

  }

}
