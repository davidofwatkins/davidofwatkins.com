/*
	Created by David Watkins
	Makes the sidebar fixed when scrolling down
*/

$(document).ready(function() {
	if ($("#sidebar").css("display") != "none") {
		initFixedSidebar();
	}
});

var initiatedSidebar = false;

$(window).resize(function() {
	if (!initiatedSidebar && $("#sidebar").css("display") != "none") {
		initFixedSidebar();
		initiatedSidebar = true;
	}
});


//$(document).ready(function() {
function initFixedSidebar() {

	jQuery.each($(".fixedsidebar"), function() {
		var theElement = $(this);
		var originalPositioning = theElement.css("position"); //should usually be static
		var originalMarginTop = theElement.css("margin-top");
		var distanceFromTop = theElement.offset().top;
		var theWidth = theElement.width();
		var topFixedMargin = 10; //the amount of space that should separate the element from the top of the window
		
		var lowestPoint = $("#content").offset().top + ($("#content").outerHeight(true) - theElement.outerHeight(true));
		
		//recalculate lowestPoint when resizing window
		$(window).resize(function() { lowestPoint = $("#content").offset().top + ($("#content").outerHeight(true) - theElement.outerHeight(true)); });
		
		//prepend a spacer div that will prevent the parent element from collapsing
		theElement.parent().prepend('<div class="scrollandfixed-spacer" style="width: ' + theWidth + "px" + '; height: 1px;"></div>');
		
		function getDistanceFromLeft() {
			return theElement.siblings(".scrollandfixed-spacer").offset().left;
		} //needs to be a function because the offset can change when window is resized
		
		function setPositioning() {
			
			//if scrolled down far enough AND the height of the window is large enough to fit the entire sidebar:
			if ($(window).scrollTop() >= (distanceFromTop - topFixedMargin) && $(window).height() > theElement.outerHeight(true)) {
				
				//if the floating sidebar has passed the lowest point it can be at before leaving it's parent
				if (theElement.offset().top >= lowestPoint) {
					theElement.css("position", "absolute");
					theElement.css("top", lowestPoint + "px");
				}
				if ($(window).scrollTop() < lowestPoint) {
					theElement.css("position", "fixed");
					theElement.css("top", topFixedMargin + "px");
					
					//If horizontally scrolled, do not update the sidebar's horizontal position (leave it against the edge of the window)
					if ($("body").scrollLeft() != 0) { theElement.css("left", "-" + $("body").scrollLeft() + "px"); }
					else { theElement.css("left", getDistanceFromLeft() + "px"); }
					
					theElement.css("width", theWidth + "px");
					theElement.css("margin-top", originalMarginTop);
					breakpointScrollPos = 0;
				}
				
			}
			else { theElement.css("position", originalPositioning); }
		
		}
		
		//adjust the positioning of theElement every time a) the page is scrolled, or b) whever the window is resized
		$(window).resize(function() { setPositioning(); });
		$(window).scroll(function() { setPositioning(); });
		
	});

}//);