<?php
    session_start();
    require_once "DatabaseConnector.php";
    require_once "ViewAccountBalanceController.php";
    require_once "BasicFunctions.php";

    date_default_timezone_set('America/Chicago');

    class PayController {
        private $db;
        private $basic;
                
        public function __construct(){
            $this->db = new DatabaseConnector();
            $this->basic = new BasicFunctions();
        }
        
        public function getCardOnFile($username){
            $userDBCon = $this->db->dbConnect();
            
            $sql_viewCard = "SELECT `cardNumber` FROM Users WHERE `username`='$username'";
            $query_cardNum = $userDBCon->query($sql_viewCard);
            // check the connection
            if ($userDBCon->connect_error) {
                die("Connection failed: " . $userDBCon->connect_error);
            }
            
            $grab = $query_cardNum->fetch_object();
            $cardNum = $grab->cardNumber;
            if (!isset($cardNum)){
                //do something
            }
            
            // close database connection
            $userDBCon->close();
                
            return $cardNum;
        }
        
        public function isCardExpired($username){
            $userDBCon = $this->db->dbConnect();
            
            $sql_checkDate = "SELECT `cardExpireMonth`, `cardExpireYear` FROM Users WHERE `username`='$username'";
            $query_expireDate = $userDBCon->query($sql_checkDate);
            if(isset($query_expireDate)){
                $grab = $query_expireDate->fetch_object();
                $expireMonth = $grab->cardExpireMonth;
                $expireYear = $grab->cardExpireYear;
                $expireDate = $expireMonth . $expireYear;
                if (strtotime($expireDate) > date('m y')) {
                    return false;
                }
                else {    
                    echo $expireDate;
                    echo '<script type="text/javascript">
                        window.alert("Card has expired. Please update your credit card information.");
                        </script>';
                    return true;
                }
            }
            else {
                echo '<script type="text/javascript">
                    window.alert("Something went wrong with the database connection. Sorry for any inconveniences. Please try again later.");
                 </script>';
            }
        }
        
        public function payFine($username, $unSanitizedPayAmount, $accountBalance){
            $userDBCon = $this->db->dbConnect();
            
            $payAmount = $this->basic->sanitizeData($userDBCon, $unSanitizedPayAmount);
            if ($payAmount > $accountBalance){
                // give an error
            }
            else {
                $newBalance = $accountBalance - $payAmount;
            }  
                        
            // update patron's account balance
            $sql_payment = "UPDATE Users SET `accountBalance`='$newBalance' WHERE `username`='$username'";
            $query = $userDBCon->query($sql_payment);
            if(isset($query)){
                echo '<script type="text/javascript">
                    window.alert("Payment processed. Thank you for your payment.");
                 </script>';
                // refresh page
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL="PayManager.php"">';
            }
            else {
                echo '<script type="text/javascript">
                    window.alert("Something went wrong with the database connection. Sorry for any inconveniences. Please try again later.");
                 </script>';
            }
        }
    }
?>