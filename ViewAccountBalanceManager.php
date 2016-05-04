<?
    session_start();
    require_once("ViewAccountBalanceController.php");
    
?>

<html>
    <head>
        <title>View Account Balance</title>
    </head>

    <body>
        <div class="nav-bar">
            <nav>
                <ul>
                    <div class="nav-bar-links">
                        <li><a href="PatronHomepage.php">Home</a></li>
                        <li><a href="SearchItemManager.php">Search Database</a></li>
                        <li><a href="ContactLibrarianController.php">Contact Us</a></li>
                        <div class="welcome-user">
                            <li><?php  
                                if(isset($_SESSION['username']))
                                {
                                    echo $_SESSION['username'];
                                }
                                else {
                                    echo 'Session not set';
                                }
                                ?>!
                            </li>
                            <div class="logout">
                                <li><a href="LogoutController.php">Logout</a></li>
                            </div>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>  
        <div id="tab-descript">
            <h1>Account Balance</h1>
        </div>   
        <div id="tabs">
            <nav>
                <ul>
                    <li>View Account Balance</a></li>
                    <li><a href="CreatePaymentManager.php" >Add Payment Method</a></li>
                    <li><a href="PayManager.php" >Pay Fine</a></li>
                    <li><a href="EditPatronDetailsManager.php" >Edit Account Details</a></li>
                </ul>
                <p>
                    <?php 
                        $vab = new ViewAccountBalanceController(); 
                        $username = $_SESSION['username'];

                        $accountBalance = $vab->getAccountBalance($username); 
                        echo "Account Balance: $ ".$accountBalance; 
                    ?>
                </p>
            </nav>
        </div>
        

    </body>

</html>