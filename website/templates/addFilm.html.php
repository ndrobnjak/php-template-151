<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Add Series</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once("../web/header.php");
?>
	<h3>Add Film</h3>
	<form method="POST">
	HEloou
		<label>
			Filmtitel:
			<input type="text" name="filmtitel" />
		</label>
		<br>
		<label>
			Beschreibung:
			<input type="text" name="beschreibung" />
		</label>
		<br>
		<input type="submit" name="addfilm" value="AddFilm" />
		
	</form>
</body>
</html>