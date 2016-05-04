<?php
    session_start();
    require_once("DatabaseConnector.php");
    require_once("BasicFunctions.php");
    require_once("Items.php");

    class ReturnItemController { 
        private $db;
        private $basic;
        private $item;

        public function __construct(){
            $this->db = new DatabaseConnector();
            $this->basic = new BasicFunctions();
            $this->item = new Item("", "", "", "");
        }

        public function returnItem($id){
            $this->item->setIDNum($id);
            $status = "Available";

            $itemDBCon = $this->db->dbConnect();
            $sql_return = "UPDATE items SET status='$status', patronUsername='NULL' WHERE id='$id'";
            $returnSuccess = $itemDBCon->query($sql_return);
            if (isset($returnSuccess)){
                return true;
            }
            else {
                return false;
            }
        }
    }



?>