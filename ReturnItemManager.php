<?php
    require_once("ReturnItemController.php");

    $rItem = new ReturnItemController();
    $id = $_GET['tableid'];

    if($rItem->returnItem($id) == true) {
        echo '<script type="text/javascript">
                 window.alert("Item has been returned.");
                 window.location.href = "http://localhost/LibrarySite/SearchItemManager.php";
             </script>';
    }
    else {
        echo '<script type="text/javascript">
                window.alert("Something went wrong with the returning process. Please try again later.");
                window.location.href = "http://localhost/LibrarySite/SearchItemManager.php";
             </script>';
    }

?>