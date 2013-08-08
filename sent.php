<?php
	//Constants
	$TITLE = "Message Sent";
?>
<?php include("includes/header.php"); ?>
    <div id="supercontent"><div id="content">
        <h1>Message Sent!</h1>
        <center><p style="font-size: 17px; font-family: "lucida grande",tahoma,verdana,arial,sans-serif; font-weight: none;">
        	
            <?php
            	if ($_GET["failed"] == "unknown") {
					echo "Oh no!  Your email did not send correctly because of technical reasons.  Please email me at <a href=\"mailto:david@davidofwatkins.com\">david@davidofwatkins.com</a> instead.";
				}
				else if ($_GET["failed"] == "spam") {
					echo "Oh no! Please make sure you have entered at least your name and a message and try again.";
				}
				else {
					echo "Thanks for the message!  I'll try to get back to you if I can!";
				}
			?>
            
        </p></center>
    </div></div>
<?php include("includes/footer.php"); ?>