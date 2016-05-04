<?php

    session_start();
    require_once("CreatePaymentController.php");

?>

<html>
    <head>
        <title>Add Payment Method</title>
    </head>

    <body>
        <div class="nav-bar">
            <nav>
                <ul>
                    <div class="nav-bar-links">
                        <li><a href="PatronHomepage.php">Home</a></li>
                        <li><a href="SearchItemManager.php">Search Database</a></li>
                        <li><a href="ContactLibrarianManager.php">Contact Us</a></li>
                        <div class="display-username">
                            <li>              
                                <?php  
                                    // display user's username
                                    if(isset($_SESSION['username'])){
                                        echo $_SESSION['username']. "!";}
                                    else { 
                                        echo 'Session not set';
                                    }
                                ?>
                            </li>
                        </div>
                        <div class="logout">
                            <li><a href="LogoutController.php">Logout</a></li>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>  
        <div class="tab-descript">
            <h1>New Payment Method</h1>
        </div>   
        <div class="tabs">
            <nav>
                <ul>
                    <li><a href="ViewAccountBalanceManager.php">View Account Balance</a></li>
                    <li>Add Payment Method</a></li>
                    <li><a href="PayManager.php" >Pay Fine</a></li>
                    <li><a href="EditPatronDetailsManager.php" >Edit Account Details</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="info-table">
                <?php
                    $createPayment = new CreatePaymentController();
                    // if there is already a card on file, it will re-direct patron to ViewAccountBalanceManager
                    
                    if($createPayment->checkForCard() == false){
                        
                ?>
                <form action="CreatePaymentManager.php" method="post" enctype="multipart/form-data">
                    <input name="cardNum" type="text" placeholder="Card number" maxlength="19" required><br>
                    <input name="expireMonth" type="text" placeholder="MM" style="width:3em" maxlength="2" required> / 
                    <input name="expireYear" type="text" placeholder="YY" style="width:3em" maxlength="2" required>
                    <br>
                    <input name="cardHolderName" type="text" placeholder="Cardholder name" required>
                    <br><br>
                    <input name="submit" type="submit" value="Submit">
                </form>
                <?php
                    if (isset($_POST['submit'])){  
                        $createPayment->createPayment($_POST['cardNum'], $_POST['expireMonth'], $_POST['expireYear'], $_POST['cardHolderName']);
                    }  
                    }
                ?>
        </div>
    </body>

</html>