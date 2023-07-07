<?php
    session_start();
    require "dbconnect.php";

    $roomNumber = $_POST["custRoomNum"];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //check if the room is occupied
        $checkRoom = "SELECT ISAVAILABLE FROM ROOM WHERE ROOMNUMBER = '$roomNumber'";
        $roomStatus = mysqli_query($connect, $checkRoom);

        if($roomStatus && mysqli_num_rows($roomStatus) > 0) {
            $row = mysqli_fetch_assoc($roomStatus);
            $isAvailable = $row['ISAVAILABLE'];

            //isAvailable = 0 means the room is occupied
            if($isAvailable == 0){
                
                //find customer detail from CUSTOMER table using roomNumber
                $custSQL = "SELECT CUSTNAME, CUSTPERIOD FROM CUSTOMER WHERE CUSTROOMNUM = '$roomNumber'";
                $custResult = mysqli_query($connect, $custSQL);

                if ($custResult) {
                    $row = mysqli_fetch_assoc(($custResult));

                    //store the retrieved data in session variables
                    $_SESSION['custName'] = $row['CUSTNAME'];
                    $_SESSION['custPeriod'] = $row['CUSTPERIOD'];
                    $_SESSION['roomNumber'] = $roomNumber;

                    // alert check out succeed
                    echo "<script>alert('Check out successful! Thank you and please come again, ". $_SESSION['custName'] ."'); window.location.href = 'staff_payment.php';</script>";
                    //update the room status to available
                    $updateStatus = "UPDATE ROOM SET ISAVAILABLE = '1' WHERE ROOMNUMBER = '$roomNumber'";
                    $updateResult = mysqli_query($connect, $updateStatus);
                    if ($updateResult){
                        //delete checked out customer from the table
                        $deleteSQL = "DELETE FROM CUSTOMER WHERE CUSTROOMNUM = '$roomNumber'";
                        $deleteResult = mysqli_query($connect, $deleteSQL);

                        //error message if there is error to delete
                        if (!$deleteResult){
                            echo "<script>alert('Error to delete customer: " . mysqli_error($connect) . "');</script>";
                        }
                    } elseif(!$updateResult){
                        echo "<script>alert('Failed to update status!'); </script>";
                    }
                } else {
                    echo "<script>alert('Error retrieving customer data: " . mysqli_error($connect) . "');</script>";
                }
            } elseif ($isAvailable == 1) {
                echo "<script>alert('Room is available! Please choose correct room.'); history.back();</script>";
            }
        }
    }
?>