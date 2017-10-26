<?php
	include_once("config.php");
	include_once("sqlconnect.php");
	$sql = "CREATE DATABASE IF NOT EXISTS Opinie";
	$conn = getDBConnection();
	//echo "Connected successfully";
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->query($sql);
	if ($conn->query($sql) === TRUE) {
		//echo "Gut";
	} else {
		echo "Error creating table: " . $conn->error;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS Users (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		login VARCHAR(30) NOT NULL UNIQUE,
		password VARCHAR(200) NOT NULL,
		role VARCHAR(60) NOT NULL,
		session VARCHAR(200)
		)";
	$conn->query($sql);
?>