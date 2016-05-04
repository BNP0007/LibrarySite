<?php
    
    class User {
        private $firstName;
        private $lastName;
        private $phyAddr;
        private $city;
        private $state;
        private $zipcode;
        private $emailAddr;
        private $phoneNum;
        private $cardNum;
        private $cardExpireMonth;
        private $cardExpireYear;
        
        public function __construct($firstName, $lastName, $phyAddr, $city, $state, $zipcode, $emailAddr, $phoneNum, $libCardID, $username, $cardNum, $cardExpireMonth, $cardExpireYear){
                $this->firstName = $firstName;
                $this->lastName = $lastName;
                $this->phyAddr = $phyAddr;
                $this->city = $city;
                $this->state = $state;
                $this->zipcode = $zipcode;
                $this->emailAddr = $emailAddr;
                $this->phoneNum = $phoneNum;
                $this->libCardID = $libCardID;
                $this->username = $username;
                $this->cardNum = $cardNum;
                $this->cardExpireMonth = $cardExpireMonth;
                $this->cardExpireYear = $cardExpireYear;
        }
        
        public function setFirstName($firstName){
            $this->firstName = $firstName;            
        }
        
        public function getFirstName(){
            return $this->firstName;
        }
        
        public function setLastName($lastName){
            $this->lastName = $lastName;
        }
        
        public function getLastName(){
            return $this->lastName;
        }
        
        public function setPhyAddr($phyAddr){
            $this->phyAddr = $phyAddr;            
        }
        
        public function getPhyAddr(){
            return $this->phyAddr;            
        }
        
        public function setCity($city){
            $this->city = $city;         
        }
        
        public function getCity(){
            return $this->city;            
        }
        
        public function setState($state){
            $this->state = $state;     
        }
        
        public function getState(){
            return $this->state;            
        }
        
        public function setZipcode($zipcode){
            $this->zipcode = $zipcode;      
        }
        
        public function getZipcode(){
            return $this->zipcode;            
        }
        
        public function setEmailAddr($emailAddr){
            $this->emailAddr = $emailAddr;
        }
        
        public function getEmailAddr(){
            return $this->emailAddr;            
        }
        
        public function setPhoneNum($phoneNum){
            $this->phoneNum = $phoneNum;    
        }
        
        public function getPhoneNum(){
            return $this->phoneNum;    
        }
        
        public function setLibCardID($libCardID){
            $this->libCardID = $libCardID;            
        }
        
        public function getLibCardID(){
            return $this->libCardID;
        }
        
        public function setUsername($username){
            $this->username = $username;
        }
        
        public function getUsername(){
            return $this->username;
        }
        
        public function setCardNum($cardNum){
            $this->cardNum = $cardNum;
        }
        
        public function getCardNum(){
            return $this->cardNum;
        }
        
        public function setCardExpireMonth($cardExpireMonth){
            $this->cardExpireMonth = $cardExpireMonth;
        }
        
        public function getCardExpireMonth(){
            return $this->cardExpireMonth;
        }
        
        public function setCardExpireYear($cardExpireYear){
            $this->cardExpireYear = $cardExpireYear;
        }
        
        public function getCardExpireYear(){
            return $this->cardExpireYear;
        }
        
        
    }
      
      
?>