<?php
    session_start();
    include "check_login.php";
    require "dbconnect.php";
    checkLogin($_SESSION['adminName']);

    if (isset($_POST['search'])) {
        $query = $_POST['query'];
        $searchSQL = "SELECT * FROM ADMIN WHERE CONCAT(`ADMINNAME`, `FULLNAME`, `EMAIL`, `STATUS`) LIKE '%" . $query . "%'";
        $filter = mysqli_query($connect, $searchSQL);
    } else {
        $searchSQL = "SELECT * FROM ADMIN";
        $filter = mysqli_query($connect, $searchSQL);
    }
    
?>
<html>
    <head>
        <title>Admin of Hotel Sri Batik</title>
        <link rel="stylesheet" type="text/css" href="Style/navbar.css">
        <link rel="stylesheet" type="text/css" href="Style/table.css">
        <link rel="stylesheet" type="text/css" href="Style/admin.css">
        <link rel="stylesheet" type="text/css" href="Style/master.css">
        <link rel="icon" href="https://i.imgur.com/9aPLcte.png">
        <script src="https://kit.fontawesome.com/4e84b13606.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="logo">
                    <a href="admin_mainpage.php" class="nav-link">
                      <span class="link-text logo-text">ADMIN</span>
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
                    <a href="admin_admin.php" class="nav-link">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z" class="fa-secondary"/>
                        <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Admin</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="admin_staff.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 640 512">
                        <path fill="currentColor" d="M144 160c-44.2 0-80-35.8-80-80S99.8 0 144 0s80 35.8 80 80s-35.8 80-80 80zm368 0c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM416 224c0 53-43 96-96 96s-96-43-96-96s43-96 96-96s96 43 96 96zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" class="fa-secondary"/>
                        <path fill="currentColor" d="M144 160c-44.2 0-80-35.8-80-80S99.8 0 144 0s80 35.8 80 80s-35.8 80-80 80zm368 0c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM416 224c0 53-43 96-96 96s-96-43-96-96s43-96 96-96s96 43 96 96zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Staff</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="admin_room.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M96 64c0-35.3 28.7-64 64-64H416c35.3 0 64 28.7 64 64V448h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H432 144 32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96V64zM384 288c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z" class="fa-secondary"/>
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M96 64c0-35.3 28.7-64 64-64H416c35.3 0 64 28.7 64 64V448h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H432 144 32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96V64zM384 288c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Room</span>
                        
                    </a>
                </li>

                <li class="nav-item">
                    <a href="admin_customer.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zM176 288c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80z" class="fa-secondary"/>
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zM176 288c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Customer</span>
                        
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="admin_sales.php" class="nav-link">
                        <svg 
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 352c-53 0-96-43-96-96s43-96 96-96s96 43 96 96s-43 96-96 96z" class="fa-secondary"/>
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 352c-53 0-96-43-96-96s43-96 96-96s96 43 96 96s-43 96-96 96z" class="fa-primary"/>
                        </svg>
                        <span class="link-text">Sales</span>
                        
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
        <main>
            <h1>Admin of Hotel Sri Batik</h1>
            <div class="container">
                
                <div class="btn">
                    <button onclick="document.location='admin_adminregister.php'" class="register_btn">Register Admin</button>
                </div><br>
                <div class="searchbox">
                    <form class="form" action="" method="POST">
                        <button type="submit" name="search">
                            <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
                                <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <input class="input" placeholder="Type your text" type="text" name="query">
                        <button class="reset" type="reset">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </form>
                </div>
                
                <div class="table">
                    <table class="stafftable">
                        <tr>
                            <th>No.</th>
                            <th>User Name</th>
                            <th>Full Name</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            //loop to show all room
                            $counter = 1;
                            while ($row = mysqli_fetch_array($filter)) {
                                $adminName = $row["ADMINNAME"];
                        ?>
                        <tr>
                            <td><?php echo $counter ?></td>
                            <td><?php echo $row['ADMINNAME']; ?></td>
                            <td style="text-transform: uppercase;"><?php echo $row['FULLNAME']; ?></td>
                            <td><?php echo $row['EMAIL']; ?></td>
                            <?php if ($row['STATUS'] == "ONLINE") { ?>
                                <td style="color: green"><b><?php echo $row['STATUS']; ?></b></td>
                            <?php } else { ?>
                                <td style="color: red"><b><?php echo $row['STATUS']; ?></b></td>
                            <?php } ?>
                            <td>
                            <button class="action__btn edit" onclick="document.location='admin_adminedit.php?adminName=<?php echo $row['ADMINNAME']; ?>'">Edit</button>
                            <?php
                            if ($_SESSION["adminName"] == $row["ADMINNAME"]) {
                                $functionClick = "deleteError()";
                                echo "<button class='action__btn delete' onclick=\"$functionClick\">Delete</button>";
                            } else {
                                $functionClick = "confirmDelete('{$row['ADMINID']}', '{$row['ADMINNAME']}')";
                                echo "<button class='action__btn delete' onclick=\"$functionClick\">Delete</button>";
                            }
                            ?>
                        </td>
                        </tr>
                        
                        <?php 
                            $counter++;
                            } 
                        ?>
                    </table>
                </div>    
            </div>
        </main>
        <script>
            function confirmDelete(adminId, adminName) {
                var confirmation = confirm("Are you sure you want to delete " + adminName + "?");

                if (confirmation) {
                    var url = "delete_function.php?adminId=" + adminId + "&adminName=" + adminName + "&editType=admin";
                    document.location = url;
                }
            }
            function deleteError() {
                alert("Sorry, you can't delete your own account. \nPlease ask another admin to delete it!");
            }
        </script>
    </body>
</html>