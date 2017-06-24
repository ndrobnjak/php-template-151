<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once("../web/header.php");
?>
	<h3>Register</h3>
	<form method="POST">
		<p><?=  (isset($msg)) ? $msg: "" ?></p>
		<label>
			Email:
			<input type="email" name="email" />
		</label>
		<br>
		<label>
			Username:
			<input type="text" name="username" />
		</label>
		<br>
		<label>
			Passwort:
			<input type="password" name="pw" />
		</label>
		<br>
		<label>
			Vorname:
			<input type="text" name="vorname" />
		</label>
		<br>
		<label>
			Nachname:
			<input type="text" name="nachname" />
		</label>
		<br>
		<label>
			Strasse:
			<input type="text" name="strasse" />
		</label>
		<br>
		<label>
			Ort:
			<input type="text" name="ort" />
		</label>
		<br>
		<input type="submit" name="register" value="Register" />
	
	</form>
</body>
</html>