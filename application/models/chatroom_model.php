<?php

class Chatroom_model extends CI_Model {
    
    $usercount = 0;
    //Ids of the users currently in the chatroom
    $user_ids = [];
    //Tokbox ID
    $tokbox_id = 0;
    //Generated Chatroom id
    $chatroom_id = 0;
    
    //Constructor that has the option to take in a user
    function __construct(){
        
    }
    
    //add user (possibility of taking a question as well)
    function add_user(){
        $usercount += 1;
            
    }
    
    //remove user
    function remove_user(){
        
    }
    
    //Getter that gives the number of active users in that class
    function get_usercount(){
        
    }
    
}

?>