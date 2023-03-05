<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset = "UTF-8">
	<title>Add a new salesman</title>
	<link rel = "stylesheet" href = "style_sign_up.css">
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

				<h2>Add new salesman</h2>

				<div class="inputBox">
					<input id = "id" type = "text" required = "required" name = "id">
					<span>Salesman ID</span>
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
					<input id = "email" type = "text" required = "required" name = "email">
					<span>Email</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "phone" type = "text" required = "required" name = "phone">
					<span>Phone number</span>
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
                         $email = $_POST['email'];
                         $phone = $_POST['phone'];

                         $insert = "INSERT INTO agentvanzari(ID_Agent, Nume, Prenume, Email, Telefon) 
                                    VALUES('$id', '$surname', '$name', '$email', '$phone')";
                         $run_insert = mysqli_query($conn, $insert);
                    }
            ?>
		</div>
			<a href="view_salesmen.php" class="button">Return</a>
	</body>
</html>

                 
			