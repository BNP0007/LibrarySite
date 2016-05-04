<?php
    require_once("RemoveItemController.php");

    $rItem = new RemoveItemController();
    $id = $_GET['tableid'];

    if($rItem->removeItem($id) == true) {
        echo '<script type="text/javascript">
                 window.alert("Item has been removed.");
                 window.location.href = "http://localhost/LibrarySite/SearchItemManager.php";
             </script>';
    }
    else {
        echo '<script type="text/javascript">
                window.alert("Something went wrong with the removing process. Please try again later.");
                window.location.href = "http://localhost/LibrarySite/SearchItemManager.php";
             </script>';
    }

?>