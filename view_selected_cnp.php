<!DOCTYPE html>
<html?>

<head>
	    <meta charset = "UTF-8">
	    <title> Invoices of selected client </title>
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
        <h1>Sold vehicles</h1>
        <br></br>
  
      </header>

</head>


<body>

<h1></h1>
  <br></br>
<div class="container">

    <table class="center">

      <thead>
        <tr>
         
          <th>Invoice ID</th>
          <th>Date</th>
          <th>Salesman</th>
          <th>Client Name</th>
          <th>Vehicle</th>
          <th>Price</th>
          
          
        </tr>
      </thead>
      <tbody>

      <?php
      session_start();

      
        $cnp = $_GET['cnp'];
        

        $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
        $select = "SELECT F.ID_Factura, P.Denumire AS Producator, A.Model, A.An, AV.Prenume AS PrenumeAgent, AV.Nume AS NumeAgent, C.Prenume AS PrenumeClient, C.Nume AS NumeClient, F.Data, F.Valoare
        FROM factura F JOIN autovehicul A ON (F.ID_Auto = A.ID_Auto)
        JOIN producator P ON (A.ID_Producator = P.ID_Producator)
        JOIN agentvanzari AV ON (F.ID_Agent = AV.ID_Agent)
        JOIN client C ON (F.ID_Client = C.ID_Client)
        WHERE C.CNP = '$cnp'";
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
        <td><?php echo $Value; echo'$'?></td>      
      </tr>

      <?php } ?>
      
    </tbody>
    </table>

</div>
<a href="first_page.php" class="button">Return to main menu</a>
<a href="search.php" class="button">Return to Search</a>
</body>
</html>