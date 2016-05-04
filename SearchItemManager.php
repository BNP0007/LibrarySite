<?php
    session_start();
    require_once("SearchPageController.php");

?>
<html>
    <head>
        <title>Search Item</title>
    </head>

    <body>
        <div id="nav-bar">
            <nav>
                <ul>
                    <div class="nav-bar-links">
                        <li><a href="PatronHomepage.php">Home</a></li>
                        <div class="display-username">
                            <li>              
                                <?php  
                                    // display user's username
                                    if(isset($_SESSION['username'])){
                                        echo $_SESSION['username'];}
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
        
        <div class="contact-header">
            <h1>Search Items</h1>
        </div>
        
        <form action="SearchItemManager.php" method="post">
            Title: <input type="text" name="titleName"><br/></br>
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php

            $searchItem = new SearchPageController();

            if($_POST['submit']){
                echo "<table width='600' border='1' cellpadding='1' cellspacing='1'>";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Author</th>";
                echo "<tr>";
                $searchItem->searchItem();
            }

        ?>	
    </body>
</html>