<script>
	$(document).ready(function() {
		
		var originalMarginLeft = parseInt($(".moredw-link img").css("margin-left"));
		var isHoveringBubble = false;
		var isHoveringButton = false;
		var lastHovered;
		
		$("#socialpopup").hover(function() {
			isHoveringBubble = true;
		}, function() {
			isHoveringBubble = false;
			animateButton_off(lastHovered, originalMarginLeft)
			$("#socialpopup").fadeOut("fast");
		});
				
		$(".moredw-link img").hover(function() {
			
			isHoveringButton = true;
			lastHovered = $(this);
			$(this).stop(true);
			
			animateButton_on($(this), originalMarginLeft + 5);
			
			//Popup
			if ($("#socialpopup").css("display") == "none") { var delay = 300; }
			else { var delay = 0; }
			showPopup($(this).offset().top - $(this).parent().parent().offset().top, "#socialpopup #" + $(this).parent().attr("for") + "-popup-content", delay);
			
		}, function() {
			
			isHoveringButton = false;
			var _this = $(this);
			
			setTimeout(function() { //wait 50 ms and then...
				
				//Buttons
				if (isHoveringBubble == false && (isHoveringButton == false || lastHovered != _this)) {
					animateButton_off(_this, originalMarginLeft);
				}
				
				//Popup
				if (isHoveringBubble == false && isHoveringButton == false) {
					
					$("#socialpopup").fadeOut("fast");
				}
						
			}, 50);
		});
		
		function animateButton_on(button, newMarginLeft) {
			
			if (button) {

				//Change button image
				var originalSrc = button.attr("src");
				button.attr("src", originalSrc.replace("_off", "_on"));
				
				//Animate button position
				button.animate({ "margin-left" : newMarginLeft }, "fast");
			}
		}
		
		function animateButton_off(button, newMarginLeft) {
			
			//Animate button image
			var originalSrc = button.attr("src");
			button.attr("src", originalSrc.replace("_on", "_off"));
			
			//Animate button position back to origin
			button.animate({ "margin-left" : newMarginLeft }, "fast");
		}
		
		function showPopup(top, contentID, delay) {
			
			var height = $(contentID).attr("height");
			var width = $(contentID).attr("width");
			
			setTimeout(function() {
				if (isHoveringButton == true) { //make sure button is *still* being hovered when it comes time to show the bubble
					$("#socialpopup").stop(true);
					$("#socialpopup").css("opacity", 1);
					$("#socialpopup").css("filter", "alpha(opacity=100)");
					$("#socialpopup").css("top", top - 5);
					$("#socialpopup").css("left", 70);
					$("#socialpopup .socialpopup-content").css("display", "none"); //Load the corresponding piece of content:
					$(contentID).css("display", "block");
					$("#socialpopup").css({ "height" : height, "width" : width });				
					$("#socialpopup").fadeIn("fast");
				}
			}, delay);
		}
	});
</script>
<div id="sidebar">
	<div class="fixedsidebar">        
    	<h1>More DW:</h1>
        <div id="more-dw">
        
        	<div id="socialpopup" for="">
                <!-- Content divs below are display: none; only one activated at a time via js -->
                <div class="socialpopup-content" id="gplus-popup-content" height="65" width="200" style="margin-top: -10px" >
                    <div id="gplusbordercover"></div>
                    <div class="g-plus" data-href="https://plus.google.com/104494880066441442910?rel=publisher" data-width="200" data-height="69" data-theme="light"></div>
                </div>
                <div class="socialpopup-content" id="facebook-popup-content" width="130" height="30" style="padding: 5px;">
                    <!-- Using iframe version of facebook subscribe button because the HTML5 and XBML versions have difficulty loading when display = none -->
                    <iframe src="//www.facebook.com/plugins/subscribe.php?href=https%3A%2F%2Fwww.facebook.com%2Fdavidofwatkins&amp;layout=button_count&amp;show_faces=true&amp;colorscheme=light&amp;font&amp;width=120" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px;" allowTransparency="true"></iframe>
                </div>
                <div class="socialpopup-content" id="twitter-popup-content" width="350" height="400">
					<a class="twitter-timeline" href="https://twitter.com/dwat91" data-widget-id="365730330562412545">Tweets by @dwat91</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                <div class="socialpopup-content" id="linkedin-popup-content" height="130" width="355" style="margin: -10px 0 0 -8px;">
                    <div id="linkedinbordercover"></div>
                    <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
                    <script type="IN/MemberProfile" data-id="http://www.linkedin.com/in/davidofwatkins" data-format="inline" data-related="false"></script>
                </div>
            </div>
        
        	<a href="https://plus.google.com/104494880066441442910/about" class="moredw-link" for="gplus" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/googleplus_off.png" /></a>
            <a href="http://www.facebook.com/davidofwatkins" class="moredw-link" for="facebook" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/facebook_off.png" /></a>
            <a href="http://twitter.com/dwat91" class="moredw-link" for="twitter" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/twitter_off.png" /></a>
            <a href="http://www.linkedin.com/in/davidofwatkins" for="linkedin" class="moredw-link" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/linkedin_off.png" /></a>
        </div>
        <div id="likebuttons">
        	<center><g:plusone href="http://davidofwatkins.com" size="tall" annotation="bubble" width="120"></g:plus></center>
            <center><fb:like href="http://davidofwatkins.com" send="false" layout="box_count" width="44" show_faces="true"></fb:like></center>
        </div>
	</div>
</div>