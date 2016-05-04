<?php

    class DatabaseConnector { 
        protected $hostname = '127.0.0.1';
        protected $user = 'root';
        protected $password = 'root';
        protected $db = 'SavageLibrary';
        
        function dbConnect() {
            $this->usersDBCon = new mysqli($this->hostname, $this->user, $this->password, $this->db);

            // check the connection
            if ($usersDBCon->connect_error) {
                die("Connection failed: " . $userDBCon->connect_error);
            } 
            return $this->usersDBCon;
        }
    }
?>