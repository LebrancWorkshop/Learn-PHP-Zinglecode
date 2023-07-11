<?php

$hostname = 'db';
$username = 'root';
$password = 'p@ssw0rd';
$database = 'tutorials';
$port = 3306;

// mysqli_report(MYSQLI_REPORT_OFF);
$connection = mysqli_connect($hostname, $username, $password, $database, $port);

if(!$connection) {
	echo "Not Connected!" . mysqli_connect_error();;
} else {
	echo "Connected!";
}

?>
