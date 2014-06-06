<?php

try{
	$db = new PDO("mysql:host=gfuretcom.fatcowmysql.com;dbname=movietest;","movieadmin","m0vi34dm1n");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec("SET NAMES 'utf8'");
	
} catch (Exception $e){
	echo "Could not connect to the db";
	exit;
}

?>