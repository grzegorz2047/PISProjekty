<?php
	include_once('config.php');
	include_once('sqlconnect.php');
	include_once("sqlinit.php");
	session_start();
	echo "Usuwam session <br>";
	echo $_SESSION['session'];
	$conn = getDBConnection();
	$stmt = $conn->prepare("UPDATE Users SET session='' WHERE session = ?");
	$stmt->bind_param("s", $_SESSION['session']);
	$stmt->execute();
	$stmt->close();
	echo "Niby usunalem";
	
	session_unset(); 
	session_destroy(); 

?>