<?php

    session_start();

    require_once "DatabaseConnector.php";
    require_once "BasicFunctions.php";

    // if a user is already logged in, don't let them register
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        if($_SESSION['isLibrarian'] == false){
            header("Location:PatronHomepage.php");
            exit;
        }   
        else{
            header("Location:LibrarianHomepage.php");
            exit;
        }
    }

    class CreateAccountController {

        private $db;
        private $basic;
        
        public function __construct(){
            $this->db = new DatabaseConnector();
            $this->basic = new BasicFunctions();
        }
        
        public function getLibCardID($usersDBCon){  
            $libCardID = $this->basic->sanitizeData($usersDBCon, $_POST['LibraryCardID']);
            return $libCardID;
        }
        
        public function getUsername($usersDBCon){
            $username = $this->basic->sanitizeData($usersDBCon, $_POST['username']);
            return $username;
        } 
        
        public function libCardIDExist($usersDBCon){
        
            $libCardID = $this->getLibCardID($usersDBCon);

            $libCardID_sql = "SELECT LibraryCardID FROM Users WHERE LibraryCardID='$libCardID'";
            $query_libCardID = $usersDBCon->query($libCardID_sql);
            // check the connection
            if ($usersDBCon->connect_error) {
                die("Connection failed: " . $userDBCon->connect_error);
            } 
            
            $grab = $query_libCardID->fetch_object();
            if ($grab->LibraryCardID){
                 echo '<script type="text/javascript">
                         window.alert("An account with that library card already exists.");
                       </script>';   
                return true;
            }
            else {
                return false;
            }
        }
        
        public function createNewUser($usersDBCon){
            
            $firstName = $this->basic->sanitizeData($usersDBCon, $_POST['firstName']);
            $lastName = $this->basic->sanitizeData($usersDBCon, $_POST['lastName']);
            $password = $this->basic->sanitizeData($usersDBCon, $_POST['password']);
            $phyAddr = $this->basic->sanitizeData($usersDBCon, $_POST['address']);
            $city = $this->basic->sanitizeData($usersDBCon, $_POST['city']);
            $state = $this->basic->sanitizeData($usersDBCon, $_POST['state']);
            $zipcode = $this->basic->sanitizeData($usersDBCon, $_POST['zipcode']);
            $email = $this->basic->sanitizeData($usersDBCon, $_POST['emailAddress']);
            $phoneNum = $this->basic->sanitizeData($usersDBCon, $_POST['phoneNumber']);

            $libCardID = $this->getLibCardID($usersDBCon);
            $username = $this->getUsername($usersDBCon);
            // Librarians account would be made through system admin upon employment;
            // so, by default, anyone registering is a patron.
            $isLibrarian = false;

            $insert_sql = "INSERT INTO Users (LibraryCardID, username, password, firstName, lastName, address, city, state, zipcode, emailAddress, phoneNumber, isLibrarian) VALUES('$libCardID', '$username', '$password', '$firstName', '$lastName', '$phyAddr', '$city', '$state', '$zipcode', '$email', '$phoneNum', '$isLibrarian')";
            $query_register = $usersDBCon->query($insert_sql);
            // check the connection
            if ($usersDBCon->connect_error) {
                die("Connection failed: " . $userDBCon->connect_error);
            } 
            
            if (isset($query_register)){
                echo '<script type="text/javascript">
                            window.alert("Registration completed successfully. You will now be re-directed to the login page.");
                            window.location.href = "http://localhost/LibrarySite/index.php";
                          </script>';
            }
            else {
                echo '<script type="text/javascript">
                        window.alert("Registration failed. Please try again later.");
                      </script>';
            }
        }
        
        public function createAccount() {
            $usersDBCon = $this->db->dbConnect();
            
            
            // prevents SQL from getting pissy
            if (!empty($_POST['username'])){
                // if a library card ID hasn't been registered
                if ($this->libCardIDExist($usersDBCon) == false){

                    $username = $this->getUsername($usersDBCon);

                    $username_sql = "SELECT username FROM Users WHERE username='$username'";
                    $query_username = $usersDBCon->query($username_sql);
                    // check the connection
                    if ($usersDBCon->connect_error) {
                        die("Connection failed: " . $userDBCon->connect_error);
                    }

                    $grab = $query_username->fetch_object();
                    if($grab->username){
                        echo '<script type="text/javascript">
                                window.alert("Username already exists. Please try another username.");
                              </script>';
                    }
                    else{
                        $this->createNewUser($usersDBCon, $username);
                        echo "Hits second point.";
                    }
                }
            }
        }
    }

?>