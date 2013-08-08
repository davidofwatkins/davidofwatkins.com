<?php

/* About Sanitization: http://email.about.com/gi/o.htm?zi=1/XJ&zTi=1&sdn=email&cdn=compute&tm=746&f=00&tt=13&bt=1&bts=1&zu=http%3A//www.phpbuilder.com/columns/ian_gilfillan20060412.php3 */

function isValidEmail($email) {
	
	// First, we check that there's one @ symbol, and that the lengths are right.
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		//Email invalid because wrong number of characters in one section or wrong number of @ symbols.
		return false;
	}
	// Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
			return false;
		}
	}
	// Check if domain is IP. If not, it should be valid domain name
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			return false; // Not enough parts to domain
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) {
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
				return false;
			}
		}
	}
	return true;
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
	
	if (!$newSenderName && !$newMessage) { return 0; }
	
	if ($newSenderEmail && !isValidEmail($newSenderEmail)) { return 0; }
	else if (containsBadString($newSenderName) || containsNewlines($newSenderName)) { return 0; }
	else if (containsBadString($newSenderEmail) || containsNewLines($newSenderEmail)) { return 0; }
	else if (containsBadString($newMessage)) { return 0; }
	else { return 1; }
}

$redirectURL = "/sent.php";
$mode = $_REQUEST["mode"];
$senderName = htmlspecialchars($_POST["sender_name"]);
$senderEmail = htmlspecialchars($_POST["sender_email"]);
$message = htmlspecialchars($_POST["sender_message"]);
$address = "dwat91@gmail.com";
$subject = "New message from " . $senderName . "...";

//Format the HTML message

$htmlMessage = '<html><body style="font-family: arial, sans-serif; font-size: 13px;">
    <p style="color: gray; margin: 10px;">The following email was sent to you from <b>' . $senderName . '</b>';
	if ($senderEmail) { $htmlMessage .= ' (' . $senderEmail . ')'; }
	$htmlMessage .= ' from davidofwatkins.com on ' . date("D, M d, Y") . ' at ' . date("h:ia (T)") . ' </p>
    <p style="margin: 10px;">' . $message . '</p></body></html>';

//Check for spammers!
if (!isClean($senderEmail, $senderName, $message)) {
	//Forward to sent page with error
	 if ($mode == "noajax") { header("Location: " . $redirectURL . "?failed=spam"); } //since this script is accessed via AJAX, do not forward to redirect url! simply echo/return text
	 echo "Message failed. Please try again.";
}

//If safe, try to send the message
else {
	//Format the "from" email to include the sender's name
	if ($senderEmail) { $senderEmail = $senderName . " <" . $senderEmail . ">"; }
	//Try sending it!
	$emailHeader;
	
	if ($senderEmail) { $emailHeader = "From: noreply@davidofwatkins.com\r\nReply-To: " . $senderEmail . "\r\nContent-Type: text/html; charset=ISO-8859-1\r\n"; }
	else { $emailHeader = "From: noreply@davidofwatkins.com\r\nContent-Type: text/html; charset=ISO-8859-1\r\n"; }
	
	if (mail($address, $subject, $htmlMessage, $emailHeader)) {
		if ($mode == "noajax") { header("Location: " . $redirectURL); }
		echo "sent";
	}
	else {
		if ($mode == "noajax") { header("Location: " . $redirectURL . "?failed=unknown"); }
		echo "Message failed. Please try again.";
	}
}

?>