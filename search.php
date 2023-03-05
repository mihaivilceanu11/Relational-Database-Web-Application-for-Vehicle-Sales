<!DOCTYPE html>
<html?>
            <head>
                <meta charset = "UTF-8">
                <title> Search </title>
                <link rel = "stylesheet" href = "style_search.css">
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
                </style>
            </head>
            <?php

            global $manufacturer;
            global $model;
            global $client_name;
            global $client_surname;
            global $low;
            global $up;
            global $manufacturer_available;
            global $model_available;
            global $manufacturer_sold;
            global $cnp;
            session_start();

            $_SESSION['manufacturer'] = $manufacturer;
            $_SESSION['model'] = $model;
            $_SESSION['client_name'] = $client_name;
            $_SESSION['client_surname'] = $client_surname;
            $_SESSION['low'] = $low;
            $_SESSION['up'] = $up;
            $_SESSION['manufacturer_available'] = $manufacturer_available;
            $_SESSION['model_available'] = $model;
            $_SESSION['manufacturer_sold'] = $manufacturer_sold;
            $_SESSION['cnp'] = $cnp;

            ?>

        <br></br>

            <div class = "box">
                
                <form method="get" action="view_selected_manuf.php">
                    <h2> Search vehicles by manufacturer</h2>
                        <div class = "inputBox">
                            <input type="text" required = "required" name="manufacturer" value="">
                            <span>Manufacturer</span>
                            <i></i>
                        </div>

                        <input type="submit" value = "Search">
                </form>
            </div>

            <div class = "box">
                
                <form method="get" action="view_selected_available.php">
                    <h2> Search available vehicles</h2>
                    <div class = "inputBox">
                        <input type="text" required = "required" name="manufacturer_available" value="">
                        <span>Manufacturer</span>
                        <i></i>
                    </div>

                    <input type="submit" value = "Search">
                </form>
            </div>


            <div class = "box">
                
                <form method="get" action="view_selected_sold.php">
                    <h2> Search sold vehicles by manufacturer</h2>
                    <div class = "inputBox">
                        <input type="text" required = "required" name="manufacturer_sold" value="">
                        <span>Manufacturer</span>
                        <i></i>
                    </div>

                    <input type="submit" value = "Search">
                </form>
            </div>

            <br></br>

            <div class = "box2">
                
                <form method="get" action="view_vehicles_price.php">
                    <h2> Search vehicles in price range</h2>
                    <div class = "inputBox">
                        <input type="text" required = "required" name="low" value="">
                        <span>Lower limit</span>
                        <i></i>
                    </div>
                    <div class = "inputBox">
                        <input type="text" required = "required" name="up" value="">
                        <span>Upper limit</span>
                        <i></i>
                    </div>
                    <input type="submit" value = "Search">
                </form>

            </div>

            <div class = "box">
                
                <form method="get" action="view_selected_cnp.php">
                    <h2> Search client invoices by CNP</h2>
                    <div class = "inputBox">
                        <input type="text" required = "required" name="cnp" value="">
                        <span>CNP</span>
                        <i></i>
                    </div>

                    <input type="submit" value = "Search">
                </form>
            </div>


            <div class = "box2">
                
                <form method="get" action="view_selected_invoices.php">
                    <h2> Search client invoices </h2>
                    <div class = "inputBox">
                        <input type="text" required = "required" name="client_name" value="">
                        <span>Client Name</span>
                        <i></i>
                    </div>
                    <div class = "inputBox">
                        <input type="text" required = "required" name="client_surname" value="">
                        <span>Client Surame</span>
                        <i></i>
                    </div>
                    <input type="submit" value = "Search">
                </form>

            </div>

            <br></br>
            
            <div>
            <a href="first_page.php" class="button">Return to main menu</a>
            </div>

</html>
