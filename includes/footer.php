<div class="clearfloats"></div>
    
    <?php if ((!isset($_REQUEST["mode"]) || $_REQUEST["mode"] != "ajax")): //Do not show footer if getting page via AJAX ?>
    
    </div>
    <div id="footer">
    	<div id="footernav">
    		<a href="<?= SITEROOT ?>">Home</a> &bull; <a href="<?= SITEROOT ?>portfolio">Portfolio</a> &bull; <a href="<?= SITEROOT ?>resume">Resume</a> &bull; <a href="<?= SITEROOT ?>contact">Contact Me</a>
        </div>
		<div id="randomfavquote"><?= getRandomFavQuote() ?></div>
		<div id="likebuttons-mobile">
			<div id="mobile-gplus-wrapper"><g:plusone href="http://davidofwatkins.com" annotation="inline" width="120"></g:plusone></div>
			<div id="mobile-fb-wrapper"><fb:like href="http://davidofwatkins.com" send="false" layout="button_count" width="50" show_faces="false"></fb:like></div>
		</div>
		<div id="mobile-social-buttons">
			<a href="https://github.com/davidofwatkins" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/github_off.png" /></a>
			<a href="https://plus.google.com/104494880066441442910/about" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/googleplus_off.png" /></a>
			<a href="http://twitter.com/dwat91" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/twitter_off.png" /></a>
            <a href="http://www.facebook.com/davidofwatkins" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/facebook_off.png" /></a>
            <a href="http://www.linkedin.com/in/davidofwatkins" target="_blank" ><img src="<?= SITEROOT ?>images/linkicons/linkedin_off.png" /></a>
		</div>
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