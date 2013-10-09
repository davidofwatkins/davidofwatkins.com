<?php

	/* Settings and details for davidofwatkins.com */

	//Calculate the application root
    $appRootURL  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
	$appRootURL .= $_SERVER['SERVER_NAME'];
	$appRootURL .= htmlspecialchars($_SERVER['REQUEST_URI']);

	define(SITEVERSION, "1.1.2");
    define(SITEROOT, $appRootURL);
    
?>