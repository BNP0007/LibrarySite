<?php
    session_start();

    require_once "DatabaseConnector.php";
    require_once "BasicFunctions.php";

    class SignInController {
        private $db;
        private $basic;
        
        public function __construct(){
            $this->db = new DatabaseConnector();
            $this->basic = new BasicFunctions();
        }
        
        // us = unsanitized
        public function login($usUsername, $usPassword) {
            
            $usersDBCon = $this->db->dbConnect();

            $username = $this->basic->sanitizeData($usersDBCon, $usUsername);
            $password = $this->basic->sanitizeData($usersDBCon, $usPassword);
            
            $sql = "SELECT * FROM Users WHERE username='$username' LIMIT 1";
            $query = $usersDBCon->query($sql);
            // check the connection
            if ($usersDBCon->connect_error) {
                die("Connection failed: " . $userDBCon->connect_error);
            } 
            
            $grab= $query->fetch_object();
            $id = $grab->LibraryCardID;
            $db_password = $grab->password;
            $isLibrarian = $grab->isLibrarian;

            if($password == $db_password) {
                $_SESSION['username'] = $username;
                $_SESSION['isLibrarian'] = $isLibrarian;
                $_SESSION['loggedIn'] = true;
                return true;
            } 
            else {
                return false;
            }
            
        }  
    }
?>