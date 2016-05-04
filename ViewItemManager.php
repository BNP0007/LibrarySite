<?php
    session_start();
    require_once("ViewItemController.php");

?>

<html>
    <head>
        <title>View Items</title>
    </head>

    <body>
        <div class="nav-bar">
            <nav>
                <ul>
                    <div class="nav-bar-links">
                        <li><a href="PatronHomepage.php">Home</a></li>
                        <li><a href="SearchItemManager.php">Search for Items</a></li>
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
            <h1></h1>
        </div>   

        <table width="600" border="1" cellpadding="1" cellspacing="1">
        <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Availability</th>

        <?php
            if ($_SESSION['isLibrarian']) {
                echo "<th>Delete</th>";
                echo "<th>Checkout</th>";
                echo "<tr>";
            }
            $viewItems = new ViewItemController();
            $viewItems->displayItem();

        ?>	
    </body>
</html>