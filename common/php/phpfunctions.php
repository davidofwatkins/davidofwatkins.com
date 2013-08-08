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
	function formatQuote($quoteXML) {
		$quote = '"' . $quoteXML->text . '"';
		if ($quoteXML->author != "") { $quote .= ' - ' . $quoteXML->author; }
		if ($quoteXML->source != "") { $quote .= ' (' . $quoteXML->source . ')'; }
		
		return $quote;
	}
	
	function getRandomFavQuote() {
		//Requires PHP 5 (at least) to work
		
		$xml = simplexml_load_file("common/xml/favorite-quotes.xml") or die("Could not access Favorite Quotes XML");
		$random = rand(0, sizeof($xml) - 1);
		$quoteXML = $xml->quote[$random];
		
		return formatQuote($quoteXML);
	}
	
	function listFavQuotes() {
		
		$xml = simplexml_load_file("common/xml/favorite-quotes.xml") or die("Could not access Favorite Quotes XML");
		$list = "<ol>";
		
		foreach ($xml as $quoteXML) {
				
			$list .= "<li>" . formatQuote($quoteXML) . "</li>";
		}
		
		$list .= "</ol>";
		return $list;
		
	}
	
	/**********************
	* Project Generation  *
	**********************/
	
	//Used to generate the list of projects on the Portfolio page
	function getProjectsFromXML() {
		$xml = simplexml_load_file("common/xml/projects.xml") or die("Could not access Projects XML");
		
		$output = "";
		
		foreach ($xml as $project) {
			
			$src;
			if ($project->mobilesrc && isMobile()) {
				$src = $project->mobilesrc;
			}
			else { $src = $project->src; }
			
			$output .= <<<_endhtml_
			<div class="project_item" id="$project->id" projtype="$project->category">
				<div class="project_leftside">
					<div class="project_title">$project->name <small>$project->helpertext</small></div>
					<p class="project_description">$project->description</p>
_endhtml_;

				//"View Project" Button
				if (!isMobile()) { //Print the button for desktop only here
					if ($src != "") {
						$output .= '<a class="button-wrapper" href="' . $src . '" target="_blank"';
						if ($project->linktolightbox == "true") { $output .= 'rel="shadowbox;height=510;width=853" title="' . $project->name . '"'; }
						$output .= ' ><div class="button">View Project</div></a>';
					}
					$output .= '</div>';
				}
				
				//Image
				if ($src != "") {
					$output .= '<a href="' . $src . '" target="_blank"';
					if ($project->linktolightbox == "true") { $output .= 'rel="shadowbox;height=510;width=853" title="' . $project->name . '"'; }
					$output .= '>';
				}
				$output .= '<img class="project_img" src="'. $project->imagepath . '"';
				if ($project->showimageshadow == "false") { $output .= 'style="box-shadow: none;"'; }
				$output .= ' />';
				if ($src != "") {
					$output .= '</a>';
				}
				
				//"View Project" Button
				if (isMobile()) { //Print the button for mobile only here
					if ($src != "") {
						$output .= '<a class="button-wrapper" href="' . $src . '" target="_blank"';
						if ($project->linktolightbox == "true") { $output .= 'rel="shadowbox;height=510;width=853" title="' . $project->name . '"'; }
						$output .= ' ><div class="button">View Project</div></a>';
					}
					$output .= '</div>';
				}
				
				$output .= '<div class="clearfloats"></div></div>';
		}
		
		return $output;
		
	}
?>