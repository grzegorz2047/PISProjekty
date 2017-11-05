<?php
	include_once("sqlconnect.php");
	include_once("sessionchecker.php");
	$session = $_SESSION['session'];
	if(isset($_SESSION['session'])) {
		echo "Jestes zalogowany! Twoja sesja to: ".$session."<br>";
		echo "Twoja rola to: ".getRole($session);
	}else {
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Members area</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/styles.css?v=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
		<![endif]-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<form class="form-horizontal" method="get" action="insertgreeting.php">
		  <fieldset>
			<legend>Add your own greetings on main site</legend>
			<div class="form-group">
			  <label for="textArea" class="col-lg-2 control-label">Textarea</label>
			  <div class="col-lg-10">
				<textarea class="form-control" rows="3" id="textArea"></textarea>
				<span class="help-block">Type your greetings</span>
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-lg-10 col-lg-offset-2">
				<button type="submit" class="btn btn-primary">Submit</button>
			  </div>
			</div>
		  </fieldset>
		</form>
	</body>
</html>