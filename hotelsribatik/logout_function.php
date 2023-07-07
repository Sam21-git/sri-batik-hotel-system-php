<?php
    session_start(); // Start or resume the current session
    require "dbconnect.php";

    // if user is staff use these codes
    if ($_SESSION["userType"] == "staff") {
        //change staff status to offline
        $staffName = $_SESSION["staffName"];
        $updateQuery = "UPDATE STAFF SET STATUS = 'OFFLINE' WHERE STAFFNAME = '$staffName'";
        $updateResult = mysqli_query($connect, $updateQuery);

    } elseif ($_SESSION["userType"] == "admin") {
        //change staff status to offline
        $adminName = $_SESSION["adminName"];
        $updateQuery = "UPDATE ADMIN SET STATUS = 'OFFLINE' WHERE ADMINNAME = '$adminName'";
        $updateResult = mysqli_query($connect, $updateQuery);
    }

    // Destroy all session data
    session_destroy();

    // Prevent caching of the current page
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

    // Redirect to the main_mainpage.html or any other page you want
    header("Location: main_mainpage.html");

    //terminate database
    mysqli_close($connect);
    exit;
?>