<?php
	include_once("sqlconnect.php");
	
	if(isset($_POST['inputUsername']) && isset($_POST['inputPassword'])) {
		$conn = getDBConnection();
		$stmt = $conn->prepare("SELECT password, role FROM Users WHERE  (login = ? AND password = ?)");
		$stmt->bind_param("ss", $login, $password);
		$login = $_POST['inputUsername'];
		$password = hash('sha256', $_POST['inputPassword']);
		$answer = $stmt->execute();
		$error = $conn->error;
		//echo "Wstawilem ".$login." oraz ".$password;
 		if($error != "") {
			$stmt->close();
			die("Podany login juz istnieje!");
		}
		//$result = mysql_query($sql);
		/* bind result variables */
		mysqli_stmt_bind_result($stmt, $name, $code);

		/* fetch values */
		while (mysqli_stmt_fetch($stmt)) {
			printf ("%s (%s)\n\r", $name, $code);
		}
		session_start();
		$session = $_SESSION['session'] = hash('sha256', $login.$password.time());
		$_SESSION['login'] = $login;

		$stmt = $conn->prepare("UPDATE Users SET session = ? WHERE login = ?");
		$stmt->bind_param("ss", $session, $login);
		$stmt->execute();
		$stmt->close();
		echo "Zostales zalogowany ".$_POST['inputUsername']."\r\n";
			
		header("Location:membersarea.php");
		exit;
	}
	/*
	
	echo "Post test:"."\r\n";
	foreach($_POST as $key => $value) {
		echo "Post ma: ".$key." ".$value."\r\n";
	}*/
?>