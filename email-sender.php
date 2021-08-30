<?php
session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));
header('Content-type: application/json');

$Recipient = 'prajaktaalp@gmail.com'; // <-- Set your email here
if($Recipient) {

	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Mobile = $_POST['mobile'];
	$Message = $_POST['message'];
	
	if(empty($url))//spam check
	{

		$Email_body = "";
		$Email_body .= "Enquiry from Website: \n".
					   "Full Name: " . $Name . "\n" .
					   "Email: " . $Email . "\n" .
					   "Mobile: " . $Mobile . "\n" .
					    "Enter Details: " . $Message . "\n";
	
	
		$Email_headers = "";
		$Email_headers .= 'From: ' . $Name . ' <' . $Email . '>' . "\r\n".
						  "Reply-To: " .  $Email . "\r\n";
	
		$sent = mail($Recipient, $Subject, $Email_body, $Email_headers);
	
		if ($sent){
			$emailResult = array ('sent'=>'yes');
		} else{
			$emailResult = array ('sent'=>'no');
		}
		header('Location: http://enats.in/contact.html');
		//echo json_encode($emailResult);
	}

} else {

	$emailResult = array ('sent'=>'no');
	echo json_encode($emailResult);

}
?>




