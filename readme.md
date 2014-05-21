# davidofwatkins.com

## About davidofwatkins.com

davidofwatkins.com is a portfolio site and internet 

**Author:** [+David Watkins](https://plus.google.com/104494880066441442910) ([@davidwatkinz](https://twitter.com/davidwatkinz))

Stable release: <https://davidofwatkins.com>
Beta release: <https://beta.davidofwatkins.com>

## Getting Started

Davidofwatkins.com does not require a very complicated environment. It will run on a basic LAMP server.
However, there is one important step when cloning the repository. Create a `settings_local.php` file and define
the domain of the site like so:

	<?php
		$appRootURL = 'http://localhost:8080/';
	?>

## Changelog

### v1.1.2

- Added landing page for CC Housing (/landing/cchousing/)
- Added link in portfolio to CC Housing landing page
- Added link in portfolio to CC Shuttle Tracker GitHub repository

### v1.1

- Added automatic profile picture rotation every 60 seconds
- Added site-wide responsive design for mobile, tablet, and desktop
- Added social Twitter Card API support
- Added manifest file
- Updated front-page text
- Updated portfolio page design and projects
- Updated site-wide button styling
- Updated social meta descriptions, etc.
- Updated resume download type (direct file download)
- Updated resume
- Updated all links to be absolute using SITEROOT variable
- Updated jQuery
- Fixed broken Twitter widget