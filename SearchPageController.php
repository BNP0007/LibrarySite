<?php
    session_start();
    require_once("DatabaseConnector.php");
    require_once("BasicFunctions.php");
    require_once("User.php");

    class SearchPageController {
            private $db;
            private $basic;
            private $item;

            public function __construct(){
                $this->db = new DatabaseConnector();
                $this->basic = new BasicFunctions();
                $this->userInfo = new User("", "", "", "", "", "", "", "", "", "", "", "", "");
            }

        
            public function searchName(){
                $userDBCon = $this->db->dbConnect();
                $submittedUsername = $this->basic->sanitizeData($userDBCon, $_POST['patronUsername']);

                $sql_search = "SELECT username, firstName, lastName FROM Users WHERE username='$submittedUsername'";
                $query_search = $userDBCon->query($sql_search);

                $grab = $query_search->fetch_object(); 
                $dbUsername = $grab->username;
                $firstName = $grab->firstName;
                $lastName = $grab->lastName;
                
                if($dbUsername == $submittedUsername){
                    $_SESSION['patronUsername'] = $dbUsername;
                    $userInfo = array($firstName, $lastName, $dbUsername);
                    // return first name, last name, and username to manager
                    return $userInfo;
                }
                else {
                    echo '<script type="text/javascript">
                         window.alert("No such username exists.");
                       </script>';  
                }
            }  
        
            public function searchItem(){
                $linkTo = $this->db->dbConnect();
                
                if($_SESSION["isLibrarian"] == 0){

                    $titleName = $this->basic->sanitizeData($linkTo,$_POST['titleName']);
                    $sql = "SELECT DISTINCT title,author FROM items WHERE title LIKE '%$titleName%'";
                    $query = $linkTo->query($sql);
                    while($name = $query->fetch_array()) {
                        $title = $name['title'];
                        $author = $name['author'];
                        echo "<tr>";
                        echo "<td><a href='ViewItemManager.php?tabletitle=$title&tableauthor=$author'>".$title."</a></td>";
                        echo "<td>".$author."</td>";
                        echo "</tr>";
                    }
                }
                
                else {

                    $titleName = $this->basic->sanitizeData($linkTo,$_POST['titleName']);
                    $sql = "SELECT DISTINCT title,author FROM items WHERE title LIKE '%$titleName%'";
                    $query = $linkTo->query($sql);
                    $title2 = "";
                    $author2 = "";

                    while($name =$query->fetch_array()) {
                        $title2 = $name['title'];
                        $author2 = $name['author'];
                        echo "<tr>";
                        echo "<td><a href='ViewItemManager.php?tabletitle=$title2&tableauthor=$author2'>".$title2."</a></td>";
                        echo "<td>".$author2."</td>";
                        echo "</tr>";	
                    }
                }
            }
    }
        		
?>



