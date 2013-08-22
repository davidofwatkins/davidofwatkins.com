<?php $TITLE = "David Watkins - Portfolio"; ?>
<?php include("includes/header.php"); ?>
    
<?php

echo '<link href="/common/style/portfolio-styling.css" rel="stylesheet" type="text/css" />';
echo '<script type="text/javascript" src="/common/js/jquery.isotope.min.js"></script>';
echo '<link href="http://fonts.googleapis.com/css?family=Medula+One" rel="stylesheet" type="text/css">';
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
		$("#project-filters input[type=checkbox]").change(function() {

			$(".project_item").stop(true);

            if ($("input#show-dev").is(":checked") && $("input#show-hobby").is(":checked"))
                $('#projects').isotope({ filter: '.project_item' });
            else if ($("input#show-dev").is(":checked"))
                $('#projects').isotope({ filter: '.project_item[data-projtype=dev]' });
            else if ($("input#show-hobby").is(":checked"))
                $('#projects').isotope({ filter: '.project_item[data-projtype=hobby]' });
            else
                 $('#projects').isotope({ filter: '.none' });
		});
	});

    window.addEventListener("load", function() {
        $('#projects').isotope({
            itemSelector : '.project_item',
            layoutMode : 'masonry',
            animationEngine: "best-available", /* css for modern browers, jquery for older */
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
    });

	</script>

    <div id="supercontent"><div id="content">
        <h1>Portfolio</h1>

        <div id="project-filters">
        	<div class="filter-option">
                <input type="checkbox" id="show-dev" checked="checked" />
                <label class="styled-checkbox" for="show-dev"></label>
                <label class="checkbox-label" for="show-dev">Software Projects</label>
            </div>
        	<div class="filter-option">
                <input type="checkbox" id="show-hobby" checked="checked" />
                <label class="styled-checkbox" for="show-hobby"></label>
                <label class="checkbox-label" for="show-hobby">Video Projects</label>
            </div>
        </div>
        
        <div id="projects">
                
        <?php

        	$projects = getPortfolioProjects();

        	foreach ($projects as $project):

        	if ($project["linktolightbox"] == "true") {
        		$project["lightboxtext"] = 'rel="shadowbox;height=510;width=853" title="' . $project["name"] . '"';
        	}	
        ?>

    	<div class="project_item" id="<?php echo $project["id"]; ?>" data-projtype="<?= $project["category"] ?>">
			<h1 class="project_title"><?= $project["name"] ?> <small><?= $project["helpertext"] ?></small></h1>
			<?php if (isset($project["src"])) echo '<a href="' . $project["src"] . '" ' . $project["lightboxtext"] . ' target="_blank">'; ?>
                <div class="project-image-frame<?php if (strpos(strtolower($project["helpertext"]), "video") !== false) echo " video-overlay"; ?>">
                    <img class="project-image" src="<?= $project["imagepath"] ?>" />
                </div>
            <?php if (isset($project["src"])) echo '</a>'; ?>
			<div class="project_description"><?= $project["description"] ?></div>
			<?php if (isset($project["src"])) echo '<a class="button" href="' . $project["src"] . '" ' . $project["lightboxtext"] . ' target="_blank">View Project</a>'; ?>
		</div>

    	<?php
        	endforeach;
        ?>
        
        </div>
        
    </div></div>
<?php include("includes/footer.php"); ?>