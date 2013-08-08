<?php
	//Constants
	$TITLE = "Contact David Watkins";
?>
<?php include("includes/header.php");
	
	echo '<link href="/common/style/contact-styling.css" rel="stylesheet" type="text/css" />';
	if (isMobile()) {
		echo '<link href="/common/style/contact-styling-mobile.css" rel="stylesheet" type="text/css" />';
	}
?>
	<script>
		
		function AJAXSubmit() {
			
			if (validateForm()) {
				$.post("/common/php/emailer.php", $("form#contact").serialize(), function(data) {
					if (data == "sent") {
						//Replace HTML with confirmation
						$("#content").fadeOut("slow", function() {
							$(this).html("<h1>Message Sent!</h1><p id=\"pagedescription\" style=\"font-size: 17px;\" >Thanks for the message!  I'll try to get back to you if I can!</p>");
							$(this).fadeIn("slow");
						});
						
					}
					else { showError(data); }
				}, "text");
			}
			
			return false;
		}
	
		function validateForm() {
			
			var form = $("#contact");
			var email = $("#sender_email").val();
			var name = $("#sender_name").val();
			var message = $("#sender_message").val();
			var errorBox = $("#error");
			
			//Check name field
			if (name == null || name == "") {
				showError("Please enter your name.");
				return false;
			}
			
			//Check message field
			else if (message == null || message == "") {
				showError("Please write a message.");
				return false;
			}
			
			//Check email field if something has be&en entered
			else if (email != "" && checkEmailAddress(email) == false) {
				showError("Please make sure your email address is valid.");
				return false;
			}
			
			else {
				errorBox.slideUp("slow");
				$("#sendbutton").css("color", "#333");
				$("#sendbutton").val("Sending...");
				return true;
			}
		}
		
		function showError(message) {
			$("#error").html(message);
			$("#error").slideDown("fast");
			
			//scroll to the error box (but only if scrolled down below the error box)
			var errorOffset = $('#error').offset().top - 10;
			if ($("body").scrollTop() > errorOffset) { $('body,html').animate({ scrollTop: errorOffset }, 800); }
		}
		
		function checkEmailAddress(email) {
			
			var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
			var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
			var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
			var sQuotedPair = '\\x5c[\\x00-\\x7f]';
			var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
			var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
			var sDomain_ref = sAtom;
			var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
			var sWord = '(' + sAtom + '|' + sQuotedString + ')';
			var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
			var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
			var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
			var sValidEmail = '^' + sAddrSpec + '$'; // as whole string
			  
			var reValidEmail = new RegExp(sValidEmail);
			
			return reValidEmail.test(email);
		}
	</script>
    
    <div id="supercontent"><div id="content">
        <h1>Contact Me</h1>
        <center>
            <p>Questions, comments, concerns, or suggestions? Please leave me some feedback below:</p>
            
            <div id="error"></div>
            
            <form id="contact" name="contact" action="../common/php/emailer.php" method="post" onSubmit="return AJAXSubmit()" novalidate> 
            	<noscript>
                	<input type="hidden" name="mode" value="noajax" />
                </noscript>
                <div id="senderinfo">
                	<div id="name-label" class="label">Your Name:</div>
                    <input type="text" id="sender_name" name="sender_name" placeholder="Your Name" autofocus="autofocus" />
                    <div style="clear: both;"></div>
                    <div id="email-label" class="label">Your Email:</div>
                    <input type="email" id="sender_email" name="sender_email" placeholder="example@example.com" />
                </div>
                <h2 underline="off">Please leave your message below:</h2>
                <textarea id="sender_message" name="sender_message" cols="70" rows="20" style="margin-left: auto; margin-right: auto;" placeholder="Write me something, here! Anything!" ></textarea>
                <div style="width: 100%;"></div> <!--Accounts for Firefox 4 textbox resizing-->
    		<input type="submit" class="button-small" value="Send" />
          </form>
        </center>
    </div></div>
<?php include("includes/footer.php"); ?>