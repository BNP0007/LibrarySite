<?php
    session_start();
    require_once("ContactLibrarianController.php");

?>

<html>
    <head>
        <title>Contact Us</title>
    </head>

    <body>
        <div id="nav-bar">
            <nav>
                <ul>
                    <div class="nav-bar-links">
                        <li><a href="PatronHomepage.php">Home</a></li>
                        <li><a href="SearchItemManager.php">Search Database</a></li>
                        <div class="display-username">
                            <li>              
                                <?php  
                                    // display user's username
                                    if(isset($_SESSION['username'])){
                                        echo $_SESSION['username'];}
                                    else { 
                                        echo 'Session not set';
                                    }
                                ?>
                            </li>
                            <div class="logout">
                                <li><a href="LogoutController.php">Logout</a></li>
                            </div>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>  
        
        <div class="contact-header">
            <h1>Contact Us</h1>
        </div>
        <div class="contact">
            <form action="ContactLibrarianManager.php" method="POST">
                <label for="name">Name: <span class="required">*</span></label>
                <input name="name" class="contact-input-boxes" type="text" placeholder="John Doe" required="required" autocomplete="on" autofocus>
                <br>
                <label for="email">Email: <span class="required">*</span></label>
                <input name="email" class="contact-input-boxes" placeholder="johndoe@example.com" type="email" required="required" autocomplete="on" autofocus>
                <br>
                <label for="message">Message: <span class="required">*</span></label>
                <textarea rows="4" cols="50" name="message" placeholder="Enter your message here" type="text" id="comment" required="required"></textarea>
                <br>
                <input name="submit" id="submit-button" type="submit" value="Submit">
                <p></p>
            </form>
        </div>
        <div class="send_msg">
            <?php
                if(isset($_POST['submit'])){
                    $contactLibrarian = new ContactLibrarianController;
                    $contactLibrarian->sendMail();
                }
            ?>
        </div>
    </body>
</html>