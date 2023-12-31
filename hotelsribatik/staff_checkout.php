<?php
    session_start();
    include "check_login.php";
    require "dbconnect.php";
    checkLogin($_SESSION['staffName']);
?>
<html>
    <head>
        <title>Check Out | Hotel Sri Batik</title>
        <link rel="stylesheet" type="text/css" href="Style/navbar.css">
        <link rel="stylesheet" type="text/css" href="Style/form.css">
        <link rel="stylesheet" type="text/css" href="Style/master.css">
        <link rel="icon" href="https://i.imgur.com/9aPLcte.png">
        <script src="https://kit.fontawesome.com/4e84b13606.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="logo">
                    <a href="staff_mainpage.php" class="nav-link">
                      <span class="link-text logo-text">HSB</span>
                      <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="angle-double-right"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"
                        class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
                      >
                        <g class="fa-group">
                          <path
                            fill="currentColor"
                            d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                            class="fa-secondary"
                          ></path>
                          <path
                            fill="currentColor"
                            d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                            class="fa-primary"
                          ></path>
                        </g>
                      </svg>
                    </a>
                  </li>

                <li class="nav-item">
                    <a href="staff_checkin.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 576 512">
                        <path fill="currentColor" d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480v32h32 64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z" class="fa-secondary"/>
                        <path fill="currentColor" d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480v32h32 64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Check In</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="staff_checkout.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M96 64c0-35.3 28.7-64 64-64H416c35.3 0 64 28.7 64 64V448h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H432 144 32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96V64zM384 288c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z" class="fa-secondary"/>
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M96 64c0-35.3 28.7-64 64-64H416c35.3 0 64 28.7 64 64V448h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H432 144 32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96V64zM384 288c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Check Out</span>
                        
                    </a>
                </li>

                <li class="nav-item">
                    <a href="staff_room.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zM176 288c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80z" class="fa-secondary"/>
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zM176 288c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Room</span>
                        
                    </a>
                </li>

                <li class="nav-item">
                    <a href="staff_payment.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 352c-53 0-96-43-96-96s43-96 96-96s96 43 96 96s-43 96-96 96z" class="fa-secondary"/>
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 352c-53 0-96-43-96-96s43-96 96-96s96 43 96 96s-43 96-96 96z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Payment</span>
                        
                    </a>
                </li>

                <li class="nav-item">
                    <a href="logout_function.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z" class="fa-secondary"/>
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Sign Out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php
            $roomSQL = "SELECT * FROM ROOM";
            $roomResult = mysqli_query($connect, $roomSQL);
        ?>
        <main>
            <h1>Check Out Customer</h1>
            <div class="wrapper">
                <div class="title">
                  CUSTOMER DETAILS
                </div>
                <form action="checkout_function.php" method="POST" class="form">
                    <div class="inputfield">
                        <label>Room Number</label>
                        <select name="custRoomNum" class="input" required>
                        <option value="">Select room number</option>
                        <option value="" disabled class="optionType">--Single--</option>
                        <?php
                            while ($row = mysqli_fetch_array($roomResult)) {
                              if ($row['ROOMTYPE'] == "Single") {
                                if ($row['ISAVAILABLE'] == 0) {
                                  
                                  echo "<option value=" . $row['ROOMNUMBER'] . ">" . $row['ROOMNUMBER'] . "</option>";
                                } else {
                                  echo "<option value=" . $row['ROOMNUMBER'] . " disabled style='color:red'>" . $row['ROOMNUMBER'] . "</option>";
                                }
                              }
                              
                            }
                            mysqli_data_seek($roomResult, 0);
                        ?>
                        <option value="" disabled></option>
                        <option value="" disabled class="optionType">--Twin--</option>
                        <?php
                            while ($row = mysqli_fetch_array($roomResult)) {
                              if ($row['ROOMTYPE'] == "Twin") {
                                if ($row['ISAVAILABLE'] == 0) {
                                  echo "<option value=" . $row['ROOMNUMBER'] . ">" . $row['ROOMNUMBER'] . "</option>";
                                } else {
                                  echo "<option value=" . $row['ROOMNUMBER'] . " disabled style='color:red'>" . $row['ROOMNUMBER'] . "</option>";
                                }
                              }
                              
                            }
                            mysqli_data_seek($roomResult, 0);
                        ?>
                        <option value="" disabled></option>
                        <option value="" disabled class="optionType">--Queen--</option>
                        <?php
                            while ($row = mysqli_fetch_array($roomResult)) {
                              if ($row['ROOMTYPE'] == "Queen") {
                                if ($row['ISAVAILABLE'] == 0) {
                                  echo "<option value=" . $row['ROOMNUMBER'] . ">" . $row['ROOMNUMBER'] . "</option>";
                                } else {
                                  echo "<option value=" . $row['ROOMNUMBER'] . " disabled style='color:red'>" . $row['ROOMNUMBER'] . "</option>";
                                }
                              }
                              
                            }
                            mysqli_data_seek($roomResult, 0);
                        ?>
                        <option value="" disabled></option>
                        <option value="" disabled class="optionType">--Suite--</option>
                        <?php
                            while ($row = mysqli_fetch_array($roomResult)) {
                            if ($row['ROOMTYPE'] == "Suite") {
                                if ($row['ISAVAILABLE'] == 0) {
                                echo "<option value=" . $row['ROOMNUMBER'] . ">" . $row['ROOMNUMBER'] . "</option>";
                                } else {
                                echo "<option value=" . $row['ROOMNUMBER'] . " disabled style='color:red'>" . $row['ROOMNUMBER'] . "</option>";
                                }
                            }
                            
                            }
                            mysqli_data_seek($roomResult, 0);
                        ?>
                    </select>
                    </div> 
                    
                    <div class="inputfield">
                        <input type="submit" value="Check Out" class="btn">
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>