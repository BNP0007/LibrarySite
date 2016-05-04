<?
    session_start();
    require_once("EditPatronDetailsController.php");

?>

<html>
    <head>
        <title>View Patron Details</title>
    </head>

    <body>
        <div class="nav-bar">
        <nav>
            <ul>
                <div class="nav-bar-links">
                    <li><a href="LibrarianHomepage.php">Home</a></li>
                    <li><a href="SearchItemManager.php">Update Item Status</a></li>
                    <li><a href="SearchPatronManager.php">Search Patron</a></li>
                    <li><a href="LogoutController.php">Logout</a></li>
                 </div>   
            </ul>
        </nav>
        </div>  
        <div class="tab-descript">
            <h1>Patron Account Details</h1>
        </div>   
        
        <div class="info-table">
                <?php
                
                    $isInit = true;
                    $accountDetails = new EditPatronDetailsController();

                    $patronUsername = $_SESSION['patronUsername'];
                    $accountDetails->setPatronDetails($isInit, $patronUsername);
                    $userInfo = $accountDetails->getPatronDetails();
                    
                ?>
                <form action="EditPatronDetailsManager.php" method="post" enctype="multipart/form-data">
                    First name <input name="firstName" 
                                      value="<?php echo $userInfo[0]; ?>"
                                      type="text"
                                      readonly><br>
                    Last name <input name="lastName" 
                                     value="<?php echo $userInfo[1]; ?>"
                                     type="text" 
                                     readonly><br>
                    Physical Address <input name="physAddr"
                                            value="<?php echo $userInfo[2]; ?>"
                                            type="text"
                                            readonly><br>
                    City <input name="city" 
                                value="<?php echo $userInfo[3]; ?>"
                                type="text"
                                readonly><br>
                    State <input name="city" 
                                value="<?php echo $userInfo[4]; ?>"
                                type="text"
                                readonly><br>
                    Zipcode <input name="zipcode" 
                                   value="<?php echo $userInfo[5]; ?>"
                                   type="text"
                                   readonly><br>
                    Email Address <input name="emailAddr" 
                                         value="<?php echo $userInfo[6]; ?>"
                                         type="text"
                                         readonly><br>
                    Phone Number <input name="phoneNum" 
                                        value="<?php echo $userInfo[7]; ?>"
                                        type="text"
                                        readonly><br>
                    Library Card ID # <input name="libCardID"
                                             value="<?php echo $userInfo[8]; ?>"
                                             type="text"
                                             readonly><br>
                    Credit Card # <input name="cardNum" 
                                         value="<?php echo $userInfo[9]; ?>"
                                         type="text"
                                         readonly><br>
                    Expiration Date <input name="cardExpireMonth"
                                           value="<?php echo $userInfo[10]; ?>"
                                           type="text"
                                           style="width:3em" 
                                           maxlength="2"
                                           readonly>/
                                    <input name="cardExpireYear"
                                           value="<?php echo $userInfo[11]; ?>"
                                           type="text"
                                           style="width:3em" 
                                           maxlength="2"
                                           readonly>   
                <br><br>
                </form>
        </div>
    </body>

</html>