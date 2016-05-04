<?php

    session_start();

    // if a user doesn't have librarian creds, re-direct them to Patron Homepage
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        if($_SESSION['isLibrarian'] == false){
            header("Location:PatronHomepage.php");
            exit;
        }   
    }
    // if no one is logged in, re-direct to login page
    else {
        header("index.php");
        exit;
    }

?>

<html>
    <head>
        <title>Savage Library</title>
    </head>

    <body>
    <div id="holder">
        <div id="header">
            <h1>Savage Library</h1>
        </div>   
        <div id="nav-bar">
            <nav>
                <ul>
                    <li><a href="SearchPatronManager.php" >Search Patrons</a></li>
                    <li><a href="UpdateBalanceManager.php">Update Patron Balance</a></li>
                    <li><a href="SearchItemManager.php">Search Items</a></li>
                    <li><a href="AddItemManager.php">Add items</a></li>
                    <li><a href="LogoutController.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>
    </body>

</html>