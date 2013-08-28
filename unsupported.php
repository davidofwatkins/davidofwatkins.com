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
	a, a:visited, a:active, a:focus { color: #09F; text-decoration: none; }	
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
	p {
		line-height: 2em;
	}
</style>
</head>

<body>
	<div id="content">
    	<h1>Uh oh. You might want a better browser.</h1>

        <p>It looks like you're using an older version of Internet Explorer. Davidofwatkins.com uses several new web standards that may cause problems in your browser. Newer browsers contain security, stability, speed, design, and standards-compliant improvements that are not available to your version of Internet Explorer. To improve your experience on this <i>and other</i> sites, please consider trying one of the following ASAP:</p>
        
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
                <td>Internet Explorer 9<br />(Windows Vista or later)</td>
            </tr>
        </table>
        </div>
        <p>If you want to proceed without upgrading, click here:</p>
        <a href="<?php echo $redirectUrl; ?>?ie=allowed"><div id="continuebutton">Continue anyway...</div></a>
    </div>
</body>
</html>
