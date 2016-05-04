<?php
    
    session_start();
    
    class ContactLibrarianController {
            
        public function sendMail() {
            $username = $_SESSION['username'];
            $name = $_POST['name'];
            $patronEmail = $_POST['email'];
            $message = $_POST['message'];

            $mail_to = 'savagelibrarians@gmail.com';
            $subject = 'Message from an Savage Library user ' .$name;
            $body_msg = 'The following suggetions have been made by: ' .$name. ', ' .$username. ',';
            $body_msg .= ' with the email address, '.$patronEmail. "\n\n";
            $body_msg .= 'Message: ' .$message;

            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";

            $mail_status = mail($mail_to, $subject, $body_msg, $headers) or die("There was an issue sending an email.");

            if ($mail_status){
                echo '<script type="text/javascript">
                          window.alert("Thank you for your suggestions.");
                          window.location.href = "http://localhost/LibrarySite/ContactLibrarianController.php";
                      </script>';
            }
            else {
                echo '<script type="text/javascript">
                          window.alert("Message failed. Please send an email to BrittneyNPierce@gmail.com to address this issue. Sorry for any inconvinces this may cause.");
                          window.location.href = "http://localhost/LibrarySite/ContactLibrarianController.php";
                      </script>';
            }
        }
    }

?>

