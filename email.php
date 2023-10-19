<?php		
	
	$url = 'https://api.sendgrid.com/';	
	$sendgrid_apikey = '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';	
	$json_string = array(		
	'to' => array(	
	'prasun800@gmail.com' )	
	);	 
	$email_message ="<h2>Dear prasun kumar </h2>";
	$email_message .="<h2>Your application is submitted successfully.</h2>";
	//$email_message .="<h2>Dear " . $applications->firstName .' '. $applications->lastName . ", </h2>";
	$params = array(	
	'x-smtpapi' => json_encode($json_string),	
	'to'        => 'prasun800@gmail.com',	
	'subject'   => 'mail testing',	
	'html'      =>  $email_message,	
	'text'      =>  $email_message,	
	'from'      => 'prasunlaptop@gmail.com',	
	);	
	if($params) {
		//print "<div class='mail-status'><p>Thank you for your message. We will contact you shortly.</p></div>";
		} else {
		//print "<p class='Error'>Problem in Sending Mail.</p>";
	}
	$request =  $url.'api/mail.send.json';	
	// Generate curl request	
	$session = curl_init($request);	
	// Tell curl to use HTTP POST	
	curl_setopt ($session, CURLOPT_POST, true);	
	// Tell curl that this is the body of the POST	
	curl_setopt ($session, CURLOPT_POSTFIELDS, $params);	
	// Tell curl not to return headers, but do return the response	
	curl_setopt($session, CURLOPT_HEADER, false);	
	// Tell PHP not to use SSLv3 (instead opting for TLS)	
	curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);	
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);	
	
	// obtain response	
	$response = curl_exec($session);
	print_r($response);
	
	
?>