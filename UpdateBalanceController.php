<?php
    require_once("DatabaseConnector.php");
    require_once("BasicFunctions.php");

// make sure librarian can't enter more than owed
class UpdateBalanceController {

        private $db;
		private $bf;
        
        public function __construct(){
            $this->db = new DatabaseConnector();
			$this->bf = new BasicFunctions();
        }
		
		public function updateBalance(){
            $userDBCon = $this->db->dbConnect();

            $username = $this->bf->sanitizeData($userDBCon, $_POST['username']);
            $inputBalance = $this->bf->sanitizeData($userDBCon, $_POST['amountName']);

            $sql_aBalance = "SELECT accountBalance FROM Users WHERE `username`='$username'";
            $query = $userDBCon->query($sql_aBalance);
            $grab = $query->fetch_object();          
            $currentBalance = $grab->accountBalance;

            $newBalance = $this->computeNew($currentBalance, $inputBalance);
            $sql_setBalance = "UPDATE Users SET `accountBalance`='$newBalance' WHERE `username`='$username'";
            $query_accountBalance = $userDBCon->query($sql_setBalance);
            if(isset($query_accountBalance)){
                echo '<script type="text/javascript">
                    window.alert("Payment processed.");
                 </script>';
            }
            else {
                echo '<script type="text/javascript">
                    window.alert("Something went wrong with the database connection. Sorry for any inconveniences. Please try again later.");
                 </script>';
            }
		}
		
		public function computeNew($currentBalance, $inputBalance) {
            if ($inputBalance <= $currentBalance) {
                $newBalance = $currentBalance - $inputBalance;
            }
            else {
                echo '<script type="text/javascript">
                    window.alert("Amount must be less than current balance. Please try again.");
                 </script>';
            }
			return $newBalance;
		}
}

?>





