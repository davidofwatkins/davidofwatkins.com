<?php
	/* Used to download files such as PDF's with a download-friendly header
	(Content-Type: application/octet-stream, etc.) */

	if (!isset($_GET["file"]))
		die("No file specified.");

	$filename = $_GET["file"];
	if (strpos($filename,'../') === true)
		die("Invalid path.");

	$uri = "../../downloads/" . $filename;

	if (!file_exists($uri))
		die("File does not exist.");

	//Taken from: http://stackoverflow.com/a/8122372/477632
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Content-Type: application/force-download");
    header('Content-Disposition: attachment; filename=' . urlencode(basename($uri)));
    // header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($uri));
    ob_clean();
    flush();
    readfile($uri);
    exit;

?>