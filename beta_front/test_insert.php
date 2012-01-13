<?php
//to sanitize db input
function sanitize ($value)
{
if( get_magic_quotes_gpc() )
{
$value = stripslashes( $value );
}
if( function_exists( “mysql_real_escape_string” ) )
{
$value = mysql_real_escape_string( $value );
}
else
{
$value = addslashes( $value );
}
return $value;
}

$email = sanitize($_POST['email']);

$con = mysql_connect("localhost","minglit","xmingle");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("minglit_followers", $con);

mysql_query("INSERT INTO follower_emails (email)
VALUES ('".$email."')");

mysql_close($con);
?>
