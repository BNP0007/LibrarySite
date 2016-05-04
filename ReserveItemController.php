<?php
    session_start();
    require_once("DatabaseConnector.php");

    class ReserveItemController {
            private $db;

            public function __construct(){
                $this->db = new DatabaseConnector();
            }

            public function reserveItem($id) {
                $username = $_SESSION['username'];
                
                $itemDBCon = $this->db->dbConnect();
                $sql_reserve = "UPDATE items SET status='Reserved' WHERE id='$id'";
                $queryReserve = $itemDBCon->query($sql_reserve);
                
                if (isset($queryReserve)){
                    return true;
                }
                else {
                    return false;
                }
            }
    }

?>