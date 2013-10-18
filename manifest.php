<?php

	/* Settings and details for davidofwatkins.com */

	//Calculate the application root (parent folder URL of this file)
    $protocol  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $appRootURL = $protocol . $_SERVER['HTTP_HOST'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__) . "/");

	define("SITEVERSION", "1.1.2");
    define("SITEROOT", $appRootURL);
?>