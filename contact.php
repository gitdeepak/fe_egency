<?php	
	
	$mail_to = 'deepak@egency.me';
	$subject = 'Contact Form Reply - '.$field_name;
	
	$error_message = "";

	if($_POST['spam'] != 4) {
		$error_message.= "Please answer the question correclty";
		die($error_message);
	}
	
	$field_name = $_POST['Name'];
	$field_email = $_POST['Email'];
	$field_phone = $_POST['Phone'];
	$field_message = $_POST['Message'];
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$field_email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$field_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(strlen($field_message) < 9) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    die($error_message);
  }
  
	$body_message = 'From: '.$field_name."\n";
	$body_message .= 'Email: '.$field_email."\n";
	$body_message .= 'Message: '.$field_message;

	$headers = 'From: '.$field_email."\r\n";
	$headers .= 'Reply-To: '.$field_email."\r\n";
	
	$mail_status = mail($mail_to, $subject, $body_message, $headers);
	
	if ($mail_status) { ?>
		<script language="javascript" type="text/javascript">
			alert('Great ! We will connect with you very soon.');
			window.location = 'contacts.htm';
		</script>
	<?php
	}
	else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed : Sorry about that. Please, send an email to info@egency.me');
		window.location = 'contacts.html';
	</script>
	<?php
	}
	?>
