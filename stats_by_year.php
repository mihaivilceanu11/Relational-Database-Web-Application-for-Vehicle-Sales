<!DOCTYPE html>
<html?>

      <head>
          <?php
                session_start();

                $year = $_GET['year'];
          ?>
              <meta charset = "UTF-8">
              <title> Statistics for <?php echo $year; ?> </title>
              <link rel = "stylesheet" href = "style_search.css">

              <style>
                  main > * {border: 4px solid; color: black}
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
                          table {border-collapse: collapse; font-family: helvetica; }
                          td, th {
                                    border:  4px solid black;
                                    padding: 10px;
                                    min-width: 200px;
                                    background:rgb(49, 6, 129);
                                    box-sizing: border-box;
                                    text-align: center;
                                }
                        .table-container {
                                            position: relative;
                                            max-height:  300px;
                                            width: 500px;
                                            overflow: scroll;
                                          }

                        thead th {
                                  position: -webkit-sticky;
                                  position: sticky;
                                  top: 0;
                                  z-index: 2;
                                  background: orange;
                                }

                        thead th:first-child {
                                              left: 0;
                                              z-index: 3;
                                              }

                        tfoot {
                          position: -webkit-sticky;
                          bottom: 0;
                          z-index: 2;
                        }

                        tfoot td {
                          position: sticky;
                          bottom: 0;
                          z-index: 2;
                          background: orange;
                        }

                        tfoot td:first-child {
                          z-index: 3;
                        }

                        tbody {
                          overflow: scroll;
                          height: 200px;
                          
                        }
                        body 
                        {
                          color: white;
                          
                        }
              </style>

                <header>
                  <h1>Statistics for <?php echo $year; ?> </h1>
                  <br></br>
          
                </header>
      </head>


  <body>

        <br><br>
          <textarea rows="1" cols="40">The agent(s) with earnings above average:</textarea>
          
        <?php 
          $conn2 = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
          $select2 = "SELECT AV.Nume, AV.Prenume, SUM(F.Valoare) AS suma
                  FROM agentvanzari AV JOIN factura F ON (AV.ID_Agent = F.ID_Agent)
                  WHERE YEAR(F.Data) = '$year' 
                  GROUP BY AV.Nume, AV.Prenume
                  HAVING SUM(F.Valoare) > (SELECT AVG(Valoare) FROM factura WHERE YEAR(Data) = '$year')";
          $run2 = mysqli_query($conn2, $select2);
          while($row2 = mysqli_fetch_array($run2)){
          $salesman_name = $row2['Prenume'];
          $salesman_surname = $row2['Nume'];
          $Suma = $row2['suma'];
        ?>

        <div>
          <textarea rows="1" cols="40"><?php echo $salesman_name; echo ' ';
            echo $salesman_surname;
            echo ' '; echo '$'; echo $Suma;?>  </textarea>
          </div>

        <?php } ?>

        <br></br>

        <?php 
          $conn3 = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
          $select3 = "SELECT Nume, Prenume, 
                                          (SELECT COUNT(ID_Auto) AS NR 
                                          FROM factura WHERE ID_Agent = AV.ID_Agent AND YEAR(Data) = '$year' ) AS Num, 
                                          (SELECT SUM(Valoare) 
                                          FROM factura WHERE ID_Agent = AV.ID_Agent AND YEAR(Data) = '$year' ) AS topSuma
                    FROM agentvanzari AV
                    ORDER BY Num DESC, topSuma DESC 
                    LIMIT 1";
          $run3 = mysqli_query($conn3, $select3);
          $row3 = mysqli_fetch_array($run3);
          $topName = $row3['Prenume'];
          $topSurname = $row3['Nume'];
          $topSold = $row3['Num'];
        
        ?>

      <div>
        <textarea rows="1" cols="40"> The agent with the most vehicles sold: </textarea>
      </div>

        <div>
          <textarea rows="1" cols="40"><?php echo $topName; echo ' ';
          echo $topSurname; ?> with <?php echo $topSold; ?> vehicles sold </textarea>
        </div>

        <br></br>
        <div>
          <textarea rows="1" cols="40"> The most expensive car sold: </textarea>
        </div>

        <div class="container">
          
          <table class="center">

            <thead>
              <tr>
                <th>Salesman name</th>
                <th>Vehicle</th>
                <th>Value</th>
              </tr>
            </thead>
            <tbody>

            <?php
              $conn = mysqli_connect('localhost', 'root', '', 'evidentavanzariautovehicule');
              $select = "SELECT Nume, Prenume, (SELECT P.Denumire FROM autovehicul A JOIN producator P ON (A.ID_Producator = P.ID_Producator) 
              WHERE ID_Auto = (SELECT ID_Auto 
                                  FROM factura 
                                  WHERE ID_Agent = AV.ID_Agent AND YEAR(Data) = $year
                                  ORDER BY Valoare DESC LIMIT 1)) AS Producator, 
              (SELECT Model FROM autovehicul 
              WHERE ID_Auto = (SELECT ID_Auto 
                                  FROM factura 
                                  WHERE ID_Agent = AV.ID_Agent AND YEAR(Data) = $year
                                  ORDER BY Valoare DESC LIMIT 1)) AS Model, 
              (SELECT MAX(Valoare) FROM factura WHERE ID_Agent = AV.ID_Agent AND YEAR(Data) = $year) AS Cost
                        FROM agentvanzari AV";
              $run = mysqli_query($conn, $select);
              while($row = mysqli_fetch_array($run)){

                $Name = $row['Prenume'];
                $Surname = $row['Nume'];
                $Manufacturer = $row['Producator'];
                $Model = $row['Model'];
                $Value = $row['Cost'];


            ?>

            <tr>
              <td><?php echo $Name; echo ' '; echo $Surname;?></td>
              <td><?php echo $Manufacturer; echo ' '; echo $Model;?></td>
              <td><?php echo '$'; echo $Value; ?></td>
                  
            </tr>

            <?php } ?>
            
            </tbody>
          </table>
        </div>
      
        <a href="view_invoices.php" class="button">Return to invoices</a>
        <a href="first_page.php" class="button">Return to main menu</a>
        
  </body>
</html>