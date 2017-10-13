<?php 
	if(isset($_POST['inputUsername'])) {			
		echo "Zostales zarejestrowany ".$_POST['inputUsername']."\r\n";
	}/*
	echo "Post test:"."\r\n";
	foreach($_POST as $key => $value) {
		echo "Post ma: ".$key." ".$value."\r\n";
	}*/
 	header("Location:login.php?start=registered");
	exit;
?>