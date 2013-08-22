<script>	
	<?php

	$parts = Explode('/', $_SERVER["SCRIPT_NAME"]);
	$currentFile = $parts[count($parts) - 1];
	
	?>
	
	var isMobile;
	
	<?php if (isMobile()) { echo 'isMobile = true;'; } else { echo 'isMobile = false;'; } ?>
	
	if (isMobile == false) {
		$(document).ready(function() {
			
			var currentPage = "<?php echo $currentFile; ?>";
			var originalTopBorderColor = $("#navbar .li").css("border-top-color");
			var originalFontColor = $("#navbar .li:not(#currentpage)").css("color");
			
			$("#navbar .li").hover(function() {
				
				if ($(this).attr("id") != "currentpage") { //do not animate if the button is for the current page
				
					$(this).stop(true); //prevents lagging animations caused by user hovering multiple times before animation can finish
					$(this).css({ //color and border-color animation does not work in IE 8 and below; use css instead
						"color" : "#FFF",
						"border-color" : "#000",
						"border-top-color" : originalTopBorderColor
					});
					$(this).animate({
						"padding-top" : "35px"
					}, "fast");
				}
			}, function() {
				
				if ($(this).attr("id") != "currentpage") { //do not animate if the button is for the current page
					
					$(this).css({ //color and border-color animation does not work in IE 8 and below; use css instead
						"color" : originalFontColor,
						"border-color" : "#666",
						"border-top-color" : originalTopBorderColor
					});
					$(this).animate({
						"padding-top" : "10px"
					}, "slow");
				}
				
			});
		});
	}
</script>
<div id=topshadow><div id="navbar">
        <a href="<?= SITEROOT ?>"><div class="li" <?php if ($currentFile == "index.php") { echo 'id="currentpage"'; } ?>>Welcome</div></a>
        <a href="<?= SITEROOT ?>portfolio"><div class="li" <?php if ($currentFile == "portfolio.php") { echo 'id="currentpage"'; } ?>>Portfolio</div></a>
        <a href="<?= SITEROOT ?>resume"><div class="li" <?php if ($currentFile == "resume.php") { echo 'id="currentpage"'; } ?>>Resume</div></a>
        <a href="<?= SITEROOT ?>contact"><div class="li" <?php if ($currentFile == "contact.php") { echo 'id="currentpage"'; } ?>><?php if (!isMobile()) { echo "Contact Me"; } else { echo "Contact"; } ?></div></a>
		<div class="clearfloats"></div>
</div></div>