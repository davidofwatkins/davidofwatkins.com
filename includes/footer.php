<div class="clearfloats"></div>
    
    <?php if ($_REQUEST["mode"] != "ajax"): //Do not show footer if getting page via AJAX ?>
    
    </div>
    <div id="footer">
    	<div id="footernav">
    		<a href="<?= SITEROOT ?>">Home</a> &bull; <a href="<?= SITEROOT ?>portfolio">Portfolio</a> &bull; <a href="<?= SITEROOT ?>resume">Resume</a> &bull; <a href="<?= SITEROOT ?>contact">Contact Me</a>
        </div>
        <?php
        	
			if (!isMobile()) { echo '<div id="randomfavquote">' . getRandomFavQuote() . '</div>'; }
			else {
				echo '<div id="likebuttons-mobile">';
				echo '<fb:like href="http://davidofwatkins.com" send="false" layout="button_count" width="50" show_faces="false"></fb:like>';
				echo '<g:plusone href="http://davidofwatkins.com" annotation="inline" width="120"></g:plus>';
				echo '</div>';
			}
		?>
     </div>

<?php

//Preload each profile picture:
if (!isMobile()) {
	
	echo '<script>';
	for ($i = 0; $i < sizeof($profilePics); $i++) {
		echo "var preloadImage" . $i . " = $('<img src=\"" . $profilePics[$i] . "\" />');\n";
	}
	echo '</script>';
}
?>
    
</body>
</html>

<?php endif; ?>