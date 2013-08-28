<?php
	//Constants
	$TITLE = "David Watkins - Resume";
?>
<?php include("includes/header.php"); ?>
    <div id="supercontent"><div id="content">
        <h1>Resume</h1>
        <p align="center">If you are interested in my work, please feel free to read through my resume below (PDF). As always, I am available by email at <a href="mailto:david@davidofwatkins.com">david@davidofwatkins.com</a> or through the <a href="<?= SITEROOT ?>contact">contact page</a> if you have any questions.</p>
        <p align="center">For more information that may not be included on my resume, please visit my <a href="http://www.linkedin.com/in/davidofwatkins" target="_blank">LinkedIn profile</a>. Thank you.</p>
        <style>
			embed {
				width: 100%;
				height: 900px;
				margin: 20px auto;
			}
			iframe#resume {
				width: 100%;
				height: 1100px;
			}

			/* Tablet (Portrait) 	768px */
			@media only screen and (min-width: 768px) and (max-width: 959px) {
				#resume { height: 1050px !important; }
			}

			/* Mobile (Landscape) 	480px */
			@media only screen and (min-width: 480px) and (max-width: 767px) { 
				#resume { height: 955px !important; }
			}

			/* Mobile (portrait) 	320px */
			@media only screen and (max-width: 480px) {
				#resume { height: 590px !important; }
			}
		</style>
        <div style="text-align: center;"><a id="get-resume" class="button" href="<?= SITEROOT ?>/common/php/downloadserver.php?file=davidwatkins_resume.pdf">Download (PDF)</a></div>
        <?php
			echo '<iframe id="resume" src="http://docs.google.com/viewer?url=' . urlencode(SITEROOT . "downloads/davidwatkins_resume.pdf") . '&embedded=true"  style="border: none;"></iframe>';
		?>
    </div></div>
<?php include("includes/footer.php"); ?>