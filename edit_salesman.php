<!DOCTYPE html>
<html lang="en">

  <head>
	  <meta charset = "UTF-8">
	  <title>Edit salesman</title>
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
	
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
    if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];

        $select = "SELECT * FROM agentvanzari WHERE ID_Agent = $edit_id";
        $run = mysqli_query($conn, $select);
        
        $row = mysqli_fetch_array($run);
        $ID = $row['ID_Agent'];
        $Surname = $row['Nume'];
        $Name = $row['Prenume'];
        $Email = $row['Email'];
        $Phone = $row['Telefon']; 
    }
    ?>
		<div class="box">
                

			<form autocomplete="off" action="" method="post">

				<h2>Edit salesman</h2>

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

				<input type="submit" name="insert-btn" value="Edit">
				

			</form>

            <?php
                 $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
                    if(isset($_POST['insert-btn'])){
                        
                         $uname = $_POST['name'];
                         $usurname = $_POST['surname'];
                         $uemail = $_POST['email'];
                         $uphone = $_POST['phone'];

                         $update = "UPDATE agentvanzari 
                                    SET Nume = '$usurname', Prenume = '$uname', Email = '$uemail', Telefon = '$uphone' 
                                    WHERE ID_Agent = '$edit_id' ";
                         $run_update = mysqli_query($conn, $update);
      
                    }
                    ?>
              </div>
        <a href="view_salesmen.php" class="button">Return</a>
  </body>
</html>