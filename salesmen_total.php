<!DOCTYPE html>
<html?>

        <head>
              <meta charset = "UTF-8">
              <title> Salesmen earnings </title>
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
            </style>

              <header>
                <h1>Salesmen total earnings</h1>
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
              
              <th>Name</th>
              <th>Surname</th>
              <th>Total earnings</th>
              
            </tr>
          </thead>
            <tbody>

              <?php
                $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
                $select = "SELECT AV.Nume, AV.Prenume, SUM(F.Valoare) as total
                          FROM AgentVanzari AV, Factura F
                          WHERE AV.ID_Agent = F.ID_Agent 
                          GROUP BY AV.Nume, AV.Prenume";
                $run = mysqli_query($conn, $select);
                while($row_agent = mysqli_fetch_array($run)){

                
                $Nume = $row_agent['Nume'];
                $Prenume = $row_agent['Prenume'];
                $Total = $row_agent['total'];


              ?>

              <tr>
                
                <td><?php echo $Prenume;?></td>
                <td><?php echo $Nume;?></td>
                <td><?php echo '$'; echo $Total;?></td>
                
                
              </tr>
              <?php } ?>
            </tbody>
        </table>
        </div>   

          
          <a href="first_page.php" class="button">Return to main menu</a>
          
  </body>
</html>