<?php $this->load->view('includes/header'); ?>

<h1>Register</h1>
<fieldset>
<legend>Account Details</legend>
<?php
   
echo form_open('login/create_member');

echo form_input('first_name', set_value('first_name', 'First Name'));
echo form_input('last_name', set_value('last_name', 'Last Name'));
echo form_input('email_address', set_value('email_address', 'Email Address'));
echo form_password('password', set_value('password', "password"));
echo form_password('password2', set_value('password2', "password"));

echo form_submit('submit', 'Create Acccount');
?>

<?php echo validation_errors('<p class="error">'); ?>
</fieldset>

<?php $this->load->view('includes/footer'); ?>