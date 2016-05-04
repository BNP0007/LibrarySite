<?php
    require_once("CreateAccountController.php");

?>
<html>
    <head>
        <title>Register</title>
    </head>
    
    <body>
        <div class="container">
                <form action="CreateAccountManager.php" method="post" enctype="multipart/form-data">
                    First name <input name="firstName" type="text" required autofocus><br>
                    Last name <input name="lastName" type="text" required><br>
                    Username <input name="username" type="text" required><br>
                    Password <input name="password" type="password" required><br>
                    Library Card Number <input name="LibraryCardID" type="text" required><br>
                    Address <input name="address" type="text" required><br>
                    City <input name="city" type="text" required><br>
                    State 
                    <select name="state" required>
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
                        <option value="WY">Wyoming</option>
                    </select> <br>
                    Zipcode <input name="zipcode" type="text" required><br>
                    Email Address <input name="emailAddress" type="text"><br>
                    Phone Number <input name="phoneNumber" type="text">
                    <br><br>
                    <input name="submit" type="submit" value="Submit">
                </form>
        </div>
        <div class="create_account">
                <?php         
                    $register = new CreateAccountController();
            
                    if (isset($_POST['submit'])){       
                        $register->createAccount();
                    }
                ?>    
        </div>
    </body>
    
</html>