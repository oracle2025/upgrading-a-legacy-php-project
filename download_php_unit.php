<?
function download_to_file($file, $url) {
	/**
	* Initialize the cURL session
	*/
	$ch = curl_init($url);
	/**
	* Set the URL of the page or file to download.
	*/
	//curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	
	/**
	* Create a new file
	*/
	$fp = fopen($file, 'w');
	/**
	* Ask cURL to write the contents to a file
	*/
	curl_setopt($ch, CURLOPT_FILE, $fp);
	/**
	* Execute the cURL session
	*/
	curl_exec ($ch);
	/**
	* Close cURL session and file
	*/
	curl_close ($ch);
	fclose($fp);
	return true;
}
	//'php:5.3', 'php:5.6
	$url = "https://phar.phpunit.de/phpunit-4.phar";
	$file = "phpunit";

	echo 'Current PHP version: ' . phpversion() . "\n";

	if (download_to_file($file, $url)) {
		echo "Success";
		exit(0);
	} else {
		echo "Failure";
		exit(1);
	}

?>
