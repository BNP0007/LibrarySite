<?php
    session_start();
    require_once "DatabaseConnector.php";
    require_once "BasicFunctions.php";

    // Can only add one card
    class CreatePaymentController {
        private $grab;
        private $db;
        private $userDBCon;
        
        public function __construct(){
            // init DBConnection
            $this->db = new DatabaseConnector();
            // init basic functions...need for santitizing data
            $this->basic = new BasicFunctions();
            // init database connection
            $this->userDBCon = $this->db->dbConnect();
        }
        
        public function checkForCard(){
            $username = $_SESSION['username'];
            
            // only need to check for cardNumber or nameOnCard
            $sql_checkForCard = "SELECT cardNumber FROM Users WHERE `username`='$username'";
            $query = $this->userDBCon->query($sql_checkForCard);
            $grab = $query->fetch_object();
            $cardNum = $grab->cardNumber;
            
            if(isset($cardNum)){
                echo '<script type="text/javascript">
                        window.alert("A card already exists on file.");
                     </script>';
                return true;
            }
            else {
                return false;
            }
            
        }
        
        public function createPayment($usCardNum, $usExpireMonth, $usExpireYear, $usCardHolderName) {
            // get username, cardnumber, and the name on the credit card
            $username = $_SESSION['username'];
            $cardNum = $this->basic->sanitizeData($this->userDBCon, $usCardNum);
            $expireMonth = $this->basic->sanitizeData($this->userDBCon, $usExpireMonth);
            $expireYear = $this->basic->sanitizeData($this->userDBCon, $usExpireYear);
            $cardHolderName = $this->basic->sanitizeData($this->userDBCon, $usCardHolderName);
            
            // update database to have a "payment on file"...stores under patron's username
            $sql_payment = "UPDATE Users SET `cardNumber`='$cardNum', `nameOnCard`='$cardHolderName', `cardExpireMonth`='$expireMonth', `cardExpireYear`='$expireYear' WHERE `username`='$username'";
            $query = $this->userDBCon->query($sql_payment);
            // check the connection
            if ($userDBCon->connect_error) {
                die("Connection failed: " . $userDBCon->connect_error);
            }      
            
            if(isset($query)){
                echo '<script type="text/javascript">
                        window.alert("Payment was successfully created! You will now be re-directed to the View Account Balance page.");
                        window.location.href = "http://localhost/LibrarySite/ViewAccountBalanceManager.php";
                     </script>';
            }
            
        }
        
    }  
?>