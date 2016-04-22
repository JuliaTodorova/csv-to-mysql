<?php
	include "../../../database.inc.php";

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

		$handle = fopen($file,"r");

		while(($fileop = fgetcsv($handle, 1000, ",")) !== FALSE) {
			switch ($table) {
				case 'Inventory':
					$inventory = array($fileop[0], $fileop[1], $fileop[2], $fileop[3], $fileop[4]);
					$sql = mysqli_query($link, "INSERT INTO $table (serial_no, name, location, available, Model_model_no)
						VALUES ($inventory[0], '$inventory[1]', '$inventory[2]', $inventory[3], $inventory[4])");
					break;
				case 'Model':
					$model = array($fileop[0], $fileop[1], $fileop[2], $fileop[3], $fileop[4], $fileop[5], $fileop[6],
						$fileop[7], $fileop[8], $fileop[9], $fileop[10], $fileop[11], $fileop[12], $fileop[13], $fileop[14],
						$fileop[15], $fileop[16], $fileop[17], $fileop[18], $fileop[19], $fileop[20], $fileop[21]);

					$sql = mysqli_query($link, "INSERT INTO $table (model_no, model_name, length, brand, price, beds, 
						baths, crew, year_built, beam, draft, type, class, flag, engine_type, tonnage, construction, 
						cruising_speed, max_seed, external_design, interior_design, number_guests) 
						VALUES ($model[0], '$model[1]', $model[2], '$model[3]', $model[4], $model[5], $model[6], $model[7], $model[8],
							 $model[9], $model[10], '$model[11]', '$model[12]', '$model[13]', '$model[14]', $model[15], '$model[16]',
							  $model[17], $model[18], $model[19], '$model[20]', '$model[21]')");
					break;
				case 'Customers':
					break;
				case 'Orders':
					break;
				case 'Payments':
					break;
				default:
					break;
			}
		}	
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