<?php
    require_once("ReserveItemController.php");

    $rItem = new ReserveItemController();
    $id = $_GET['tableid'];

    if($rItem->reserveItem($id) == true) {
        echo '<script type="text/javascript">
                 window.alert("Your item has been reserved!");
                 window.location.href = "http://localhost/LibrarySite/SearchItemManager.php";
             </script>';
    }
    else {
        echo '<script type="text/javascript">
                window.alert("Something went wrong with the reserving process. Please try again later.");
                 window.location.href = "http://localhost/LibrarySite/SearchItemManager.php";
             </script>';
    }
?>