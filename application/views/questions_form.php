<?php $this->load->view('includes/header'); ?>

<div id="questions_form"><!-- Same CSS as login form-->

	<h1>Questions</h1>
    <?php 
	echo form_open('game/enter_chatroom');
 	echo "What is a fun activity you did last summer?" .  form_input('answer1', 'Answer');
	echo "How many siblings do you have?" . form_input('answer2', 'Answer');
	echo "What is your favorite color?" . form_input('answer3', 'Answer');
	echo form_submit('submit', "Let's Play !");
	echo form_close();
	?>

</div>
	
<?php $this->load->view('includes/footer'); ?>