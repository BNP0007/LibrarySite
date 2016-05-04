<?php
    require_once("DatabaseConnector.php");
    require_once("BasicFunctions.php");
    require_once("Items.php");

    class CheckoutController {
            private $db;
            private $basic;
            private $item;
        
            public function __construct(){
                $this->db = new DatabaseConnector();
                $this->basic = new BasicFunctions();
                $this->item = new Item("", "", "", "");
            }

            public function submitCheckoutItem($itemDBCon, $username){
                $option = "Checkedout";
                $id = $this->item->getIDNum();

                $sqll = "UPDATE items SET status='$option', patronUsername='$username' WHERE id='$id'";
                $checkoutSuccess = $itemDBCon->query($sqll);
                
                if (isset($checkoutSuccess)){
                    echo '<script type="text/javascript">
                                window.alert("Checkout successful!");
                                window.location.href = "http://localhost/LibrarySite/LibrarianHomepage.php";
                            </script>';    
                }
                else {
                    echo '<script type="text/javascript">
                        window.alert("Something went wrong with the adding process. Please try again later.");
                        window.location.href = "http://localhost/LibrarySite/LibrarianHomepage.php";
                    </script>';   
                
                }
            }
        
            public function setItemID($id){
                $this->item->setIDNum($id);
            }

            public function updateItem($usUsername, $id){
                $itemDBCon = $this->db->dbConnect();
                
                $username = $this->basic->sanitizeData($itemDBCon, $usUsername);
                
                $this->submitCheckoutItem($itemDBCon, $username);	
            }
    }
?>

