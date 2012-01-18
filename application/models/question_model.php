<?php
class Question_model extends CI_Model {
    
	function get_question()
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(1);
        $query = $this->db->get('questions');
        return $query->row();

    }

}
