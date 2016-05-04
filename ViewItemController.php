<?php
    require_once("DatabaseConnector.php");
    require_once("Items.php");
    require_once("BasicFunctions.php");
	
    class ViewItemController {
        private $db;
        private $item;
        private $basic;

        public function __construct(){
            $this->db = new DatabaseConnector();
            $this->basic = new BasicFunctions();
			$this->item = new Item("", "", "", "");
        }
        
        public function displayItem() {
            $this->setInformation();
            $itemDBCon = $this->db->dbConnect();

            if($_SESSION['isLibrarian'] == 0){  
                $this->patronViewItem($itemDBCon);
            }       
            else{
                $this->librarianViewItem($itemDBCon);
            }
        }	
        
        public function setInformation() {
			$_SESSION['tabletitle'] = $_GET['tabletitle'];
			$_SESSION['tableauthor'] = $_GET['tableauthor'];
			$this->item->setTitle($_SESSION['tabletitle']);
			$this->item->setAuthor($_SESSION['tableauthor']);
		}	
        
        public function patronViewItem($itemDBCon){
            $tabletitle = $_SESSION['tabletitle'];
            $tableauthor = $_SESSION['tableauthor'];
            $sql_viewItem = "SELECT * FROM items WHERE title = '$tabletitle' and author = '$tableauthor'";
            $query_item = $itemDBCon->query($sql_viewItem);

            while($col = $query_item->fetch_array()) {
                    $title = $col['title'];
                    $author = $col['author'];
                    $isbn = $col['isbn'];
                    $status = $col['status'];
                    $id = $col['id'];

                    echo "<tr>";
                    echo "<td>".$title."</td>";
                    echo "<td>".$author."</td>";
                    echo "<td>".$isbn."</td>";
                    if($status == "Available"){
                        echo "<td><a href='ReserveItemManager.php?tableid=$id'>".Reserve."</a></td>";
                    }
                    else{
                        echo "<td>Not Available</td>";
                    }
                    echo "</tr>";
            }
        }
        
        public function librarianViewItem($itemDBCon) {

            $tabletitle = $_SESSION['tabletitle'];
            $tableauthor = $_SESSION['tableauthor'];
            $sql_viewItem = "SELECT * FROM items WHERE title='$tabletitle' and author='$tableauthor'";
            $query_item = $itemDBCon->query($sql_viewItem);

            while($col = $query_item->fetch_array()) {
                    $title = $col['title'];
                    $author = $col['author'];
                    $isbn = $col['isbn'];
                    $id = $col['id'];
                    $status = $col['status'];

                    $return = "Available";
                    $delete = "Delete";
                    $check = "Checkout";

                    echo "<tr>";
                    echo "<td>".$title."</td>";
                    echo "<td>".$author."</td>";
                    echo "<td>".$isbn."</td>";

                    if($status != "Available"){
                        echo "<td><a href='ReturnItemManager.php?tableid=$id&tableoption=$return'>Return</a></td>";
                    }
                    else{
                        echo "<td>Available</td>";
                    }					
                    echo "<td><a href='RemoveItemManager.php?tableid=$id&tableoption=$delete'>Delete</a></td>";

                    if($status == "Available"){
                        echo "<td><a href='Checkout.php?tableid=$id&tableoption=$check'>Checkout</a></td>";
                    }
                    else{
                        echo "<td>Not available</td>";
                    }
                    echo "</tr>";
            }
        }
    }			
?>


	