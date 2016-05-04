<?php
    session_start();
    require_once("SearchPageController.php");

?>

<html>  
    <head>
        <title>Search Patron</title>
    </head>
    <body>
        <div class="nav-bar">
        <nav>
            <ul>
                <div class="nav-bar-links">
                    <li><a href="LibrarianHomepage.php">Home</a></li>
                    <li><a href="SearchItemManager.php">Update Item Status</a></li>
                    <li><a href="LogoutController.php">Logout</a></li>
                 </div>   
            </ul>
        </nav>
        </div>
        <div class="header">
            <h2>Search for a Patron</h2>
        </div>  
        <div class="search_bar">
            <form action="SearchPatronManager.php" method="post">
            Username: <input type="text" name="patronUsername"><br />
            <input type="submit" name="submit" value="Submit">
            <?php
                $searchPat = new SearchPageController();
                if($_POST['submit']){
                    $userInfo = $searchPat->searchName();
                    echo "<br><br>";
                    echo "<table width='600' border='1' cellpadding='1' cellspacing='1'>";
                    echo "<tr>";
                    echo "<th>First</th>";
                    echo "<th>Last</th>";
                    echo "<th>Username</th>";
                    echo "<tr>";
                    echo "<td><a href='ViewPatronManager.php'>$userInfo[0]</a></td>";
					echo "<td>".$userInfo[1]."</td>";
                    echo "<td>".$userInfo[2]."</td>";
                    echo "</table>";
                }
            ?>	
        </div>
    </body>
</html>