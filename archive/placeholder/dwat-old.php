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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="David Of Watkins" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.davidofwatkins.com" />
<meta property="og:image" content="http://davidofwatkins.com/dwaticon.png" />
<meta property="og:site_name" content="davidofwatkins.com" />
<meta property="fb:admins" content="599009326" />
<title>David Of Watkins</title>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
<script type="text/javascript">

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
	/*font-family: Arial, Helvetica, sans-serif;*/
	font-family: 'Josefin Sans', arial, serif;
	font-size: 25px;
	text-align: center;
	color: #FFF;
	margin-top: 8px;
	/* CSS3 Background Gradient */
	background: -webkit-gradient(linear, left top, left bottom, from(#282828), color-stop(5%, black));
	background: -moz-linear-gradient(top, #282828, black 5%);
}
h1 {
	font-weight: normal;
	letter-spacing: 10px;
	font-size: 70px;
	margin: 20px 0 35px 0;
	
<?php
	
	$userAgent = strtoupper($_SERVER["HTTP_USER_AGENT"]);
	if (strpos($userAgent, "MOBILE") <= 0) {
		echo "\t-webkit-box-reflect: below -55px -webkit-gradient(linear,
                                                          left top,
                                                          left bottom,
                                                          from(transparent),
                                                          color-stop(35%, transparent),
                                                          to(rgba(255, 255, 255, 0.5))
                                                         );";
	}
	
?>
	
	
}
h2 {
	font-size: 45px;
	font-weight: normal;
	margin-top: 0;
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
	margin: 20px;
}
span iframe {
	text-align: center;
}

</style>
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
<?php
if ($_GET[extra] != "telephone" && $_GET[extra] != "rickroll" && $_GET[extra] != "backstreet" && $_GET[extra] != "mlwswoy") { ?>
    <img src="<?php echo $imgSrc ?>" usemap="#Map" style="margin-bottom: 0px;" />
    <map name="Map" id="Map">
      <area shape="poly" coords="152,282,150,304,160,314,173,309,192,301,202,296,201,281,201,274,197,268,196,261,186,257,180,257,166,265" href="<?php echo $_SERVER["PHP_SELF"]; ?>?extra=telephone" />
      <area shape="poly" coords="207,91,218,91,218,99,217,109,210,117" href="<?php echo $_SERVER["PHP_SELF"]; ?>?extra=rickroll" />
      <area shape="poly" coords="195,134,183,135,174,141,176,147,189,148,198,144" href="<?php echo $_SERVER["PHP_SELF"]; ?>?extra=backstreet" />
      <area shape="poly" coords="286,447,279,465,277,488,287,492,299,495,310,495,320,479,317,459,311,453,303,450" href="<?php echo $_SERVER["PHP_SELF"]; ?>?extra=mlwswoy" />
      <area shape="poly" coords="233,253,235,267,271,261,271,248" href="http://mymannequin.tumblr.com/post/3533421416" />
    <?php
    if ($_GET["extra"] != "danny") {
        echo "<area shape=\"rect\" coords=\"173,98,189,111\" href=\"" . $_SERVER["PHP_SELF"] . "?extra=danny\" />";
    }
    if ($_GET["extra"] != "magic") {
        echo "<area shape=\"poly\" coords=\"133,105,158,78,191,71,209,88,214,76,199,56,176,44,152,49,132,66,126,88,-274,113\" href=\"" . $_SERVER["PHP_SELF"] . "?extra=magic\" />";
    }
    if ($_GET["extra"] == "danny") {
        echo "<area shape=\"poly\" coords=\"396,267,370,263,361,256,350,233,315,214,272,210,242,212,235,225,225,231,214,232,215,244,215,252,216,263,223,268,233,273,232,278,229,291,229,296,234,301,247,308,252,319,258,331,267,340,288,340,300,345,301,363,299,377,291,390,282,393,271,393,256,404,232,412,222,415,204,413,167,399,118,372,90,351,73,330,70,320,66,316,62,325,64,338,60,343,50,350,50,363,55,381,71,386,94,387,124,418,163,443,183,457,199,462,219,459,219,479,222,494,239,496,261,478,311,482,330,528,352,560,378,572,395,567\" href=\"http://www.facebook.com/pages/Danny-Flanagan-Approves/178786642763\" alt=\"Danny Flanagan Approves\" />";
        echo "<area shape=\"rect\" coords=\"15,500,186,562\" href=\"http://www.facebook.com/pages/Danny-Flanagan-Approves/178786642763\" alt=\"http://www.facebook.com/pages/Danny-Flanagan-Approves/178786642763\" />";
    }
    if ($_GET["extra"] != "tswift") {
        echo "<area shape=\"poly\" coords=\"184,173,191,184,198,178,192,170\" href=\"" . $_SERVER["PHP_SELF"] . "?extra=tswift\" />";
    }
    if ($_GET["extra"] != "vandalized") {
        echo "<area shape=\"poly\" coords=\"140,112,132,106,128,114,137,125,147,132,151,130\" href=\"" . $_SERVER["PHP_SELF"] . "?extra=vandalized\" />";
    }
    ?>
<?php
}
else if ($_GET["extra"] == "telephone") {
	echo "<iframe title=\"YouTube video player\" class=\"youtube-player\" type=\"text/html\" width=\"640\" height=\"390\" src=\"http://www.youtube.com/embed/-fszGz-GAYM?rel=0&autoplay=1\" frameborder=\"0\"></iframe>";
}
else if ($_GET["extra"] == "rickroll") {
	echo "<iframe title=\"YouTube video player\" class=\"youtube-player\" type=\"text/html\" width=\"640\" height=\"390\" src=\"http://www.youtube.com/embed/4R-7ZO4I1pI?rel=0&autoplay=1\" frameborder=\"0\" allowFullScreen></iframe>";
}
else if ($_GET["extra"] == "backstreet") {
	echo '<iframe title="YouTube video player" width="640" height="390" src="http://www.youtube.com/embed/wfQfZ2XW88M?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
}
else if ($_GET["extra"] == "mlwswoy") {
	echo '<iframe title="YouTube video player" width="640" height="390" src="http://www.youtube.com/embed/IYGAQYEDkiU?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
}
?>
</map>
<h2>Coming Soon!</h2>
<center><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.davidofwatkins.com" show_faces="true" width="255" colorscheme="dark"></fb:like></center>
</body>
</html>

