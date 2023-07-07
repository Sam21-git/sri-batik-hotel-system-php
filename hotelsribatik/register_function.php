<?php
    require "dbconnect.php";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // check if the form from the admin registration
        if ($_POST["formType"] == "registerAdmin") {
            $adminName = $_POST['adminName'];
            $fullName = $_POST['fullName'];
            $adminEmail = $_POST['adminEmail'];
            $password = $_POST['adminPassword'];

            // hash the password
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            $adminSQL = "INSERT INTO ADMIN (ADMINNAME, FULLNAME, EMAIL, PASSWORD) VALUES ('$adminName', '$fullName', '$adminEmail', '$hashedPass')";
            //check if the admin registration successfully
            if (mysqli_query($connect, $adminSQL)) {
                echo "<script>alert('Admin registered successfully! Welcome " . $adminName . "!'); window.location.href = 'admin_admin.php';</script>";
            } else {
                echo "<script>alert('Admin registration failed!'); history.back();</script>";
            }
        } elseif ($_POST["formType"] == "registerStaff"){
            $staffName = $_POST['staffName'];
            $fullName = $_POST['fullName'];
            $staffEmail = $_POST['staffEmail'];
            $password = $_POST['staffPassword'];

            // hash the password
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            $staffSQL = "INSERT INTO STAFF (STAFFNAME, FULLNAME, EMAIL, PASSWORD) VALUES ('$staffName', '$fullName', '$staffEmail', '$hashedPass')";
            //check if the staff registration successfully
            if (mysqli_query($connect, $staffSQL)) {
                echo "<script>alert('Staff registered successfully! Welcome " . $staffName . "!'); window.location.href = 'admin_staff.php';</script>";
            } else {
                echo "<script>alert('Staff registration failed!'); history.back();</script>";
            }
        }
    }
    

?>