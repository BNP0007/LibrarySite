<?php
    session_start();
    $_SESSION['tableid'] = $_GET['tableid'];
    header("Location:CheckOutManager.php");
?>