<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Message Sent!</title>
    <link href='http://fonts.googleapis.com/css?family=Leckerli+One' rel='stylesheet' type='text/css'>
    <link href='style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="wrapper">
    	<h1>Webcam Music Video Project</h1>
        <div id="content">
        	<div class="section" id="message-sent">
        		<?php
					if ($_GET["failed"]) {
						echo '<h1>Submission Failed</h1>';
						echo '<h2>Uh oh, we did not receive your submission!</h2>';
						echo '<p>Please make sure that you entered your contact information and video link correctly.</p>';
					}
					else {
						echo '<h1>Submission Sent</h1>';
						echo '<h2>Thank you for your help!</h2>';
						echo '<p>We\'ll send you an email to let you know when the video will be completed. <a href="index.php">Click here</a> to return to the project home.</p>';
					}
				?>
            </div>
        </div>
    </div>
</body>
</html>