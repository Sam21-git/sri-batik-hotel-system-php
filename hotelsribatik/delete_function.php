<?php
    session_start();
    require "dbconnect.php";

    // check if get response from admin list
    if ($_GET["editType"] == "admin") {
        // retrieve data from post
        $adminId = $_GET["adminId"];

        // delete the database
        $deleteAdmin = "DELETE FROM ADMIN WHERE ADMINID = '$adminId'";
        // check if the admin deleted successful
        if (mysqli_query($connect, $deleteAdmin)){
            //unset the room number session
            unset($_SESSION['roomNumber']);
            echo "<script>alert('Admin deleted successfully!'); window.location.href = 'admin_admin.php';</script>";
        } else {
            echo "<script>alert('Deleting admin failed!: " . mysqli_error($connect) . " '); history.back();</script>";
        }
 
    } elseif ($_GET["editType"] == "staff") {
        // retrieve data from post
        $staffId = $_GET["staffId"];

        // delete the database
        $deleteStaff = "DELETE FROM STAFF WHERE STAFFID = '$staffId'";
        // check if the admin deleted successful
        if (mysqli_query($connect, $deleteStaff)){
            //unset the room number session
            unset($_SESSION['roomNumber']);
            echo "<script>alert('Staff deleted successfully!'); window.location.href = 'admin_staff.php';</script>";
        } else {
            echo "<script>alert('Deleting staff failed!: " . mysqli_error($connect) . " '); history.back();</script>";
        }
    }


?>