<!DOCTYPE html>
<html?>

<head>
	  <meta charset = "UTF-8">
	  <title> Invoices </title>
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

        textarea {
                background:rgb(49, 6, 129);
                text-align:center;
                outline:none;
                border:none;
                width:100%;
                font-size:20px;
                font-weight: bold;
                color:orange;
                }

        .btn{
              background-color: red;
              border: solid;
              color: navy;
              padding: 5px 10px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 14px;
              margin: 4px 2px;
              cursor: pointer;
        }
    </style>

      <header>
        <h1>Invoices</h1>
        <br></br>
 
      </header>
</head>
<?php
global $year;
session_start();
?>

<body>
<?php 
 $conn2 = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
 $select2 = "SELECT SUM(Valoare) AS total_earnings
            FROM factura";
 $run2 = mysqli_query($conn2, $select2);
 $row2 = mysqli_fetch_array($run2);
 $total_earnings = $row2['total_earnings'];
 ?>
<h1></h1>
  <br></br>
  <div>
  <textarea rows="1" cols="40">Total earnings: $<?php echo $total_earnings;?> </textarea>
  </div>

<br></br>

 <div class="container">
 <?php
    $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
    if(isset($_GET['del'])){
      $del_id = $_GET['del'];
      $delete = "DELETE FROM factura WHERE ID_Factura = '$del_id'";
      $run_delete = mysqli_query($conn, $delete);
    }
    ?>
    
    <table class="center">

      <thead>
        <tr>
          <th>Number</th>
          <th>Date</th>
          <th>Salesman</th>
          <th>Client</th>
          <th>Vehicle</th>
          <th>Value</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
        $select = "SELECT F.ID_Factura, P.Denumire AS Producator, A.Model, A.An, AV.Prenume AS PrenumeAgent, AV.Nume AS NumeAgent, C.Prenume AS PrenumeClient, C.Nume AS NumeClient, F.Data, F.Valoare
        FROM factura F JOIN autovehicul A ON (F.ID_Auto = A.ID_Auto)
        JOIN producator P ON (A.ID_Producator = P.ID_Producator)
        JOIN agentvanzari AV ON (F.ID_Agent = AV.ID_Agent)
        JOIN client C ON (F.ID_Client = C.ID_Client)";
        $run = mysqli_query($conn, $select);
        while($row = mysqli_fetch_array($run)){

        $ID_Invo = $row['ID_Factura'];
        $Manufacturer = $row['Producator'];
        $Model = $row['Model'];
        $Year = $row['An'];
        $SaleName = $row['PrenumeAgent'];
        $SaleSurname = $row['NumeAgent'];
        $ClientName = $row['PrenumeClient'];
        $ClientSurname = $row['NumeClient'];
        $Date = $row['Data'];
        $Value = $row['Valoare'];


      ?>

      <tr>
        <td><?php echo $ID_Invo;?></td>
        <td><?php echo $Date;?></td>
        <td><?php echo $SaleName; echo ' '; echo $SaleSurname;?></td>
        <td><?php echo $ClientName; echo ' '; echo $ClientSurname;?></td>
        <td><?php echo $Manufacturer; echo' '; echo $Model; echo', '; echo $Year;?></td>
        <td><?php echo '$'; echo $Value; ?></td>
        <td><a class="btn" href="view_invoices.php?del=<?php echo $ID_Invo;?>" onclick="return confirm('Are you sure?')">Delete</a></td>    
      </tr>

      <?php } ?>
      
    </tbody>
    </table>

  </div>
  <a href="add_invoice.php" class="button">Add invoice</a>
  <a href="first_page.php" class="button">Return to main menu</a>

<?php
$_SESSION['year'] = $year;
?>
  <form action="stats_by_year.php">
  <label for="year">Choose a year:</label>
  <select name="year" id="year">
    <option value="2021">2021</option>
    <option value="2022">2022</option>
  </select>
  <br><br>
  <input type="submit" value="See statistics">
</form>


</body>
</html>