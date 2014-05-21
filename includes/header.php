<?php
    require_once("settings.php");
    require_once("common/php/phpfunctions.php");
?>
<?php
    
	//Record visitor info to database:
	recordVisitorDetails();

	//Allow for IE 8 or below if the user's consented.
	if ((isset($_GET["ie"]) && $_GET["ie"] == "allowed") || (isset($_COOKIE["ieallowed"]) && $_COOKIE["ieallowed"] == "true")) {
		setcookie("ieallowed", "true", time() + 2592000); //30 days
	}
	
	//If the user is running IE8 or below, redirect to the error page
	else if (ieversion() < 9 && ieversion() != -1 && !usesGCF()) {
		header("Location: " . SITEROOT . "unsupported.php?redirect=" . getPageUrl());
	}

	//Create profile pictures array					
	$profilePics = glob("images/profilepics/*.*");			
    foreach ($profilePics as &$pic) {
        $pic = SITEROOT . $pic;
    }
    $range = count($profilePics);
	$random = rand() % $range;

    //Suggested to be under 160 cars
    $metaDescription = "I'm David Watkins: developer, video editor, tech enthusiast, and musician. I received my B.S. in CIT and minored in Web Development at Champlain College.";
?>

<?php if(!isset($_REQUEST["mode"]) || $_REQUEST["mode"] != "ajax"): //Do not include header info if page is being accessed via AJAX ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" itemscope itemtype="http://schema.org/Person"><head>
    <meta charset=utf-8" />
    
    <meta name="description" content="<?= $metaDescription ?>" />
    <meta name="keywords" content="david,owen-frederic,watkins,champlain,web,developer,development,java,php,javascript,xml,mysql,sql,python,programming,design,music,guitar" />
    
    <!-- Google +1 Button Meta Info -->
    <meta itemprop="name" content="David Of Watkins">
    <meta itemprop="description" content="<?= $metaDescription ?>">
    
    <!-- Facebook Like Button Meta Info -->
    <meta property="og:title" content="David Of Watkins" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://davidofwatkins.com" />
    <meta property="og:image" content="http://davidofwatkins.com/images/profileicon-perminent.jpg" />
    <meta property="og:site_name" content="David Of Watkins" />
    <meta property="fb:admins" content="599009326" />

    <!-- Twitter Card Meta Info -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@davidwatkinz">
    <meta name="twitter:title" content="David Watkins">
    <meta name="twitter:description" content="<?= $metaDescription ?>">
    <meta name="twitter:creator" content="@davidwatkinz">
    <meta name="twitter:image:src" content="http://davidofwatkins.com/images/profileicon-perminent.jpg">
    <meta name="twitter:domain" content="davidofwatkins.com">
    <meta name="twitter:app:name:iphone" content="">
    <meta name="twitter:app:name:ipad" content="">
    <meta name="twitter:app:name:googleplay" content="">
    <meta name="twitter:app:url:iphone" content="">
    <meta name="twitter:app:url:ipad" content="">
    <meta name="twitter:app:url:googleplay" content="">
    <meta name="twitter:app:id:iphone" content="">
    <meta name="twitter:app:id:ipad" content="">
    <meta name="twitter:app:id:googleplay" content="">
    
    <!-- Google +1 Button -->
    <script type="text/javascript">
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/platform.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>
    
    <title><?php echo $TITLE; ?></title>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light|Raleway:100|Oswald|Rancho' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?= SITEROOT ?>common/js/jquery.js"></script>
    <script type="text/javascript" src="<?= SITEROOT ?>common/js/jquery-resize-plugin.js"></script>
    <script type="text/javascript" src="<?= SITEROOT ?>common/js/functions.js"></script>
    
    <?php
		echo '<link href="' . SITEROOT . 'common/style/layout.css" rel="stylesheet" type="text/css" />';
        echo '<link href="' . SITEROOT .'common/style/style.css" rel="stylesheet" type="text/css" />';
         echo '<link href="' . SITEROOT .'common/style/responsive.css" rel="stylesheet" type="text/css" />';
	
		if (!isTablet()) { echo '<script type="text/javascript" src="' . SITEROOT . 'common/js/fixedsidebar.js"></script>'; }
		echo '<script type="text/javascript" src="' . SITEROOT . 'common/js/desktop-js-functions.js"></script>';
    ?>
    
    <?php
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, text-size=normal">';
	?>
    
    <?php if (isset($EXTRA_HEAD)) echo $EXTRA_HEAD; ?>
    
    <?php if (isset($_GET["harlem"])): ?>
    <!-- Harlem Shake easter egg -->
    <script>$(document).ready(function() { (function(){function c(){var e=document.createElement("link");e.setAttribute("type","text/css");e.setAttribute("rel","stylesheet");e.setAttribute("href",f);e.setAttribute("class",l);document.body.appendChild(e)}function h(){var e=document.getElementsByClassName(l);for(var t=0;t<e.length;t++){document.body.removeChild(e[t])}}function p(){var e=document.createElement("div");e.setAttribute("class",a);document.body.appendChild(e);setTimeout(function(){document.body.removeChild(e)},100)}function d(e){return{height:e.offsetHeight,width:e.offsetWidth}}function v(i){var s=d(i);return s.height>e&&s.height<n&&s.width>t&&s.width<r}function m(e){var t=e;var n=0;while(!!t){n+=t.offsetTop;t=t.offsetParent}return n}function g(){var e=document.documentElement;if(!!window.innerWidth){return window.innerHeight}else if(e&&!isNaN(e.clientHeight)){return e.clientHeight}return 0}function y(){if(window.pageYOffset){return window.pageYOffset}return Math.max(document.documentElement.scrollTop,document.body.scrollTop)}function E(e){var t=m(e);return t>=w&&t<=b+w}function S(){var e=document.createElement("audio");e.setAttribute("class",l);e.src=i;e.loop=false;e.addEventListener("canplay",function(){setTimeout(function(){x(k)},500);setTimeout(function(){N();p();for(var e=0;e<O.length;e++){T(O[e])}},15500)},true);e.addEventListener("ended",function(){N();h()},true);e.innerHTML=" <p>If you are reading this, it is because your browser does not support the audio element. We recommend that you get a new browser.</p> <p>";document.body.appendChild(e);e.play()}function x(e){e.className+=" "+s+" "+o}function T(e){e.className+=" "+s+" "+u[Math.floor(Math.random()*u.length)]}function N(){var e=document.getElementsByClassName(s);var t=new RegExp("\\b"+s+"\\b");for(var n=0;n<e.length;){e[n].className=e[n].className.replace(t,"")}}var e=30;var t=30;var n=350;var r=350;var i="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake.mp3";var s="mw-harlem_shake_me";var o="im_first";var u=["im_drunk","im_baked","im_trippin","im_blown"];var a="mw-strobe_light";var f="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake-style.css";var l="mw_added_css";var b=g();var w=y();var C=document.getElementsByTagName("*");var k=null;for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){if(E(A)){k=A;break}}}if(A===null){console.warn("Could not find a node of the right size. Please try a different page.");return}c();S();var O=[];for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){O.push(A)}}})() });</script>
    <?php endif; ?>
    
    <script>
        //Load all the profile pictures into an array
        var profilePics = <?= json_encode($profilePics) ?>;
        $(document).ready(function() {
            setInterval(function() {
                switchProfilePic(profilePics);
            }, 60000);

            //When user clicks the image, rotate it manually
            $("div#header img").click(function() {
                switchProfilePic(profilePics);
                return false;
            })
        });
    </script>

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
</head>

<body>
    <!-- Facebook Like Button -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <?php
	
	if (strpos(SITEROOT, "beta.davidofwatkins.com") > 0) {
		echo '<div id="betabanner">You are currently viewing an unstable and in-development version of davidofwatkins.com. <a href="http://davidofwatkins.com">Click here</a> to view the released version of the site.</div>';
	} 
	
	?>
    
    
	<div id="header"><div id="hcontainer"><a href="#"><img src="<?= $profilePics[$random] ?>" width="146" height="176"></a>
	<h1>davidofwatkins<span id="header-suffix">.com</span></h1></div></div>
    <?php include("includes/navbar.php"); ?>
    <div id="container">
    	<?php include("includes/sidebar.php"); ?>
	
<?php endif; ?>