<?php
    session_start();
    session_destroy();
?>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" type="text/css" href="Style/mainpage.css">
        <link rel="stylesheet" href="Style/login.css">
        <link rel="stylesheet" href="Style/master.css">
        <link rel="icon" href="https://i.imgur.com/9aPLcte.png">
    </head>
    <body>
        <div class="box">
            <div class="login">
                <h2>Admin Login</h2>
                <form method="POST" action="login_function.php">
                    <div class="inputBox">
                        <input type="text" name="adminName" required="required">
                        <span>Admin Name</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="adminPass" required="required">
                        <span>Password</span>
                        <i></i>
                    </div>
                    <input type="hidden" name="formType" value="admin">
                    <br><input type="submit" value="Login">
                </form>
            </div>
        </div>
    </body>
</html>