<?php

try {
	$db = new PDO("mysql:host=localhost;dbname=temp;port=3306","root","");
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
	echo "Unable to connect";
	echo $e->getMessage();
	exit;
}