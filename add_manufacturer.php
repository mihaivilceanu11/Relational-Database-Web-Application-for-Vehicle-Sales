<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset = "UTF-8">
		<title>Add a new manufacturer</title>
		<link rel = "stylesheet" href = "style_add2.css">
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

				<h2>Add a new manufacturer</h2>

				<div class="inputBox">
					<input id = "id" type = "text" required = "required" name = "id">
					<span>Manufacturer ID</span>
					<i></i>
				</div>

				<div class = "inputBox">
					<input id = "name" type = "text" required = "required" name = "name">
					<span>Name</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "country" type = "text" required = "required" name = "country">
					<span>Country of origin</span>
					<i></i>
				</div>

				<input type="submit" name="insert-btn" value="Add">
				

			</form>

            <?php
                 $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
                    if(isset($_POST['insert-btn'])){

                         $id = $_POST['id'];
                         $name = $_POST['name'];
                         $country = $_POST['country'];
                         

                         $insert = "INSERT INTO producator(ID_Producator, Denumire, TaraDeOrigine) 
                                    VALUES('$id', '$name', '$country')";
                         $run_insert = mysqli_query($conn, $insert);
                    }
            ?>
		</div>
			<a href="view_manufacturers.php" class="button">Return</a>
	</body>
</html>