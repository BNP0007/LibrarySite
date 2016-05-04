<?php
    require_once("DatabaseConnector.php");
    require_once("BasicFunctions.php");
    require_once("Items.php");

    class AddItemController {

            private $db;
            private $basic;
            private $item;

            public function __construct(){
                $this->db = new DataBaseConnector();
                $this->basic = new BasicFunctions();
                $this->item = new Item("", "", "", "");
            }
         
            // us = unsanitized
            public function addNewItem($usTitle, $usAuthor, $usIsbnNum, $usId){
                $itemDBCon = $this->db->dbConnect();
                
                $title = $this->basic->sanitizeData($itemDBCon, $usTitle);
                $author = $this->basic->sanitizeData($itemDBCon, $usAuthor);
                $isbnNum = $this->basic->sanitizeData($itemDBCon, $usIsbnNum);
                $id = $this->basic->sanitizeData($itemDBCon, $usId);
                
                $this->item->setTitle($title);
                $this->item->setAuthor($author);
                $this->item->setISBNNum($isbnNum);
                $this->item->setIDNum($id);
 
                // last "value" is patronUsername...which wouldn't be set here
                $addItemSuccess = $itemDBCon->query("INSERT INTO items VALUES ('$author','$isbnNum','$title','Available','$id', 'NULL')");
            
                if(isset($addItemSuccess)){
                    echo '<script type="text/javascript">
                            window.alert("Item has been added!");
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
     }
?>