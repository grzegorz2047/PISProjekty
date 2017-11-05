<?php
	include_once("sqlconnect.php");
	$sql = "CREATE DATABASE IF NOT EXISTS PIS";
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
	
	$sql = "CREATE TABLE IF NOT EXISTS Greets (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		author INT(6) NOT NULL,
		textarea TEXT NOT NULL
		)";
	$conn->query($sql);
?>