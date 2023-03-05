<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset = "UTF-8">
		<title>Add a new client</title>
		<link rel = "stylesheet" href = "style_add.css">
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
		</style>
	</head>

	<body>
	
		<div class="box">
	

			<form autocomplete="off" action="" method="post">

				<h2>Add new client</h2>

				<div class="inputBox">
					<input id = "id" type = "text" required = "required" name = "id">
					<span>Client ID</span>
					<i></i>
				</div>

				<div class = "inputBox">
					<input id = "name" type = "text" required = "required" name = "name">
					<span>Name</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "surname" type = "text" required = "required" name = "surname">
					<span>Surname</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "cnp" type = "text" required = "required" name = "cnp">
					<span>CNP/SSN</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "email" type = "text" required = "required" name = "email">
					<span>Email</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "phone" type = "text" required = "required" name = "phone">
					<span>Phone number</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "street" type = "text" required = "required" name = "street">
					<span>Street</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "number" type = "text" required = "required" name = "number">
					<span>Number</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "city" type = "text" required = "required" name = "city">
					<span>City</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "county" type = "text" required = "required" name = "county">
					<span>County</span>
					<i></i>
				</div>

				<input type="submit" name="insert-btn" value="Add">
				

			</form>

            <?php
                 $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
                    if(isset($_POST['insert-btn'])){

                         $id = $_POST['id'];
                         $name = $_POST['name'];
                         $surname = $_POST['surname'];
                         $CNP = $_POST['cnp'];
                         $email = $_POST['email'];
                         $phone = $_POST['phone'];
                         $street = $_POST['street'];
                         $number = $_POST['number'];
                         $city = $_POST['city'];
                         $county = $_POST['county'];

                         $insert = "INSERT INTO client(ID_Client, Nume, Prenume, CNP, Email, Telefon, Strada, Numar, Oras, Judet) 
                                    VALUES('$id', '$surname', '$name', '$CNP', '$email', '$phone', '$street', '$number', '$city', '$county')";
                         $run_insert = mysqli_query($conn, $insert);
                    }
            ?>
		</div>
		<a href="view_clients.php" class="button">Return</a>
	</body>
</html>