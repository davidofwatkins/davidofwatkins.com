<?php $TITLE = "David Watkins - Portfolio"; ?>
<?php include("includes/header.php"); ?>
    
<?php

echo '<link href="/common/style/portfolio-styling.css" rel="stylesheet" type="text/css" />';
if (!isMobile()) {
	echo '<link rel="stylesheet" type="text/css" href="/common/shadowbox/shadowbox.css">';
    echo '<script type="text/javascript" src="/common/shadowbox/shadowbox.js"></script>';
    echo '<script type="text/javascript">Shadowbox.init();</script>';
}
else {
	echo '<link href="/common/style/portfolio-styling-mobile.css" rel="stylesheet" type="text/css" />';
}




?>
    <script>
	//Project filtering/project selector functionality:
	$(document).ready(function() {
		$("#project-selector div").click(function() {
			$(this).siblings().attr("highlighted", "false");
			$(this).attr("highlighted", "true");
			
			$("#projects").children().each(function() {
				$(this).fadeOut("fast");
			});
			
			if ($(this).attr("show") == "dev") {
				
				$("#projects").children().each(function() {
					if ($(this).attr("projtype") == "dev") { $(this).fadeIn("fast"); }
				});
				
			}
			else if ($(this).attr("show") == "hobby") {
				
				$("#projects").children().each(function() {
					if ($(this).attr("projtype") == "hobby") { $(this).fadeIn("fast"); }
				});	
			}
			else {
				$("#projects").children().each(function() {
					$(this).fadeIn("fast");
				});
			}
		});
	});
	</script>
    <div id="supercontent"><div id="content">
        <h1>Portfolio</h1>
        <div id="pagedescription">Please feel free to explore some of my projects (both professional and otherwise) below.</div>
        
        <p style="font-size: 13px; font-weight: bold; margin: 10px auto; width: 100px; text-align: center;">Filter Projects:</p>
        <div id="project-selector">
        	<div show="all" highlighted="true">All</div>
            <div show="dev">IT/Development<?php //if (isMobile()) { echo "IT/Dev"; } else { echo "IT/Development"; }?></div>
            <div show="hobby">Personal Hobbies<?php //if (isMobile()) { echo "Personal"; } else { echo "Personal Hobbies"; } ?></div>
            <br style="clear: both;" />
        </div>
        
        <div id="projects">
                
        <?php echo getProjectsFromXML(); ?>
        
        </div>
        
    </div></div>
<?php include("includes/footer.php"); ?>