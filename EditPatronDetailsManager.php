<?
    session_start();
    require_once("EditPatronDetailsController.php");

?>

<html>
    <head>
        <title>Edit Account Details</title>
    </head>

    <body>
        <div class="nav-bar">
            <nav>
                <ul>
                    <div class="nav-bar-links">
                        <li><a href="PatronHomepage.php">Home</a></li>
                        <li><a href="SearchItemManager.php">Search Database</a></li>
                        <li><a href="ContactLibrarianManager.php">Contact Us</a></li>
                        <div class="display-username">
                            <li>              
                                <?php  
                                    // display user's username
                                    if(isset($_SESSION['username'])){
                                        echo $_SESSION['username']. "!";}
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
        <div class="tab-descript">
            <h1>Account Details</h1>
        </div>   
        <div class="tabs">
            <nav>
                <ul>
                    <li><a href="ViewAccountBalanceManager.php" >View Account Balance</a></li>
                    <li><a href="CreatePaymentManager.php" >Add Payment Method</a></li>
                    <li><a href="PayManager.php" >Pay Fine</a></li>
                    <li>Edit Account Details</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="info-table">
                <?php
                
                    $isInit = true;
                    $accountDetails = new EditPatronDetailsController();

                    $username = $_SESSION['username'];
                    $accountDetails->setPatronDetails($isInit, $username);
                    $userInfo = $accountDetails->getPatronDetails();
                    
                ?>
                <form action="EditPatronDetailsManager.php" method="post" enctype="multipart/form-data">
                    First name <input name="firstName" 
                                      value="<?php echo $userInfo[0]; ?>"
                                      type="text"><br>
                    Last name <input name="lastName" 
                                     value="<?php echo $userInfo[1]; ?>"
                                     type="text" ><br>
                    Physical Address <input name="physAddr"
                                            value="<?php echo $userInfo[2]; ?>"
                                            type="text"><br>
                    City <input name="city" 
                                value="<?php echo $userInfo[3]; ?>"
                                type="text"><br>
                    State <select name="state">
                        <option selected="selected"><?php echo $userInfo[4];?></option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option></select><br>
                    Zipcode <input name="zipcode" 
                                   value="<?php echo $userInfo[5]; ?>"
                                   type="text"><br>
                    Email Address <input name="emailAddr" 
                                         value="<?php echo $userInfo[6]; ?>"
                                         type="text"><br>
                    Phone Number <input name="phoneNum" 
                                        value="<?php echo $userInfo[7]; ?>"
                                        type="text"><br>
                    Library Card ID # <input name="libCardID"
                                             value="<?php echo $userInfo[8]; ?>"
                                             type="text"
                                             readonly="readonly"><br>
                    Credit Card # <input name="cardNum" 
                                         value="<?php echo $userInfo[9]; ?>"
                                         type="text"><br>
                    Expiration Date <input name="cardExpireMonth"
                                           value="<?php echo $userInfo[10]; ?>"
                                           type="text"
                                           style="width:3em" 
                                           maxlength="2">/
                                    <input name="cardExpireYear"
                                           value="<?php echo $userInfo[11]; ?>"
                                           type="text"
                                           style="width:3em" maxlength="2">   
                    <br><br>
                    <input name="submit" type="submit" value="Submit">
                </form>
                <?php
                    if (isset($_POST['submit'])){  
                        $isInit = false;
                        $accountDetails->setPatronDetails($isInit, $username);
                        $accountDetails->editPatronDetails($username);
                    }   
            
                ?>
        </div>
    </body>

</html>