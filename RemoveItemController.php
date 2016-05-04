<?php
    session_start();
    require_once("DatabaseConnector.php");
    require_once("BasicFunctions.php");
    require_once("Items.php");
 
    class RemoveItemController {  
        private $db;
        private $basic;
        private $item;
        
        public function __construct(){
            $this->db = new DatabaseConnector();
			$this->basic = new BasicFunctions();
            $this->item = new Item("", "", "", "");
        }
		
		public function removeItem($id){
            $this->item->setIDNum($id);

			$itemDBCon = $this->db->dbConnect();
			$sql_remove = "DELETE FROM items WHERE id='$id'";
			$removeSuccess = $itemDBCon->query($sql_remove);
            
            if(isset($removeSuccess)){
                return true;
            }
            else {
                return false;
            }
		}	
    }

?>