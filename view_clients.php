<!DOCTYPE html>
<html?>

<head>
	  <meta charset = "UTF-8">
	  <title> Clients </title>
	  <link rel = "stylesheet" href = "style_tabel.css">

    <style>
        table, th, td {
          border: 2px solid black;
          border-collapse: collapse;
          }

        table.center {
          margin-left: auto; 
          margin-right: auto;
          }

        h1{
          font-weight: bold;
          color: orange;
          font-size: 50px;
          text-align:center;
 
        }
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
              
        .btn{

                  background-color: red;
                  border: solid;
                  color: navy;
                  padding: 10px 20px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 14px;
                  margin: 4px 2px;
                  cursor: pointer;

        }
        .btnedit{

                  background-color: green;
                  border: solid;
                  color: navy;
                  padding: 10px 20px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 14px;
                  margin: 4px 2px;
                  cursor: pointer;
                }
    </style>

      <header>
        <h1>Clients</h1>
        <br></br>
 
      </header>
</head>


<body>
<h1></h1>
  <br><br>
 <div class="container">
  <?php
    $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
    if(isset($_GET['del'])){
      $del_id = $_GET['del'];
      $delete = "DELETE FROM client WHERE ID_Client = '$del_id'";
      $run_delete = mysqli_query($conn, $delete);
    }
    ?>
    <table class="center">

      <thead>
        <tr>
          <th>ID</th>
          <th>Full name</th>
          <th>CNP/SSN</th>
          <th>Email</th>
          <th>Phone number</th>
          <th>Adress</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
        $select = "SELECT * FROM client";
        $run = mysqli_query($conn, $select);
        while($row = mysqli_fetch_array($run)){

        $ID_Client = $row['ID_Client'];
        $Nume = $row['Nume'];
        $Prenume = $row['Prenume'];
        $CNP = $row['CNP'];
        $Email = $row['Email'];
        $Telefon = $row['Telefon'];
        $Strada = $row['Strada'];
        $Numar = $row['Numar'];
        $Oras = $row['Oras'];
        $Judet = $row['Judet'];


      ?>

      <tr>
      <td><?php echo $ID_Client;?></td>
        <td><?php echo $Prenume; echo ' '; echo $Nume;?></td>
        <td><?php echo $CNP;?></td>
        <td><?php echo $Email;?></td>
        <td><?php echo $Telefon;?></td>
        <td><?php echo "Strada "; echo $Strada; echo " "; echo"Nr. "; echo $Numar; echo ","; echo $Oras; echo ","; echo $Judet?></td>
        <td><a class="btnedit" href="edit_client.php?edit=<?php echo $ID_Client;?>">Edit</a></td>
        <td><a class="btn" href="view_clients.php?del=<?php echo $ID_Client;?>" onclick="return confirm('Are you sure?')">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
    </table>

  </div>
  <a href="add_client.php" class="button">Add a new client</a>
  <a href="first_page.php" class="button">Return to main menu</a>
          
</body>
</html>