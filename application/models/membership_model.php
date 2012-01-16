<?php

class Membership_model extends CI_Model {

	function validate()
	{
		$this->db->where('email_address', $this->input->post('email_address'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('membership');		
		if($query->num_rows == 1)
		{
			return array(true , $query->row()->id);
		}else{
		    return array(false, 0);
		}
		
	}
	
	
	function create_member()
	{
		
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),			
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('membership', $new_member_insert_data);
		return $insert;
	}
}