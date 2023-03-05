<!DOCTYPE html>
<html?>

<head>
	  <meta charset = "UTF-8">
	  <title> Salesmen and manufacturers </title>
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
    </style>

      <header>
        <h1>Salesmen and manufacturers</h1>
        <br></br>
 
      </header>
</head>


<body>
<h1></h1>
  <br><br>
 <div class="container">
    
    <table class="center">

      <thead>
        <tr>
          <th>Salesman name</th>
          <th>Manufacturers</th>
        </tr>
      </thead>
      <tbody>

      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
        $select = "SELECT AV.ID_Agent, AV.Prenume, AV.Nume, P.Denumire
        FROM agentvanzari AV
        INNER JOIN agentproducator AP ON (AV.ID_Agent = AP.ID_Agent)
        INNER JOIN producator P ON (P.ID_Producator = AP.ID_Producator)
        WHERE AV.ID_Agent = AP.ID_Agent
        ORDER BY AV.Nume ASC ";
        $run = mysqli_query($conn, $select);

        while($row = mysqli_fetch_array($run)){
        $AgentID = $row['ID_Agent'];
        $Name = $row['Prenume'];
        $Surname = $row['Nume'];
        $Manufacturer = $row['Denumire'];
        $row = mysqli_fetch_array($run);
        $Manufacturer1 = $row['Denumire'];
        $row = mysqli_fetch_array($run);
        $Manufacturer2 = $row['Denumire'];
        ?>
        <tr>
            <td><?php echo' '; echo $Name;echo ' '; echo $Surname;?></td>
            <td><?php echo $Manufacturer; echo ', '; echo $Manufacturer1; echo ', '; echo $Manufacturer2;?></td>
              
        </tr>
    <?php } ?>

    </tbody>
    </table>

  </div>
  <a href="first_page.php" class="button">Return to main menu</a>
</body>
</html>