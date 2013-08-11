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

function switchProfilePic(picsArray) {

  var image = $("div#header img");
  var oldSrc = image.attr("src");
  var random = null;

  while (random == null || picsArray[random] == oldSrc) { //ensures the next chosen image isn't the same as the last
    random = Math.floor((Math.random() * picsArray.length)); //random between 0 and size of array
  }

  image.fadeOut("fast", function() {
    image.attr("src", picsArray[random]);
    image.fadeIn("fast");
  });
  
}
