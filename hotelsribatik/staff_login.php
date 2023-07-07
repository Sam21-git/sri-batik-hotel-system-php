<?php
    session_start();
    session_destroy();
?>
<html>
    <head>
        <title>Staff Login</title>
        <link rel="stylesheet" href="Style/login.css">
        <link rel="stylesheet" type="text/css" href="Style/mainpage.css">
        <link rel="stylesheet" href="Style/master.css">
        <link rel="icon" href="https://i.imgur.com/9aPLcte.png">
    </head>
    <body>
        <div class="box">
            <div class="login">
                <h2>Staff Login</h2>
                <form method="POST" action="login_function.php">
                    <div class="inputBox">
                        <input type="text" name="staffName" required="required">
                        <span>Staff Name</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="staffPass" required="required">
                        <span>Password</span>
                        <i></i>
                    </div>
                    <input type="hidden" name="formType" value="staff">
                    <br><input type="submit" value="Login">
                </form>
            </div>
        </div>
    </body>
</html>