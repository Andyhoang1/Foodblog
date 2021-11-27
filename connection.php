<?php

$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";
$dbname = 'foodblog';

try {
	$PDO = new PDO("mysql:host=$servername;dbname=foodblog", $username, $password);
	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>