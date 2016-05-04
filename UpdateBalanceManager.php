<?php
    require_once("UpdateBalanceController.php");

?>

<html>  
    <head>
        <title>Update Patron Balance</title>
    </head>
    <body>
        <div class="nav-bar">
        <nav>
            <ul>
                <div class="nav-bar-links">
                    <li><a href="LibrarianHomepage.php">Home</a></li>
                    <li><a href="SearchPatronManager.php">Search Patrons</a></li>
                    <li><a href="LogoutController.php">Logout</a></li>
                 </div>   
            </ul>
        </nav>
        </div>
        <div class="header">
            <h2>Update Patron Balance</h2>
        </div>  
        <form action="UpdateBalanceManager.php" method="post">
            Username <input name="username" required><br>
            Amount <input name="amountName" required><br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
            $ubControl = new UpdateBalanceController();
            if($_POST['submit']){
                $ubControl->updateBalance();	
            }
        ?>
    </body>
</html>