<?php
    session_start();
    unset($_SESSION['loggedIn']);
    session_destroy();
    
?>

<html>
    <head>
        <title></title>
    </head>
    
    <body>
        <meta http-equiv="refresh" content="1;url=index.php"/>
    </body>
</html>