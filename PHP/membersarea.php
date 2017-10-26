<?php
	include_once("sqlconnect.php");
	include_once("sessionchecker.php");
	$session = $_SESSION['session'];
	if(isset($_SESSION['session'])) {
		echo "Jestes zalogowany! Twoja sesja to: ".$session."<br>";
		echo "Twoja rola to: ".getRole($session);
	}
?>