<!DOCTYPE html>
<html>
<head>
    
    <title>Vehicle Sales</title>
    
    <style>

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

      h2{
        font-weight: bold;
        color: orange;
        font-size: 50px;
        text-align:center;
      }

      body 
      {
        
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        flex-direction: column;
        background-color: green;
        background-image: url("car.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }

    </style>

</head>
<body>

          <div>
            <h2>Vehicle Sales</h2>
          </div>


    <a href="view_manufacturers.php" class="button">View manufacturers</a>
    <a href="view_vehicles.php" class="button">View all vehicles</a>
    <a href="view_salesmen.php" class="button">View salesmen</a>
    <a href="view_invoices.php" class="button">View invoices</a>
    <a href="view_clients.php" class="button">Clients</a>
    <a href="view_manuf_by_salesmen.php" class="button">Salesmen and manufacurers</a>
    <a href="search.php" class="button">Search</a>


</body>
</html>