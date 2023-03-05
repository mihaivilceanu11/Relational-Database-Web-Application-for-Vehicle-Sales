<!DOCTYPE html>
<html?>

<head>
	    <meta charset = "UTF-8">
	    <title> Salesmen </title>
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
          padding-top:1px;
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
      </style>

      <header>
        <h1>Salesmen</h1>
        <br></br>
  
      </header>

</head>


<body>

<h1></h1>

  <br></br>
<div class="container">
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
    if(isset($_GET['del'])){
      $del_id = $_GET['del'];
      $delete = "DELETE FROM agentvanzari WHERE ID_Agent = '$del_id'";
      $run_delete = mysqli_query($conn, $delete);
    }
    ?>
    <table class="center">

      <thead>
        <tr>
          <th>Salesman ID</th>
          <th>Name</th>
          <th>Surname</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
        $select = "SELECT * FROM agentvanzari";
        $run = mysqli_query($conn, $select);
        while($row_agent = mysqli_fetch_array($run)){

        $ID_Agent = $row_agent['ID_Agent'];
        $Nume = $row_agent['Nume'];
        $Prenume = $row_agent['Prenume'];
        $Email = $row_agent['Email'];
        $Telefon = $row_agent['Telefon'];

      ?>

      <tr>
      <td><?php echo $ID_Agent;?></td>
        <td><?php echo $Prenume;?></td>
        <td><?php echo $Nume;?></td>
        <td><?php echo $Email;?></td>
        <td><?php echo $Telefon;?></td>
        <td><a class="btnedit" href="edit_salesman.php?edit=<?php echo $ID_Agent;?>">Edit</a></td>
        <td><a class="btn" href="view_salesmen.php?del=<?php echo $ID_Agent;?>" onclick="return confirm('Are you sure?')">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
    </table>

    
</div>   
      <a href="add_salesman.php" class="button">Add a new salesman</a>
      
      <a href="salesmen_total.php" class="button">See earnings</a>

      <a href="first_page.php" class="button">Return to main menu</a>
</body>
</html>