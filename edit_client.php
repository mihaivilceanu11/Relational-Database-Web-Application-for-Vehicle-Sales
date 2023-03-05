<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset = "UTF-8">
	<title>Edit client</title>
	<link rel = "stylesheet" href = "style_edit.css">
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
	
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
    if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];

        $select = "SELECT * FROM client WHERE ID_Client = $edit_id";
        $run = mysqli_query($conn, $select);
        
        $row = mysqli_fetch_array($run);
        $ID = $row['ID_Client'];
        $Surname = $row['Nume'];
        $Name = $row['Prenume'];
        $CNP = $row['CNP'];
        $Email = $row['Email'];
        $Phone = $row['Telefon'];
        $Street = $row['Strada'];
        $Number = $row['Numar'];
        $City = $row['Oras'];
        $County = $row['Judet'];  
    }
    ?>
		<div class="box">
                

			<form autocomplete="off" action="" method="post">

				<h2>Edit client</h2>

                <div class = "inputBox">
					<input id = "name" value =<?php echo $Name; ?> type = "text" required = "required" name = "name">
					<span>Name</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "surname" value =<?php echo $Surname; ?> type = "text" required = "required" name = "surname">
					<span>Surname</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "email" value =<?php echo $Email; ?> type = "text" required = "required" name = "email">
					<span>Email</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "phone" value =<?php echo $Phone; ?> type = "text" required = "required" name = "phone">
					<span>Phone number</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "street" value =<?php echo $Street; ?> type = "text" required = "required" name = "street">
					<span>Street</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "number" value =<?php echo $Number; ?> type = "text" required = "required" name = "number">
					<span>Number</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "city" value =<?php echo $City; ?> type = "text" required = "required" name = "city">
					<span>City</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "county" value =<?php echo $County; ?> type = "text" required = "required" name = "county">
					<span>County</span>
					<i></i>
				</div>

				<input type="submit" name="insert-btn" value="Edit">
				

			</form>

            <?php
                 $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
                    if(isset($_POST['insert-btn'])){
                        
                         $uname = $_POST['name'];
                         $usurname = $_POST['surname'];
                         $uemail = $_POST['email'];
                         $uphone = $_POST['phone'];
                         $ustreet = $_POST['street'];
                         $unumber = $_POST['number'];
                         $ucity = $_POST['city'];
                         $ucounty = $_POST['county'];

                         $update = "UPDATE client 
                                    SET Nume = '$usurname', Prenume = '$uname', Email = '$uemail', Telefon = '$uphone',
                                        Strada = '$ustreet', Numar = '$unumber', Oras = '$ucity', Judet = '$ucounty' 
                                    WHERE ID_Client = '$edit_id' ";
                         $run_update = mysqli_query($conn, $update);

                         
                    }
            ?>
        </div>
        <a href="view_clients.php" class="button">Return</a>
    </body>
</html>