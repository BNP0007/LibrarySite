<?php
    session_start();
    require_once "DatabaseConnector.php";
    require_once "User.php";
    require_once "BasicFunctions.php";
    
    class EditPatronDetailsController extends User {
        private $db;
        private $userInfo;
        private $userDBCon;
        
        public function __construct(){
            // init DBConnection
            $this->db = new DatabaseConnector();
            // init User constructor
            $this->userInfo = new User("", "", "", "", "", "", "", "", "", "", "", "", "");
            // init basic functions...need for santitizing data
            $this->basic = new BasicFunctions();
            // init database connection
            $this->userDBCon = $this->db->dbConnect();
        }
        
        public function setPatronDetails($isInit, $username){  
            // if the form is just initalizing the fields
            if ($isInit == true) {
                // get the user's info from the User database
                $sql = "SELECT * FROM Users WHERE `username`='$username'";
                $query = $this->userDBCon->query($sql);
                $grab = $query->fetch_object();
                $firstName = $grab->firstName;
                $lastName = $grab->lastName;
                $phyAddr = $grab->address;
                $city = $grab->city;
                $state = $grab->state;
                $zipcode = $grab->zipcode;
                $emailAddr = $grab->emailAddress;
                $phoneNum = $grab->phoneNumber;
                $libCardID = $grab->LibraryCardID;
                $cardNum = $grab->cardNumber;
                $cardExpireMonth = $grab->cardExpireMonth;
                $cardExpireYear = $grab->cardExpireYear;
                
                // set patron's account info
                $this->userInfo->setFirstName($firstName);
                $this->userInfo->setLastName($lastName);
                $this->userInfo->setPhyAddr($phyAddr);
                $this->userInfo->setCity($city);
                $this->userInfo->setState($state);
                $this->userInfo->setZipcode($zipcode);
                $this->userInfo->setEmailAddr($emailAddr);            
                $this->userInfo->setPhoneNum($phoneNum);   
                $this->userInfo->setLibCardID($libCardID);
                $this->userInfo->setCardNum($cardNum);
                $this->userInfo->setCardExpireMonth($cardExpireMonth);
                $this->userInfo->setCardExpireYear($cardExpireYear);    
            }
            else {
                // if the patron clicked submit, sanitize data then reset user's info
                $firstName = $this->basic->sanitizeData($this->userDBCon, $_POST['firstName']);
                $lastName = $this->basic->sanitizeData($this->userDBCon, $_POST['lastName']);
                $phyAddr = $this->basic->sanitizeData($this->userDBCon, $_POST['physAddr']);
                $city = $this->basic->sanitizeData($this->userDBCon, $_POST['city']);
                $state = $this->basic->sanitizeData($this->userDBCon, $_POST['state']);
                $zipcode = $this->basic->sanitizeData($this->userDBCon, $_POST['zipcode']);
                $phoneNum = $this->basic->sanitizeData($this->userDBCon, $_POST['phoneNum']);              
                $emailAddr = $this->basic->sanitizeData($this->userDBCon, $_POST['emailAddr']);
                $cardNum = $this->basic->sanitizeData($this->userDBCon, $_POST['cardNum']);
                $cardExpireMonth = $this->basic->sanitizeData($this->userDBCon, $_POST['cardExpireMonth']);
                $cardExpireYear = $this->basic->sanitizeData($this->userDBCon, $_POST['cardExpireYear']);
                
                // set patron's account info
                $this->userInfo->setFirstName($firstName);
                $this->userInfo->setLastName($lastName);
                $this->userInfo->setPhyAddr($phyAddr);
                $this->userInfo->setCity($city);
                $this->userInfo->setState($state);
                $this->userInfo->setZipcode($zipcode);
                $this->userInfo->setEmailAddr($emailAddr); 
                $this->userInfo->setPhoneNum($phoneNum);
                $this->userInfo->setCardNum($cardNum);
                $this->userInfo->setCardExpireMonth($cardExpireMonth);
                $this->userInfo->setCardExpireYear($cardExpireYear);    
            }      
        }
        
        public function getPatronDetails (){
            // get patron's account info
            $firstName = $this->userInfo->getFirstName();
            $lastName = $this->userInfo->getLastName();
            $phyAddr = $this->userInfo->getPhyAddr();
            $city = $this->userInfo->getCity();
            $state = $this->userInfo->getState();
            $zipcode = $this->userInfo->getZipcode();
            $emailAddr = $this->userInfo->getEmailAddr();
            $phoneNum = $this->userInfo->getPhoneNum();
            $libCardID = $this->userInfo->getLibCardID();
            $cardNum = $this->userInfo->getCardNum();
            $cardExpireMonth = $this->userInfo->getCardExpireMonth();
            $cardExpireYear = $this->userInfo->getCardExpireYear();

            $userInfo = array($firstName, $lastName, $phyAddr, $city, $state, $zipcode, $emailAddr, $phoneNum, $libCardID, $cardNum, $cardExpireMonth, $cardExpireYear);
           
            return $userInfo;
        }
            
        public function editPatronDetails($username){
            // get patrons's info
            $userInfo = $this->getPatronDetails();
            
            // update the details
            $sql_editDetails = "UPDATE Users SET firstName='$userInfo[0]', lastName='$userInfo[1]', address='$userInfo[2]', city='$userInfo[3]', state='$userInfo[4]', zipcode='$userInfo[5]', emailAddress='$userInfo[6]', phoneNumber='$userInfo[7]', cardNumber='$userInfo[8]', cardExpireMonth='$userInfo[10]', cardExpireYear='$userInfo[11]' WHERE `username`='$username'";
            $query = $this->userDBCon->query($sql_editDetails);
            // check the connection
            if ($userDBCon->connect_error) {
                die("Connection failed: " . $userDBCon->connect_error);
            }
            // refresh page
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL="EditPatronDetailsController.php"">';
        }

    }

?>