<!DOCTYPE html>
<html?>

<head>
	    <meta charset = "UTF-8">
	    <title> Manufacturers </title>
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
        <h1>Available Manufacturers</h1>
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
      $delete = "DELETE FROM producator WHERE ID_Producator = '$del_id'";
      $run_delete = mysqli_query($conn, $delete);
    }
?>
    <table class="center">

      <thead>
        <tr>
          <th>Manufacturer ID</th>
          <th>Name</th>
          <th>Country of origin</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
        $select = "SELECT * FROM producator";
        $run = mysqli_query($conn, $select);
        while($row = mysqli_fetch_array($run)){

        $ManID = $row['ID_Producator'];
        $Name = $row['Denumire'];
        $Country = $row['TaraDeOrigine'];

      ?>

      <tr>
        <td><?php echo $ManID;?></td>
        <td><?php echo $Name;?></td>
        <td><?php echo $Country;?></td>
        <td><a class="btn" href="view_manufacturers.php?del=<?php echo $ManID;?>" onclick="return confirm('Are you sure?')">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
    </table>

</div>
<a href="add_manufacturer.php" class="button">Add a new manufacturer</a>
<a href="first_page.php" class="button">Return to main menu</a>
</body>
</html>