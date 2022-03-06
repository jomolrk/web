<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    $uid= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>

<html>
    <head>
        <meta charset = "utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/nav_bar_css.css"/>
    </head>
    <body>
        <nav id="nav_menu">
                <ul id="nav_menu_ul">
                    <li><a href = "index.php">Home</a></li> 
                    <li><a href = "aboutus.php">About us</a></li> 
                    <li><a href = "contactus.php">Contact us</a></li> 
                    <li><a href = "gallery.php">Gallery</a></li>
                    <li><a href = "dineandlounge.php">Dine and Lounge</a></li>			
                    <li><a href = "reservation.php">Make a reservation</a></li>
                    <li><a href = "rulesandregulation.php">Rules and Regulation</a></li>
                    <li style="display: <?php if($uid!=null){ echo "block"; }else{ echo "none"; } ?>;"><a href = "bookingresults.php">Booking Results</a></li>
                </ul>

                <ul id="nav_menu_ul_acc">
                    <div id="nav_menu_acc_profile" style="display: <?php if($uid!=null){ echo "flex"; }else{ echo "none"; } ?>;">
                        <p><?php echo isset($_SESSION['user_fullname']) ? $_SESSION['user_fullname'] : 'Username'; ?></p>
                        <a href="logout.php?isloggout=true"><i class="fa fa-power-off nav_menu_acc_logout_btn" title="Logout"></i></a>
                    </div>
                    
                    <li style="display: <?php if($uid!=null){ echo "none"; }else{ echo "flex"; } ?>;"><a href="login.php">Login / Register</a></li>
                </ul>
            </nav>
    </body>
</html>