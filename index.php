<?php
    require_once "SignInController.php";
    require_once "BasicFunctions.php";

    $user = new SignInController();
    $basic = new BasicFunctions();

    if($basic->isLoggedIn() == true)
    {
        if($basic->isLibrarian() == true){
            $basic->redirectTo("LibrarianHomePage.php");
        }
        else {
            $basic->redirectTo("PatronHomePage.php");
        }
    }

    if (isset($_POST['login'])){
        
        $unSanitizedUsername = $_POST['username'];
        $unSanitizedPassword = $_POST['password'];
        
        if ($user->login($unSanitizedUsername, $unSanitizedPassword) == true){
            if ($basic->isLibrarian() == false){
                $basic->redirectTo("PatronHomepage.php");
            }
            else{
                $basic->redirectTo("LibrarianHomePage.php");
            }
        }
        else {
            echo '<script type="text/javascript">
                    window.alert("The email and password you entered don\'t match.");
                 </script>';
        }
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Login</title>
    </head>
    <body>
        <div class="login-container">
            <div class="login-header">
                <h1>Login</h1>
            </div>
            <div class="login-body">
                <form method="post" enctype="multipart/form-data">
                    <input placeholder="Username" name="username" type="text" autofocus>
                    <input placeholder="Password" name="password" type="password">
                    <br><br>
                    <input name="login" type="submit" value="Login">
                </form>
            </div>
            <div class="new-account">
                <p>Don't have an account?<a href="CreateAccountManager.php"> Sign-up!</a></p>
            </div>
        </div>
    </body>
</html>