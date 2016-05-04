<?php
    session_start();
    require_once("PayController.php");

?>

<html>
    <head>
        <title>Pay Fine</title>
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
                            <div class="logout">
                                <li><a href="LogoutController.php">Logout</a></li>
                            </div>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>  
        <div class="tab-descript">
            <h1>Pay Fine</h1>
        </div>   
        <div class="tabs">
            <nav>
                <ul>
                    <li><a href="ViewAccountBalanceManager.php" >View Account Balance</a></li>
                    <li><a href="CreatePaymentManager.php" >Add Payment Method</a></li>
                    <li>Pay Fine</a></li>
                    <li><a href="EditPatronDetailsManager.php" >Edit Account Details</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="info-table">
                <?php
                    // view account balance
                    $vab = new ViewAccountBalanceController();
                    $payControl = new PayController();
                    
                    $username = $_SESSION['username'];

                    // display patron's credit card that is on file
                    $cardOnFile = $payControl->getCardOnFile($username);
                    if (isset($cardOnFile)){
                        // display account balance
                        $accountBalance = $vab->getAccountBalance($username); 
                        echo "Account Balance: $ " .$accountBalance. "<br>";
                        // display patron's credit card
                        echo "Credit Card: " .$cardOnFile;
                    }
                    else {
                        echo '<script type="text/javascript">
                            window.alert("You must have a credit card on file before you pay for a fine. You will now be re-directed to the Add Payment Method.");
                            window.location.href = "http://localhost/LibrarySite/CreatePaymentManager.php";
                            </script>';
                    }
                    
                ?>
            
                <form action="PayManager.php" method="post" enctype="multipart/form-data">
                    <br>
                    Pay Amount <input name="payAmount" required>
                    <br><br>
                    <input name="submit" type="submit" value="Submit">
                </form>
                <?php
            
                    if (isset($_POST['submit'])){  
                        if($payControl->isCardExpired($username) == false) {
                            $payControl->payFine($username, $_POST['payAmount'], $accountBalance);
                        }
                    }  
            
                ?>
        </div>
    </body>

</html>