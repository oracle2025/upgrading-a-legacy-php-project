<?
	//'php:5.3', 'php:5.6
	$url = "https://phar.phpunit.de/phpunit-4.phar";
	$file = "phpunit";

	echo 'Current PHP version: ' . phpversion() . "\n";

	if (file_put_contents($file, file_get_contents($url))) {
		echo "Success";
		exit(0);
	} else {
		echo "Failure";
		exit(1);
	}

?>
