<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Minglit</title>
</head>
<body>
	<h2>Welcome Back <?php echo $this->session->userdata('email_address'); ?> !</h2>
     <?php $this->load->view('question_form'); ?>
	<h4><?php echo anchor('login/logout', 'Logout'); ?></h4>
</body>
</html>	