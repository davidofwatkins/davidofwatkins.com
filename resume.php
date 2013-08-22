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
		</style>
        <div style="text-align: center;"><a id="get-resume" class="button" href="<?= SITEROOT ?>downloads/resume.pdf">Download (PDF)</a></div>
        <?php
        	if (!isMobile()) {
				echo '<iframe id="resume" src="http://docs.google.com/viewer?url=' . urlencode(SITEROOT . "downloads/resume.pdf") . '&embedded=true"  style="border: none;"></iframe>';
			}
		?>
    </div></div>
<?php include("includes/footer.php"); ?>