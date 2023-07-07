<?php
    // this function is to check if the user is login or not.
    function checkLogin($userSession) {
        if(!$userSession){
            echo "<script>alert('Please login first'); window.location.href = 'main_mainpage.html';</script>";
        }
    }
    
?>