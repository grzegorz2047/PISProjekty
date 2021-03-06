<html lang="pl">
<head>
	<meta charset="utf-8">

	<title>Pozdrowienia</title>
	<meta name="description" content="Opinie">
	<meta name="author" content="Grzegorz2047">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=3, shrink-to-fit=no">
 
</head>

<body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<?php
	include_once('sqlinit.php');
	echo "<a href='index.php' class='btn btn-primary right'>Strona główna</a>";
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
		mysqli_stmt_bind_result($stmt, $name, $role);

		$found = false;
		/* fetch values */
		while (mysqli_stmt_fetch($stmt)) {
			$found = true;
		}
		if (!$found) {
			$stmt->close();
			die("Podany login lub hasło jest niepoprawne");	
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
	</body>
</html>