<?php

    session_start();

    // if a user that has librarian creds, re-direct to Librarian Homepage
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        if($_SESSION['isLibrarian'] == true){
            header("Location:LibrarianHomepage.php");
            exit;
        } 
    }
    // if no one is logged in, re-direct to login page
    else{
        header("index.php");
        exit;
    }

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>
    </head>

    <body>
    <div id="holder">
        <div id="header">
            <h1>Savage Library</h1>
        </div>   
        <div id="nav-bar">
            <nav>
                <ul>
                    <li><a href="SearchItemManager.php">Search Database</a></li>
                    <li><a href="ViewAccountBalanceManager.php" >View Account Balance</a></li>
                    <li><a href="EditPatronDetailsManager.php" >Edit Account Details</a></li>
                    <li><a href="ContactLibrarianManager.php" >Contact Us</a></li>
                    <li><a href="LogoutController.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>
    </body>

</html>