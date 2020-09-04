<?php
include_once('function_send_mail.php');

if(isset($_POST['mailform']))
{
    
    $subject='Reset password';
    $message='Hello,<br>';
    $message.='Here is your recovery code:<br>';
    $message.='Streamler.com';
    $recipients='peeteol@gmail.com';
    sendmail($subject,$message,$recipients);


}
?>

<html>
	<body>
	
		<form method="POST" action="">
			<input type="submit" value="Recevoir un mail !" name="mailform"/>
		</form>

</body>
</html>
