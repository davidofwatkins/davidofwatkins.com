<?php

/* Sanitization from: http://email.about.com/gi/o.htm?zi=1/XJ&zTi=1&sdn=email&cdn=compute&tm=746&f=00&tt=13&bt=1&bts=1&zu=http%3A//www.phpbuilder.com/columns/ian_gilfillan20060412.php3 */

function isValidEmail($email) {
	return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
}

function containsBadString($str_to_test) {
	$bad_strings = array("content-type:", "mime-version:", "multipart/mixed", "Content-Transfer-Encoding:", "bcc:", "cc:", "to:");
	
	foreach($bad_strings as $bad_string) {
		//if(eregi($bad_string, strtolower($str_to_test))) {
		if (strpos(strtolower($bad_string), strtolower($str_to_test))) {
			/*echo "$bad_string found. Suspected injection attempt - mail not being sent.";
			echo "<br />This is the string with the bad string: " . $str_to_test;
			exit;*/
			return 1;
    	}
		else { return 0; }
  	}
}

function containsNewlines($str_to_test) {
	if(preg_match("/(%0A|%0D|\\n+|\\r+)/i", $str_to_test) != 0) {
    	/*echo "newline found in $str_to_test. Suspected injection attempt - mail not being sent.";
    	exit;*/
		return 1;
   	}
	else { return 0; }
}

function isClean($newSenderEmail, $newSenderName, $newMessage) {
	if ($newSenderEmail != "" && !isValidEmail($newSenderEmail)) { return 0; }
	else if ($newSenderName != "" && (containsBadString($newSenderName) || containsNewlines($newSenderName))) { return 0; }
	else if ($newSenderEmail != "" && (containsBadString($newSenderEmail) || containsNewLines($newSenderEmail))) { return 0; }
	else if (containsBadString($newMessage)) { return 0; }
	else { return 1; }
}

$subject = "New Webcam Music Video Project Submission";
$redirectURL = "sent.php";
$senderName = $_POST["sender_name"];
$senderEmail = $_POST["sender_email"];
$message = $_POST["videolink"];
$address = "dwat91@gmail.com, rftex@comcast.net";

//Format the HTML message
$htmlMessage = "<html><body>";
$htmlMessage .= '<h1 style="margin: 0; padding: 0;">' . $senderName . ' submitted a video:</h1>';
$htmlMessage .= '<p class="meta" style="font-size: 11px;
		color: #666;
		margin: 5px 0 10px 10px;">From ' . $senderEmail . ' at ' . date("D, d M Y H:i:s T") . '</p>';
$htmlMessage .= "<p>The video's link is displayed below:</p>";
$htmlMessage .= '<h2 style="margin-right: 3px;"><code>' . $message . '</code></h2>';
$htmlMessage .= "</body></html>";

//Check for spammers!
if (!isClean($senderEmail, $senderName, $message)) {
	//Forward to sent page with error
	 header("Location: " . $redirectURL . "?failed=spam");
	 echo "Message failed due to spam detection! :(";
}

//If safe, try to send the message
else {
	//Format the "from" email to include the sender's name
	$senderEmail = $senderName . " <" . $senderEmail . ">";
	//Try sending it!
	if (mail($address, $subject, $htmlMessage, "From: " . $senderEmail . "\r\nContent-Type: text/html; charset=ISO-8859-1\r\n")) {
		header("Location: " . $redirectURL);
		echo "Message sent! :)";
	}
	else {
		header("Location: " . $redirectURL . "?failed=unknown");
		echo "Message failed! :(";
	}
}

?>