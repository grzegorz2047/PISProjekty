<?php
	include_once("config.php");
	// Create connection
	function getDBConnection() {
		global $conn;
		if($conn != null) {
			return $conn;
		}
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
?>