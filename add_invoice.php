<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset = "UTF-8">
		<title>Add a new invoice</title>
		<link rel = "stylesheet" href = "style_add4.css">
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

				<h2>Add a new invoice</h2>

				<div class="inputBox">
					<input id = "id" type = "text" required = "required" name = "id">
					<span>Invoice Number</span>
					<i></i>
				</div>

				<div class = "inputBox">
					<input id = "vehicleid" type = "text" required = "required" name = "vehicleid">
					<span>Vehicle ID</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "salesmanid" type = "text" required = "required" name = "salesmanid">
					<span>Salesman ID</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "clientid" type = "text" required = "required" name = "clientid">
					<span>Client ID</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "value" type = "text" required = "required" name = "value">
					<span>Value</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "date" type = "text" required = "required" name = "date">
					<span>Date YYYY-MM-DD HH:MM:SS </span>
					<i></i>
				</div>

				<input type="submit" name="insert-btn" value="Add">
				

			</form>

            <?php
                 $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
                    if(isset($_POST['insert-btn'])){

                         $id = $_POST['id'];
                         $vehicleid = $_POST['vehicleid'];
                         $salesmanid = $_POST['salesmanid'];
                         $clientid = $_POST['clientid'];
                         $value = $_POST['value'];
                         $date = $_POST['date'];
                         

                         $insert = "INSERT INTO factura (ID_Factura, ID_Auto, ID_Agent, ID_Client, Data, Valoare) 
                                    VALUES('$id', '$vehicleid', '$salesmanid', '$clientid', '$date', '$value')";
                         $run_insert = mysqli_query($conn, $insert);
                    }
            ?>
		</div>
			<a href="view_invoices.php" class="button">Return</a>
	</body>
</html>