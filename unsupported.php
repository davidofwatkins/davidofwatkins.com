<?php
	if ($_GET["redirect"]) {
		$redirectUrl = $_GET["redirect"];
	}
	else {
		$redirectUrl = "/index.php";
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Unsupported Browser</title>
<style>
	* { margin: 0; padding: 0; }
	a, a:visited, a:active, a:focus { color: #09F; }	
	a img { border: none; }
	a div#continuebutton {
		color: black;
		text-decoration: none;
		cursor: hand;
	}
	#conash3D0 {height:0px; top:-1px; display: none;}
	body {
		background: #000;
		color: #FFF;
		font-family: Tahoma, Geneva, sans-serif;
		font-size: 16px;
	}
	div#content {
		background: #333;
		width: 880px;
		margin: auto;
		padding: 15px 40px;
		text-align: center;
	}
	h1 {
		margin: 30px auto 20px auto;
		font-weight: normal;
	}
	td {
		padding: 10px;
		text-align: center;
	}
	table {
		margin: auto;
	}
	div#tablecontainer {
		margin: 20px auto;
		padding: 25px;
		background: #666;
	}
	div#continuebutton {
		width: 300px;
		margin: 20px auto;
		padding: 10px;
		background: #06F;
		border: #006 solid 1px;
		font-weight: bold;
	}
</style>
</head>

<body>
	<div id="content">
    	<h1>Please upgrade to a modern browser.</h1>
        <p>It looks like you're using an old version of Internet Explorer (IE8 or under) to view this site.  While it should still function correctly on your browser, davidofwatkins.com takes advantage of several modern standards such as CSS3 and HTML5 that are only available in "modern browsers" to make the site more aesthetically pleasing and promote such modern standards.  Aside from the visual reasons of this site specifically, modern browsers (including newer versions of Internet Explorer) contain several security, stability, speed, and standards-compliant features that simply are not available to your version of Internet Explorer.  It is recommended that you upgrade your browser to one of the following, although you can also install <a href="http://www.google.com/chromeframe/eula.html">Google Chrome Frame</a> to run as an add-on inside of IE, if you are not ready to upgrade.</p>
        <div id="tablecontainer">
        <table>
        	<tr>
            	<td><a href="http://chrome.google.com/"><img src="../images/browsers/chrome.png" width="128" height="128" alt="Google Chrome"></a></td>
                <td><a href="http://www.mozilla.com/en-US/firefox/"><img src="../images/browsers/ff.png" width="128" height="128" alt="Mozilla Firefox"></a></td>
                <td><a href="http://www.apple.com/safari/"><img src="../images/browsers/safari.png" width="128" height="128" alt="Apple Safari"></a></td>
                <td><a href="http://www.opera.com/"><img src="../images/browsers/opera.png" width="128" height="128" alt="Opera"></a></td>
                <td><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie-9/home"><img src="../images/browsers/ie9.png" width="128" height="128" alt="Internet Explorer 9"></a></td>
            </tr>
            <tr>
            	<td>Google Chrome</td>
                <td>Mozilla Firefox</td>
                <td>Apple Safari</td>
                <td>Opera</td>
                <td>Internet Explorer 9<br />(Windows Vista/7)</td>
            </tr>
        </table>
        </div>
        <p>If you want to proceed with your current browser, click the button below:</p>
        <a href="<?php echo $redirectUrl; ?>?ie=allowed"><div id="continuebutton">Continue with my current browser...</div></a>
    </div>
</body>
</html>
