<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset = "UTF-8">
		<title>Add a new vehicle</title>
		<link rel = "stylesheet" href = "style_add3.css">
    	<style>
			.button {
                		background-color: orange;
                		border: dashed;
                		color: navy;
                		padding: 15px 32px;
                		text-align: center;
                		text-decoration: none;
                		display: inline-block;
                		font-size: 24px;
                		margin: 4px 2px;
                		cursor: pointer;
                	}

			.button:hover {
              background-color: blueviolet
            }

        	.button:active {
                background-color: blueviolet;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
              }
		</style>
	</head>

	<body>
	
		<div class="box">
	

			<form autocomplete="off" action="" method="post">

				<h2>Add new vehicle</h2>

				<div class="inputBox">
					<input id = "id" type = "text" required = "required" name = "id">
					<span>Vehicle ID</span>
					<i></i>
				</div>

				<div class = "inputBox">
					<input id = "manid" type = "text" required = "required" name = "manid">
					<span>Manufacturer ID</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "specsid" type = "text" required = "required" name = "specsid">
					<span>Specifications ID</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "vin" type = "text" required = "required" name = "vin">
					<span>VIN</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "year" type = "text" required = "required" name = "year">
					<span>Year</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "fuel" type = "text" required = "required" name = "fuel">
					<span>Fuel</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "mileage" type = "text" required = "required" name = "mileage">
					<span>Mielage</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "model" type = "text" required = "required" name = "model">
					<span>Model</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "engine" type = "text" required = "required" name = "engine">
					<span>Engine</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "price" type = "text" required = "required" name = "price">
					<span>Price</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "transmission" type = "text" required = "required" name = "transmission">
					<span>Transmission</span>
					<i></i>
				</div>

				<input type="submit" name="insert-btn" value="Add">
				

			</form>

            <?php
                 $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
                    if(isset($_POST['insert-btn'])){

                         $id = $_POST['id'];
                         $manid = $_POST['manid'];
                         $specsid = $_POST['specsid'];
                         $vin = $_POST['vin'];
                         $year = $_POST['year'];
                         $fuel = $_POST['fuel'];
                         $mileage = $_POST['mileage'];
                         $model = $_POST['model'];
                         $engine = $_POST['engine'];
                         $price = $_POST['price'];
                         $transmission = $_POST['transmission'];

                         $insert = "INSERT INTO autovehicul (ID_Auto, ID_Producator, SerieDeSasiu, Model, An, Kilometraj, Combustibil, Transmisie, Motorizare, Pret, ID_Specificatii) 
                                        VALUES('$id', '$manid', '$vin', '$model', '$year', '$mileage', '$fuel', '$transmission', '$engine', '$price', '$specsid');";
                         $run_insert = mysqli_query($conn, $insert);
                    }
            ?>
		</div>
		<a href="view_vehicles.php" class="button">Return</a>
	</body>
</html>