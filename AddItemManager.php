
<?php
    require_once("AddItemController.php");

?>

<html>
    <head>
        <title>Add Item</title>
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

    <body>
        <form action="AddItemManager.php" method="post">
        Title <input type="text" name="title"><br/>
        Author <input type="text" name="author"><br/>
        ISBN # <input type="text" name="isbnNum"><br/>
        ID # <input type="text" name="idNum"><br/>
        <input type="submit" name="submit" value="Submit">
        </form>
    </body>

</html>

    <?php

        if($_POST['submit']){
            $addItem = new AddItemController();
            
            $title = $_POST['title'];
            $author = $_POST['author'];
            $isbnNum = $_POST['isbnNum'];
            $id = $_POST['idNum'];
                
            $addItem->addNewItem($title, $author, $isbnNum, $id);
        }

    ?>