<?php
    session_start();
    require "dbconnect.php";
    
    //check if the login form is from staff page
    if($_POST["formType"] === "staff"){
        $staffName = $_POST["staffName"];
        $staffPass = $_POST["staffPass"];

        //retrieve the login data from database
        $query = "SELECT PASSWORD FROM STAFF WHERE STAFFNAME = '$staffName'";
        $result = mysqli_query($connect, $query);

        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row["PASSWORD"];

            //verify password with hashed password
            if(password_verify($staffPass, $hashedPassword)){

                $updateQuery = "UPDATE STAFF SET STATUS = 'ONLINE' WHERE STAFFNAME = '$staffName'";
                $updateResult = mysqli_query($connect, $updateQuery);
                if($updateResult){
                    // Set staffName in the session
                    $_SESSION["staffName"] = $staffName;
                    $_SESSION["userType"] = $_POST["formType"];
                    header("Location: staff_mainpage.php");
                    exit;
                } else {
                    echo "<script>alert('Failed to update status!'); window.location.href = 'staff_login.php'</script>";
                    exit;
                }
            } else{
                echo "<script>alert('Wrong password!'); window.location.href = 'staff_login.php'</script>";
                exit;
            }
        }else{
            echo "<script>alert('Staff Name not found!'); window.location.href = 'staff_login.php'</script>";
            exit;
        }   
    } elseif ($_POST["formType"] === "admin") {
        $adminName = $_POST["adminName"];
        $adminPass = $_POST["adminPass"];

        //retrieve the login data from database
        $query = "SELECT PASSWORD FROM ADMIN WHERE ADMINNAME = '$adminName'";
        $result = mysqli_query($connect, $query);

        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row["PASSWORD"];

            //verify password with hashed password
            if(password_verify($adminPass, $hashedPassword)){

                $updateQuery = "UPDATE ADMIN SET STATUS = 'ONLINE' WHERE ADMINNAME = '$adminName'";
                $updateResult = mysqli_query($connect, $updateQuery);
                if($updateResult){
                    // Set staffName in the session
                    $_SESSION["adminName"] = $adminName;
                    $_SESSION["userType"] = $_POST["formType"];
                    header("Location: admin_mainpage.php");
                    exit;
                } else {
                    echo "<script>alert('Failed to update status!'); window.location.href = 'admin_login.php'</script>";
                    exit;
                }
            } else{
                echo "<script>alert('Wrong password!'); window.location.href = 'admin_login.php'</script>";
                exit;
            }
        }else{
            echo "<script>alert('Admin Name not found!'); window.location.href = 'admin_login.php'</script>";
            exit;
        }  
    } 
?>