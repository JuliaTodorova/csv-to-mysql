<?php
	include "../../database.inc.php";
?>
<html lang="en">
<head>
	<title>Upload data</title>
</head>
<body>
	<form method="post" action="insert.php" enctype="multipart/form-data">
		<input type="file" name="file">
		<select name="table">
			<option name="0" value="0">Inventory</option>
			<option name="1" value="1">Model</option>
			<option name="2" value="2">Customers</option>
			<option name="3" value="3">Orders</option>
			<option name="4" value="4">Payments</option>
		</select>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>