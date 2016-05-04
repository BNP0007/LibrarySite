<?php
    class BasicFunctions {
        
        public function sanitizeData($usersDBCon, $unSanitizedData){
            $stillunSanitized = strip_tags($unSanitizedData);
            $stillunSanitized = stripslashes($stillunSanitized);
            $sanitized = mysqli_real_escape_string($usersDBCon, $stillunSanitized);
            
            return $sanitized;
        }

        public function redirectTo($url)
        {
            header("Location: $url");
        }
        
        public function isLoggedIn(){
            if(isset($_SESSION['loggedIn']))
            {
                return true;
            }
            else {
                return false;
            }
        }
 
        public function isLibrarian() {
            if (isset($_SESSION['isLibrarian'])){
                return true;
            }
            else {
                return false;
            }
        }
    }
?>