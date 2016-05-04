<?php
    session_start();
    require_once("CheckoutController.php");

?>

<html>
    <body>
        <form action="CheckOutManager.php" method="post">
        Username: <input type="text" name="username"><br/>
        <input type="submit" name="submit" value="Submit">
        </form>
    </body>
    
    <?php
        $checkout = new CheckoutController();
        $id = $_SESSION['tableid'];
        $checkout->setItemID($id); 
    
        if($_POST["submit"]){
            $id = $_SESSION['id'];
            $username = $_POST['username'];
            $checkout->updateItem($username, $id);
        }  
    ?>
    
</html>