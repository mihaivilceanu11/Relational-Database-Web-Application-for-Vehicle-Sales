<!DOCTYPE html>
<html?>

<head>
	    <meta charset = "UTF-8">
	    <title> Vehicles </title>
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
        <h1>Vehicles</h1>
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
      $delete = "DELETE FROM autovehicul WHERE ID_Auto = '$del_id'";
      $run_delete = mysqli_query($conn, $delete);
    }
    ?>
    
    <table class="center">

      <thead>
        <tr>
         
          <th>Manufacturer</th>
          <th>Model</th>
          <th>Bodywork and Number of doors</th>
          <th>Mileage</th>
          <th>Fuel type, Transmission, engine</th>
          <th>Price</th>
          <th>Delete</th>
          
        </tr>
      </thead>
      <tbody>

      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
        $select = "SELECT A.ID_Auto, P.Denumire AS Producator, A.Model, A.An, A.Kilometraj, A.Combustibil, A.Transmisie, A.Motorizare, A.Pret, S.TipCaroserie, S.NrUsi
        FROM autovehicul A JOIN producator P ON (A.ID_Producator = P.ID_Producator)
        JOIN specificatiiaditionale S ON (A.ID_Specificatii = S.ID_Specificatii)";
        $run = mysqli_query($conn, $select);
        while($row = mysqli_fetch_array($run)){
        
        $ID_Auto = $row['ID_Auto'];
        $Manufacturer = $row['Producator'];
        $Model = $row['Model'];
        $Year = $row['An'];
        $Mileage = $row['Kilometraj'];
        $Fuel = $row['Combustibil'];
        $Transmission = $row['Transmisie'];
        $Engine = $row['Motorizare'];
        $Price = $row['Pret'];
        $Bodywork = $row['TipCaroserie'];
        $Doors = $row['NrUsi'];

      ?>

      <tr>
        
        <td><?php echo $Manufacturer;?></td>
        <td><?php echo $Model; echo ', '; echo $Year;?></td>
        <td><?php echo $Bodywork; echo ', '; echo $Doors;?></td>
        <td><?php echo $Mileage;?></td>
        <td><?php echo $Fuel; echo ', '; echo $Transmission; echo ', '; echo $Engine; ?></td>
        <td><?php echo '$'; echo $Price; ?></td>
        <td><a class="btn" href="view_vehicles.php?del=<?php echo $ID_Auto;?>" onclick="return confirm('Are you sure?')">Delete</a></td>
        
      </tr>

      <?php } ?>
      
    </tbody>
    </table>

</div>
<a href="add_vehicle.php" class="button">Add a new vehicle</a>
<a href="first_page.php" class="button">Return to main menu</a>
<a href="view_available.php" class="button">View available vehicles</a>
<a href="view_sold.php" class="button">View sold vehicles</a>
</body>
</html>