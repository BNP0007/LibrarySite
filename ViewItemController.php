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
        
        public function selected() {

                if($_SESSION['isLibrarian'] == 0){

                    $linkTo = $this->db->dbConnect();

                    $tabletitle = $_SESSION['tabletitle'];
                    $tableauthor = $_SESSION['tableauthor'];
                    $sql = "SELECT * FROM items WHERE title = '$tabletitle' and author = '$tableauthor'";
                    $query = $linkTo->query($sql);

                    while($name =$query->fetch_array()) {
                            $title = $name['title'];
                            $author = $name['author'];
                            $isbn = $name['isbn'];
                            $status = $name['status'];
                            $id = $name['id'];
                            
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
            
                else{
                    $linkTo = $this->db->dbConnect();

                    $tabletitle = $_SESSION['tabletitle'];
                    $tableauthor = $_SESSION['tableauthor'];
                    $sql = "SELECT * FROM items WHERE title='$tabletitle' and author='$tableauthor'";
                    $query = $linkTo->query($sql);

                    while($name = $query->fetch_array()) {
                            $title = $name['title'];
                            $author = $name['author'];
                            $isbn = $name['isbn'];
                            $id = $name['id'];
                            $status = $name['status'];
                        
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
        
        public function display() {
			$_SESSION['tabletitle'] = $_GET['tabletitle'];
			$_SESSION['tableauthor'] = $_GET['tableauthor'];
			$this->item->setTitle($_SESSION['tabletitle']);
			$this->item->setAuthor($_SESSION['tableauthor']);
			$this->selected();
		}	
    }			
?>


	