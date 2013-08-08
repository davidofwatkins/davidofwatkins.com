//Note: these functions will only be attached to the site when the user agent is reporting a desktop (not mobile)

//Auto-resize sidebar height:
$(document).ready(function() {
	refreshSidebarHeight();
	$("#supercontent").resize(function() {
		refreshSidebarHeight();
	});

	function refreshSidebarHeight() {
		
		if ($(".fixedsidebar").height() < $("#supercontent").height()) {
			$("#sidebar").css("height", $("#supercontent").height());
		}
		
		else {
			$("#sidebar").css("height", "auto");
		}
	}
});

//Add button animation functionality:
$(document).ready(function() {
	var originalViewButtonWidth = $(".button, .button-small").width();
	$(".button, .button-small").hover(function() {
		$(this).stop(true);
		$(this).animate({ "width" : (originalViewButtonWidth + 40) + "px" }, "fast");
	}, function() {
		$(this).animate({ "width" : originalViewButtonWidth + "px" }, "fast");
	});
});