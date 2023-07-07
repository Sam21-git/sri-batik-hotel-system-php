<?php
    session_start();
    error_reporting(E_ALL);
    require "dbconnect.php";

    //retrieve the data
    $roomNumber = $_POST['roomNum'];
    $custName = $_POST['custName'];
    $period = $_POST['period'];
    $roomPrice = (double) preg_replace("/[^0-9.]/", "", $_POST['roomPrice']);
    $totalPayment = (double) preg_replace("/[^0-9.]/", "", $_POST['totalPayment']);
    
    //get the current date and time
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');

    //insert into PAYMENT table
    $paySQL = "INSERT INTO PAYMENT (PAYCUSTNAME, PAYDATE, PAYTIME, PAYTOTAL, PAYROOM, PAYPERIOD)
    VALUES ('$custName', '$currentDate', '$currentTime', '$totalPayment', '$roomNumber', '$period')";

    if(mysqli_query($connect, $paySQL)){
        // Display payment receipt
        $receipt = "Payment Succeed!\\n";
        $receipt .= "------------------------\\n";
        $receipt .= "Customer Name: $custName\\n";
        $receipt .= "Room Number: $roomNumber\\n";
        $receipt .= "Period: $period night(s)\\n";
        $receipt .= "Room Price: RM $roomPrice\\n";
        $receipt .= "Total Payment: RM $totalPayment\\n";
        $receipt .= "Payment Date: $currentDate\\n";
        $receipt .= "Payment Time: $currentTime\\n";

        echo "<script>alert(`$receipt`); window.location.href = 'staff_mainpage.php';</script>";
    }else {
        echo "<script>alert('Customer payment failed! Error message: ". mysqli_error($connect) ."'); history.back();</script>";
    }

    //unset the room number session
    unset($_SESSION['roomNumber']);
?>