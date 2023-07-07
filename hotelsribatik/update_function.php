<?php
    session_start();
    require "dbconnect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // check if the post from admin update form
        if ($_POST["formType"] == "editAdmin") {
            // retrieve data from post
            $adminId = $_SESSION["adminId"];
            $adminName = $_POST["adminName"];
            $fullName = $_POST["fullName"];
            $email = $_POST["adminEmail"];
            $password = $_POST["adminPassword"];

            // hash the password
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            // update the database
            $updateAdmin = "UPDATE ADMIN SET ADMINNAME = '$adminName', FULLNAME = '$fullName', EMAIL = '$email', PASSWORD = '$hashedPass' WHERE ADMINID = '$adminId'";
            // check if the admin update successful
            if (mysqli_query($connect, $updateAdmin)){
                //unset the room number session
                unset($_SESSION['roomNumber']);
                echo "<script>alert('Admin updated successfully!'); window.location.href = 'admin_admin.php';</script>";
            } else {
                echo "<script>alert('Admin update failed!'); history.back();</script>";
            }
        } elseif ($_POST["formType"] == "editStaff") {
            // retrieve data from post
            $staffId = $_SESSION["staffId"];
            $staffName = $_POST["staffName"];
            $fullName = $_POST["fullName"];
            $email = $_POST["staffEmail"];
            $password = $_POST["staffPassword"];

            // hash the password
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            // update the database
            $updateStaff = "UPDATE STAFF SET STAFFNAME = '$staffName', FULLNAME = '$fullName', EMAIL = '$email', PASSWORD = '$hashedPass' WHERE STAFFID = '$staffId'";
            // check if the admin update successful
            if (mysqli_query($connect, $updateStaff)){
                //unset the room number session
                unset($_SESSION['roomNumber']);
                echo "<script>alert('Staff updated successfully!'); window.location.href = 'admin_staff.php';</script>";
            } else {
                echo "<script>alert('Staff update failed!'); history.back();</script>";
            }
        }
    }

?>