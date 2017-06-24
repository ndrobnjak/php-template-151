<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Filme</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once("../web/header.php");
?>
	<h3>Filme</h3>
	<form method="POST">
		<?php print_r ($data) ?>
		Film 1:
		<br>
		Filmtitel: <?php $data[0] ?>
	</form>
</body>
</html>