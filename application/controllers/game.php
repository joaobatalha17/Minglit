<?php


class Game extends CI_Controller {
    
    var $question1;
    var $question2;
    var $question3;
    
	public function __construct(){
	    parent::__construct();    
	}
	
	function index(){
	}
	
	function questions()
	{
	    $this->load->model('question_model');
	    
	    //Getting random questions
	    $q1 = $this->question_model->get_random_question();
	    $q2 = $this->question_model->get_random_question();
	    $q3 = $this->question_model->get_random_question();
	    
	    $this->question1 = $q1->question;
	    $this->question2 = $q2->question;
	    $this->question3 = $q3->question;
	    
	    $data['question1'] = $this->question1;
	    $data['question2'] = $this->question2;
	    $data['question3'] = $this->question3;
	    
	    //Storing random questions in the Session
	    $this->session->set_userdata('question1', $this->question1);
	    $this->session->set_userdata('question2', $this->question2);
	    $this->session->set_userdata('question3', $this->question3);
		$this->load->view('questions_form', $data);
	}
	
	function submit_questions(){
	    $this->load->model('answer_model');
	    $return_array = $this->enter_chatroom();
	    $chatroom_id = $return_array[0];
	    $tokboxID = $return_array[1];
	    $data['tokboxID'] = $tokboxID;
	    
	    //Getting the questions from the Session
	    $this->question1 = $this->session->userdata('question1');
      $this->question2 = $this->session->userdata('question2');
	    $this->question3 = $this->session->userdata('question3');
	    
	    $this->answer_model->insert_question($chatroom_id, 
	                                           $this->session->userdata('user_id'),  
	                                           $this->question1, 
	                                           $this->input->post('answer1'));
   	  $this->answer_model->insert_question($chatroom_id, 
   	                                           $this->session->userdata('user_id'),  
   	                                           $this->question2, 
   	                                           $this->input->post('answer2'));
	    $this->answer_model->insert_question($chatroom_id, 
	                                           $this->session->userdata('user_id'),  
	                                           $this->question3, 
	                                           $this->input->post('answer3'));

		$this->load->view('game_room', $data);
		//echo '<pre>';
		//print_r($this->session->all_userdata());
		//echo '</pre>';
	}	
	
	function create_chatroom(){		
	    $this->load->model('chatroom_model');
	    $this->chatroom_model->create_chatroom();
	}
	
	function enter_chatroom(){
	    $chatroom_id;
	    $tokboxID;
	    $this->load->model('chatroom_model');
	    $current_chatroom = $this->chatroom_model->get_current_chatroom();
	    
	    if($current_chatroom) //Theer is a chatroom that is not full
		{
			$data['id'] = $current_chatroom->id;
			$data['user_id'] = $this->session->userdata('user_id');
			$this->chatroom_model->add_user($data);
			$chatroom_id = $current_chatroom->id;
			$tokboxID = $current_chatroom->tokboxID;
		}
		else
		{
			$query = $this->chatroom_model->create_chatroom(); //We have to create a new chatroom because all the other chatrooms are full
			$data['id'] = $query->id;
			$data['user_id'] = $this->session->userdata('user_id');
			$this->chatroom_model->add_user($data);
		    $chatroom_id = $query->id;
		    $tokboxID = $query->tokboxID;
		}
		$this->session->set_userdata('chatroom_id', $chatroom_id);
		return array($chatroom_id, $tokboxID );
		
	}
	
	function get_new_question(){ // Returns random question and answer, taken from the set of responses that the users that are in a certain chatroom (with $id) gave. 
	// 
    $chatroom_id = 88; // BEWARE HARDCODED!
	  $this->load->model('question_model');
	  $this->load->model('chatroom_model');
	  $query = $this->question_model->get_row_by_chatroomID($chatroom_id);

	  if($query->num_rows() == 1){
	    $row = $query->row();
	    $result = array(
	                    $row->question,
	                    $row->answer,
	                    $row->user_id
	                  );
	    $this->chatroom_model->set_live_question($chatroom_id, $row->id);
	    return $result;
	  }
	  
	}
	
	function get_solution(){ // The user_id is the id of the user whose name was in the selected button
    $chatroom_id = 88; //BEWARE HARDCODED!
    $user_id = 2;

	  $veredict;
	  $correct_answer;
	  
	  $this->load->model('chatroom_model');
	  $this->load->model('answer_model');
	  $this->load->model('membership_model');
	  
	  $chatroom_query = $this->chatroom_model->get_by_id($chatroom_id);
	  if($chatroom_query->num_rows() == 1){
	    $chatroom = $chatroom_query->row();
  	  $question_id = $chatroom->question;
	  }

	  
	  $answer_query = $this->answer_model->get_by_id($question_id);
	  if($answer_query->num_rows() == 1){
	    $answer = $answer_query->row();
	    $solution = $answer->user_id;
	  }
	  
	  $user_query = $this->membership_model->get_by_userID($solution);
	  if($user_query->num_rows() == 1){
	    $user = $user_query->row();
	    $first_name = $user->first_name;	  
    }
	  if($user_id == $solution){
	    $veredict = true;
	  }else{
	    $veredict = false;
	  }
	  
	  $result = array(
	                  $veredict,
	                  $first_name
	                );
	  
	  //return $result;
	  echo '<pre>';
	  print_r($result);
	  echo '</pre>';
	}
	
}