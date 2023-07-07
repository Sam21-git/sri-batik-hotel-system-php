<?php
    require "dbconnect.php";

    $custName = $_POST["custName"];
    $phoneNumber = $_POST["custNumber"];
    $address  = $_POST["custAddress"];
    $email = $_POST["custEmail"];
    $period = $_POST["custPeriod"];
    $gender = $_POST["custGender"];
    $roomNumber = $_POST["custRoomNum"];

    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //check if the room is available or not
        $checkRoom = "SELECT ISAVAILABLE FROM ROOM WHERE ROOMNUMBER = '$roomNumber'";
        $roomStatus = mysqli_query($connect, $checkRoom);

        if ($roomStatus && mysqli_num_rows($roomStatus) > 0) {
            $row = mysqli_fetch_assoc($roomStatus);
            $isAvailable = $row['ISAVAILABLE'];
            
            //isAvailable is 1 means room available
            if ($isAvailable == 1) {
                //check gender for prefix
                $prefix = ($gender == 'MALE') ? 'Mr.' : 'Ms.';
                $greetName = $prefix . ' ' . $custName;

                //generate unique id for cust
                function generateRandomID($length = 8) {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomID = '';
                
                    for ($i = 0; $i < $length; $i++) {
                        $randomID .= $characters[rand(0, strlen($characters) - 1)];
                    }
                
                    return $randomID;
                }

                // Check for uniqueness and regenerate if necessary
                $randomID = generateRandomID();
                $isUnique = false;
                while (!$isUnique) {
                    $query = "SELECT COUNT(*) as count FROM CUSTOMER WHERE CUSTID = '$randomID'";
                    $result = mysqli_query($connect, $query);
                    $row = mysqli_fetch_assoc($result);
                    $count = $row['count'];

                    if ($count == 0) {
                        $isUnique = true;
                    } else {
                        $randomID = generateRandomID();
                    }
                }

                //get the current date
                $currentDate = date('Y-m-d');
                
                //insert the customer data into CUSTOMER table
                $sql = "INSERT INTO CUSTOMER (CUSTID, CUSTNAME, CUSTPHONENUM, CUSTADDRESS, CUSTEMAIL, CUSTDATE, CUSTPERIOD, CUSTGENDER, CUSTROOMNUM)
                VALUES ('$randomID', '$custName', '$phoneNumber', '$address', '$email', '$currentDate', '$period', '$gender', '$roomNumber')";
                if(mysqli_query($connect, $sql)) {
                    echo "<script>alert('Customer registered! Welcome " .  $greetName . "!'); history.back();</script>";
                } else {
                    echo "<script>alert('Customer registration failed!'); history.back();</script>";
                }

                //update room status to occupied
                $updateStatus = "UPDATE ROOM SET ISAVAILABLE = '0' WHERE ROOMNUMBER = '$roomNumber'";
                $updateResult = mysqli_query($connect, $updateStatus);
                if(!$updateResult){
                    echo "<script>alert('Failed to update status!'); </script>";
                }
            } elseif ($isAvailable == 0) {
                echo "<script>alert('Room is already occupied! Please choose a different room.'); history.back();</script>";
            }
        }
    }
?>