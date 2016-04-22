<?php
	include "../../database.inc.php";

	if (isset($_POST['submit'])) {
		$file = $_FILES['file']['tmp_name'];

		$tableSelect = $_POST['table'];
		$table = 'Inventory';

		switch ($tableSelect) {
			case 0:
				$table = 'Inventory';
				break;
			case 1:
				$table = 'Model';
				break;
			case 2:
				$table = 'Customers';
				break;
			case 3:
				$table = 'Orders';
				break;
			case 4:
				$table = 'Payments';			
			default:
				$table = 'Inventory';
				break;
		}
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