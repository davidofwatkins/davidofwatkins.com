//javascript functions for the site

function ajaxCall(url) {
    
    var container = $("#supercontent");
    
    //Get page from server
    $.ajax(url + "?mode=ajax").done(function(returnedHTML) {
        
        	container.slideUp("slow", function() { 
	
		//Replace html in current page with new html
        	container.html(returnedHTML);
        
       	 	//change url
       	 	window.history.pushState("", "New Title", url);
		
		//update title
        	
		//update Nav button
        
       		container.slideDown("slow");
	});
    });
    
}
