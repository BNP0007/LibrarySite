<?php
    session_start();

    require_once "DatabaseConnector.php";

    // if a user that has librarian creds, re-direct to Librarian Homepage
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        if($_SESSION['isLibrarian'] == true){
            header("Location:LibrarianHomepage.php");
            exit;
        } 
    }
    // if no one is logged in, re-direct to login page
    else{
        header("Login.php");
        exit;
    }
    
    class ViewAccountBalanceController {
        
        private $accountBalance;
        private $db;
        
        public function __construct(){
            $this->db = new DatabaseConnector();
        }
            
        public function getAccountBalance($username){
            $userDBCon = $this->db->dbConnect();
            
            $sql = "SELECT accountBalance FROM Users WHERE `username`='$username'";
            $query = $userDBCon->query($sql);
            if (isset($query)) {
                $grab = $query->fetch_object();
                $this->accountBalance = $grab->accountBalance;
            }
            else {
                echo '<script type="text/javascript">
                    window.alert("Something went wrong with the database connection. Sorry for any inconveniences. Please try again later.");
                 </script>';
            }
            
            return $this->accountBalance;
        }

    }

?>




