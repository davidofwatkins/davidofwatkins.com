<?php
	
	/**********************
	* Site-Wide Functions *
	**********************/

	function getPageUrl() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
		}
		else {
		 $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		}
		
		return $pageURL;
	}
	
	function ieversion() {
		ereg('MSIE ([0-9]\.[0-9])',$_SERVER['HTTP_USER_AGENT'], $reg);
		if(!isset($reg[1])) {
			return -1;
		}
		else {
			return floatval($reg[1]);
		}
	}
	
	function usesGCF() {
		if (strpos($_SERVER['HTTP_USER_AGENT'], "chromeframe")) {
			return true;
		}
		else { return false; }
	}
	
	function isMobile() {
		$useragent = strtolower($_SERVER["HTTP_USER_AGENT"]);
		if (strpos($useragent, "ipad")) { return false; }
		else if (strpos($useragent, "mobile")) { return true; }
		else if (strpos($useragent, "opera mini")) { return true; }
		else { return false; }
		
		/*require_once("Mobile_Detect.php");
		
		$browser = new Mobile_Detect();
		if (!$browser->isTablet()) { return $browser->isMobile(); }
		else { return false; }*/
	}
	
	function isTablet() {
		
		$useragent = strtolower($_SERVER["HTTP_USER_AGENT"]);
		if (strpos($useragent, "ipad")) { return true; }
		else if (strpos($useragent, "android") && !isMobile()) { return true; }
		
		/*require_once("Mobile_Detect.php");
		
		$browser = new Mobile_Detect();
		return $browser->isTablet();*/
		
		
	}
	
	/*************************
	* Record Viewer Stats    *
	**************************/
	
	function recordVisitorDetails() {
		
		if (!isset($_COOKIE["activevisitor"])) {
		
			//Eventually make class to interface with database in better, more modual fashion
			
			$db_name = "davidofw_main";
			$db_username = "davidofw_main";
			$db_pw = "XYWSUb2itdrAfwMWQIZm";
			$db_address = "localhost";
			
			//Connect to Database
			$db = new mysqli($db_address, $db_username, $db_pw, $db_name);
			//error reporting off //if ($db->connect_errno) { die("Error: failed to connect to database: " . $mysqli->connect_error); }
			
			if (isset($_SERVER["REMOTE_ADDR"])) { $ip = $_SERVER["REMOTE_ADDR"]; }
			else { $ip = "unknown"; }
			if (isset($_SERVER["HTTP_REFERER"])) { $referer = $_SERVER["HTTP_REFERER"]; }
			else { $referer = "unknown"; }
			if (isset($_SERVER["HTTP_USER_AGENT"])) { $userAgent = $_SERVER["HTTP_USER_AGENT"]; }
			else { $userAgent = "unknown"; }
			
			
			//Using prepared statements: http://mattbango.com/notebook/web-development/prepared-statements-in-php-and-mysqli/	
			/*$statement = $db->prepare('INSERT INTO visitor_info (ip_address, last_page_visited, browser_user_agent, log_time) VALUES (?, ?, ?, NOW());');
			$statement->bind_param("sss", $ip, $referer, $userAgent);
			$statement->execute();
			
			$db->close();*/
			
			//Write temporary cookie that will prevent recording for 12 hours
			setcookie("activevisitor", "true", time()+43200);
		}
			
	}
	
	/**********************
	* Quote Generation    *
	**********************/
	
	//Used by getRandomFavQuote() and listFavQuotes() to format quotations from XML
	function formatQuote($quote) {
		$formattedQuote = '"' . $quote->text . '"';
		if (isset($quote->author) && $quote->author != "") { $formattedQuote .= ' - ' . $quote->author; }
		if (isset($quote->source) && $quote->source != "") { $formattedQuote .= ' (' . $quote->source . ')'; }
		
		return $formattedQuote;
	}
	
	function getRandomFavQuote() {

		// Disabling quotes for now:
		return '';

		$raw = file_get_contents("common/json/favorite-quotes.json") or die("Could not access Favorite Quotes JSON");
		$json = json_decode($raw);
		$json = $json->quotes;

		foreach ($json as $key => $quote) {
			if (!$quote->active) { unset($json[$key]); }
		}
		$json = array_values($json); // Rebuild the array so there are no holes
		
		$random = rand(0, sizeof($json) - 1);
		return formatQuote($json[$random]);
	}
	
	function listFavQuotes() {
		$raw = file_get_contents("common/json/favorite-quotes.json") or die("Could not access Favorite Quotes JSON");
		$json = json_decode($raw);
		$json = $json->quotes;
		$list = "<ol>";

		foreach ($json as $quote) {
			if ($quote->active) {
				$list .= "<li>" . formatQuote($quote) . "</li>";
			}
		}
		
		$list .= "</ol>";
		return $list;
		
	}
	
	/**********************
	* Project Generation  *
	**********************/

	function getPortfolioProjects() {

		$json = file_get_contents("common/json/projects.json") or die("Could not access Projects JSON");
		$projects = json_decode($json, true); // convert to array
		$projects = $projects['projects'];

		//Make some adjustments...
		foreach ($projects as &$project) {

			$project = array_filter($project); //remove empty arrays

			//Replace src with mobile src if appropriate
			if (isset($project["mobilesrc"]) && isMobile()) {
				$project["src"] = $project["mobilesrc"];
				unset($project["mobilesrc"]);
			}
		}

		return $projects;
	}

	function dbg($content, $kill = true) {
		echo "<pre>" . print_r($content, true) . "</pre>";
		if ($kill) die();
	}
?>