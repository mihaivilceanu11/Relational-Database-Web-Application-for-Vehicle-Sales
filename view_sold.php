<!DOCTYPE html>
<html?>

<head>
	    <meta charset = "UTF-8">
	    <title> Sold Vehicles </title>
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

        textarea {
                background:transparent;
                text-align:center;
                outline:none;
                border:none;
                width:100%;
                font-size:20px;
                font-weight: bold;
                color:orange;
                }
      </style>

      <header>
        <h1>Sold vehicles</h1>
        <br></br>
  
      </header>

</head>


<body>
<?php 
 $conn2 = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
 $select2 = "SELECT COUNT(A.ID_Auto) AS total
            FROM autovehicul A 
            WHERE A.ID_Auto IN (SELECT ID_Auto FROM factura)";
 $run2 = mysqli_query($conn2, $select2);
 $row2 = mysqli_fetch_array($run2);
 $total = $row2['total'];
 ?>
<h1></h1>
  <br></br>
  <div>
  <textarea rows="1" cols="40">There were sold a total of <?php echo $total;?> vehicles</textarea>
  </div>
<div class="container">

    <table class="center">

      <thead>
        <tr>
         
          <th>Manufacturer</th>
          <th>Model</th>
          <th>Bodywork and Number of doors</th>
          <th>Mileage</th>
          <th>Fuel type, Transmission, engine</th>
          <th>Price</th>
          
          
        </tr>
      </thead>
      <tbody>

      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
        $select = "SELECT A.ID_Auto, P.Denumire AS Producator, A.Model, A.An, A.Kilometraj, A.Combustibil, A.Transmisie, A.Motorizare, A.Pret, S.TipCaroserie, S.NrUsi
        FROM autovehicul A JOIN producator P ON (A.ID_Producator = P.ID_Producator)
        JOIN specificatiiaditionale S ON (A.ID_Specificatii = S.ID_Specificatii)
        WHERE A.ID_Auto IN (SELECT ID_Auto FROM factura)";
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
        
        
      </tr>

      <?php } ?>
      
    </tbody>
    </table>

</div>
<a href="view_vehicles.php" class="button">Return to all vehicles</a>

</body>
</html>