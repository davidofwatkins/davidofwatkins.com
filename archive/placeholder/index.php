<?php

	//If a name is given, save it to a cookie
	if ($_GET["guest"]) {
		setcookie("guest", $_GET["guest"], time() + 60 * 60 * 24 * 30, "/", ".davidofwatkins.com", false, false);
	}

	if ($_GET["extra"] == "danny") {
		$imgSrc = "dannyapproves.jpg";
	}
	else if ($_GET["extra"] == "magic") {
		$imgSrc = "largedwat_hat.jpg";
	}
	else if ($_GET["extra"] == "tswift") {
		$imgSrc = "dwattswift.jpg";
	}
	else if ($_GET["extra"] == "vandalized") {
		$imgSrc = "dwatvandalized.jpg";
	}
	else {
		$imgSrc = "largedwat.jpg";
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta name="description" content="I'm David Watkins, a Computer Information Technology major at Champlain College in Burlington, Vermont. I generally consider myself a technology enthusiast, though I have a broad range of interests. This is my personal website, so please feel free to stay and explore." />
    <meta name="keywords" content="david,owen-frederic,watkins,champlain,web developer,development,java,php,javascript,xml" />
    
    <!-- Google +1 Button Meta Info -->
    <meta itemprop="name" content="David Of Watkins">
    <meta itemprop="description" content="I'm David Watkins, a Computer Information Technology major at Champlain College in Burlington, Vermont. I generally consider myself a technology enthusiast, though I have a broad range of interests. This is my personal website, so please feel free to stay and explore.">
    
    <!-- Facebook Like Button Meta Info -->
    <meta property="og:title" content="David Of Watkins" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://davidofwatkins.com" />
    <meta property="og:image" content="http://davidofwatkins.com/images/profileicon-perminent.png" />
    <meta property="og:site_name" content="David Of Watkins" />
    <meta property="fb:admins" content="599009326" />
    
    <title>David Of Watkins</title>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
		//GOOGLE
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-16928950-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
    <style>
    #conash3D0 {height:0px; top:-1px; display: none;}
    html { min-height: 100%; /* prevents mysterious bar at bottom of page for gradient backgrounds */ }
    body {
        background: #000;
        font-family: 'Josefin Sans', arial, serif;
        font-size: 25px;
        text-align: center;
        color: #FFF;
        margin-top: 8px;
        /* CSS3 Background Gradient */
        background: -webkit-gradient(linear, left top, left bottom, from(#282828), color-stop(5%, black));
        background: -moz-linear-gradient(top, #282828, black 5%);
    }
    img#loadingspinner {
	position: absolute;
	top: 45%;
	left: 50%;
	margin-left: -50px;
	margin-top: -50px;
	filter: alpha(opacity = 70);
	opacity: .7;
	border-radius: 3px;
	display: none;
    }
    h1 {
        font-weight: normal;
        letter-spacing: 10px;
        font-size: 70px;
        margin: -10px 0 10px 0;
        
    <?php
        
        /*$userAgent = strtoupper($_SERVER["HTTP_USER_AGENT"]);
        if (strpos($userAgent, "MOBILE") <= 0) {
            echo "\t-webkit-box-reflect: below -55px -webkit-gradient(linear,
                                                              left top,
                                                              left bottom,
                                                              from(transparent),
                                                              color-stop(35%, transparent),
                                                              to(rgba(255, 255, 255, 0.5))
                                                             );";
        }*/
        
    ?>
        
    }
    h2 {
        font-size: 45px;
        font-weight: normal;
        margin: 0 auto;
    }
    h3 {
	font-size: 30px;
	color: #CCC;
	font-weight: normal;
	margin: 0px auto 10px auto;
    }
    .welcomeguest {
        font-size: 30px;
        font-weight: normal;
        color: #09C;
    }
    img {
        border: none;
    }
    .preload {
        display: none;
    }
    iframe {
        margin: 20px auto;
    }
    span iframe {
        text-align: center;
    }
    
	div#revert {
		margin: 10px auto 5px auto;
		text-align: center;
		width: 397px;
		font-size: 10px;
		font-family: arial;
		background: #252525;
		color: gray;
		padding: 1px;
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
		display: none;
	}
	
a { color: #06C; }
	
    </style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>

$("document").ready(function() {
	
	//Videos
	$("#telephone").click(function() { showExtra("iframe", "http://www.youtube.com/embed/-fszGz-GAYM?rel=0&autoplay=1"); });
	$("#rickroll").click(function() { showExtra("iframe", "http://www.youtube.com/embed/oHg5SJYRHA0?rel=0&autoplay=1"); });
	$("#backstreet").click(function() { showExtra("iframe", "http://www.youtube.com/embed/wfQfZ2XW88M?rel=0&autoplay=1"); });
	$("#mlwswoy").click(function() { showExtra("iframe", "http://www.youtube.com/embed/IYGAQYEDkiU?rel=0&autoplay=1"); });
	$("#omelettes").click(function() {
		showExtra("flashobject", '<object width="640" height="390" ><param name="allowfullscreen" value="true" /><param name="movie" value="http://www.facebook.com/v/10150320680964327" /><embed src="http://www.facebook.com/v/10150320680964327" type="application/x-shockwave-flash" allowfullscreen="true" width="640" height="390"></embed></object>');
	})
	$("#omelettes2").click(function() {
		showExtra("flashobject", '<object width="640" height="390" ><param name="allowfullscreen" value="true" /><param name="movie" value="http://www.facebook.com/v/10150320680964327" /><embed src="http://www.facebook.com/v/10150320680964327" type="application/x-shockwave-flash" allowfullscreen="true" width="640" height="390"></embed></object>');
	})

	//Pictures
	$("#tswift").click(function() { showExtra("img", "dwattswift.jpg"); });
	$("#danny").click(function() { showExtra("img", "dannyapproves.jpg"); });
	$("#magic").click(function() { showExtra("img", "largedwat_hat.jpg"); });
	$("#vandalized").click(function() { showExtra("img", "dwatvandalized.jpg"); });
	
	//For links, see HTML <a> hrefs below
	
});

var originalImage = $('<img src="largedwat.jpg" usemap="#map" style="margin-bottom: 0px;" />');
var cachedImages = new Array();

function showExtra(type, src) {
		
	//Create image/iframe objects to be inserted into the DOM		
	var extra;
	if (type == "img") { extra = $('<img class="currentextra" usemap="#map" src="' + src + '" />'); }
	else if (type == "flashobject") { extra = src; }
	else { extra = $('<iframe class="currentextra" src="' + src + '" frameborder="0" width="640" height="390" />'); }
	
	if (type == "img") {
		
		//if the image hasn't been cached, load it and animate:
		if (cachedImages.indexOf(src) == -1) {
			$("#loadingspinner").show("fast");
			extra.load(function() {
				$("#loadingspinner").hide("fast");
				cachedImages.push(src); //add the image to the list of cached images for future re-loading
				animateExtra(extra);
			});
		}
		//Otherwise, just animate
		else { animateExtra(extra); }
	}
	//if there is no need to preload, just execute
	else { animateExtra(extra); }
	
}

function animateExtra(newExtra) {
	
	$("#contentarea").slideToggle("slow", function() { //hide the image
		//Wait for hiding to finish, then show the extra
		$("#contentarea").html(newExtra);
		$("#contentarea").slideToggle("slow") //show the image
		
		//Toggle the reset button (For actual clickability, see inline HTML)
		if ($("#revert").css("display") == "none" || newExtra == originalImage) { $("#revert").delay(200).slideToggle("fast"); } //only if changing from/to the original image
		
	});
}
	
function hideExtra() {
	
	//hide the current extra and revert back to the main dwat image		
	animateExtra(originalImage);
}

</script>
</head>
<body>
<h1>davidofwatkins.com</h1>
<?php
	if ($_GET["guest"]) {
		echo "<p class=\"welcomeguest\">Welcome to David Watkins, " . $_GET["guest"] . "!</p>";
	}
	else if ($_COOKIE["guest"]) {
		echo "<p class=\"welcomeguest\">Welcome to David Watkins, " . $_COOKIE["guest"] . "!</p>";
	}
?>
<a href="#"><div id="revert" onClick="hideExtra();">Reset</div></a>
<div id="contentarea"><img src="largedwat.jpg" usemap="#map" style="margin-bottom: 0px;" /></div>
<map name="Map" id="map">
  <area id="telephone" shape="poly" coords="152,282,150,304,160,314,173,309,192,301,202,296,201,281,201,274,197,268,196,261,186,257,180,257,166,265" href="#" />
  <area id="rickroll" shape="poly" coords="207,91,218,91,218,99,217,109,210,117" href="#" />
  <area id="backstreet" shape="poly" coords="195,134,183,135,174,141,176,147,189,148,198,144" href="#" />
  <area id="mlwswoy" shape="poly" coords="286,447,279,465,277,488,287,492,299,495,310,495,320,479,317,459,311,453,303,450" href="#" />
  <area shape="poly" coords="233,253,235,267,271,261,271,248" href="http://universeischaos.tumblr.com/post/3533421416" />
  <area id="omelettes" shape="poly" coords="57,299,88,351,66,349,55,333,55,316" href="#" />
  <area id="omelettes2" shape="poly" coords="308,282,288,313,298,349,322,355,315,282" href="#">
  
  <area id="danny" shape="rect" coords="173,98,189,111" href="#" />
  <area id="magic" shape="poly" coords="133,105,158,78,191,71,209,88,214,76,199,56,176,44,152,49,132,66,126,88,-274,113" href="#" />
  <area id="tswift" shape="poly" coords="184,173,191,184,198,178,192,170" href="#" />
  <area id="vandalized" shape="poly" coords="140,112,132,106,128,114,137,125,147,132,151,130" href="#" />
</map>
<p id="reset"></p>
<!--<h3>To preview the up-and-coming davidofwatkins.com, <a href="http://beta.davidofwatkins.com/">click here.</a></h3>-->
<img id="loadingspinner" src="loadingspinner.gif" />
<center><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.davidofwatkins.com" show_faces="true" width="255" colorscheme="dark"></fb:like></center>
</body>
</html>

