<?php
	include 'connection.php';
    session_start();

    function roomBookFun($room_id){
        $uid= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "null";
        if($uid!="null" && $uid!=null){
            $_SESSION['room_book_id']=$room_id;
            echo "document.getElementById('book_dialog_form_container').style.display='block'";
        }
        else{
            echo "
                alert('User not logged in !! Please login to make the Book Request !');
                window.location.href='login.php';
            ";
        }
    }

    function closeRoomBookFun(){
        $_SESSION['room_book_id']=null;
        echo"document.getElementById('book_dialog_form_container').style.display='none'";
    }
    
    if(isset($_POST['rbook_submit_btn'])){
        $rbook_fullname= $_POST['rbook_fullname'];
        $rbook_age= $_POST['rbook_age'];
        $rbook_contactno= $_POST['rbook_contactno'];
        $rbook_address= $_POST['rbook_address'];
        $rbook_email_id= $_POST['rbook_email_id'];
        $rbook_checkin_time= $_POST['rbook_checkin_time'];
        $uid= $_SESSION['user_id'];
        $room_id= $_SESSION['room_book_id'];

        $reg_query = "INSERT INTO room_booking_reuests VALUES(NULL,'$uid','$rbook_fullname','$rbook_age','$rbook_contactno',
        '$rbook_address','$rbook_email_id','$rbook_checkin_time','$room_id','pending')";

        $_SESSION['room_book_id']=null;
        if(mysqli_query($conn,$reg_query)){
            echo "<script>
                    alert('Your Booking Request has been successfully accepted. The booking will be confirmed after the admin accpet the request. Please visit booking results page to see the status of your requests. Thank You.');
                    window.location.href='bookingresults.php';
                </script>";
        }
        else{
            echo "<script>alert(Booking Request Failed !! Please try later.);</script>";
        }
    }

?>

<!DOCTYPE html>
<html id="reservation_html">

	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/reservation_css.css"/>
	</head>

	<body>

        <?php include'navbar.php'; ?>

        <div id="book_dialog_form_container">
            <div id="room_book_form_div">
                <div><i id="room_book_form_close" class="fa fa-times" onclick="<?php closeRoomBookFun(); ?>" title="Close Booking"></i></div>
                <h2 style="margin-top: 10px;">Booking Request Form.</h2>
                <form id="room_book_form" action="#" method="post">

                    <table cellspacing=20>
                        <tr>
                            <td><label for="rbook_fullname">Full Name : </label><input type="text" name="rbook_fullname" id="rbook_fullname" placeholder="Enter Full Name" readonly value="<?php echo $_SESSION['user_fullname'] ?>"/></td>
                            <td id="room_book_table_twotd"><label for="rbook_age">Age : </label><input type="number" name="rbook_age" id="rbook_age" placeholder="Enter Age" min="18" required/></td>
                        </tr>

                        <tr>
                            <td><label for="rbook_contactno">Mobile No : </label><input type="text" name="rbook_contactno" id="rbook_contactno" placeholder="Enter Mobile Number" required/></td>
                            <td id="room_book_table_twotd"><label for="rbook_address">Full Address : </label><textarea name="rbook_address" id="rbook_address" placeholder="Enter Full Address" cols="5" required></textarea></td>
                        </tr>

                        <tr>
                            <td><label for="rbook_email_id">Email ID : </label><input type="text" name="rbook_email_id" id="rbook_email_id" placeholder="Enter Email ID" readonly value="<?php echo $_SESSION['user_emailid'] ?>"/></td>
                            <td id="room_book_table_twotd">
                                <label for="rbook_checkin_time">Select Check-In Time : </label>
                                <select name="rbook_checkin_time" id="rbook_checkin_time" required oninvalid="this.setCustomValidity('Select your Check In time !!')" oninput="this.setCustomValidity('')">
									<option value="" selected disabled>Check-In Time</option>
									<option value="Morning">Morning</option>
									<option value="Evening">Evening</option>
									<option value="Night">Night</option>
								</select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td id="room_book_table_twotd"><input type="reset" name="rbook_cancel_btn" id="rbook_cancel_btn" value="Clear"/><input type="submit" name="rbook_submit_btn" id="rbook_submit_btn"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
		
		<div id="reservation_main_container" style="overflow:auto">

			<center style="padding-top: 50px;">
				<h2 style="text-decoration: underline;">MAKE A RESERVATION</h2>
				<marquee id="reserve_des_txt"><b><i>Request for booking by clicking "Book Now" and kindly contact us for any queries via Call or Email</i></b></marquee>
				<p style="color:green">CONTACT NO: <b>9087654321</b></p>
				<p style="color:blue">Email: <b>reserverooms2hotel.com</b></p>
			</center>

			<div id="reserve_hostel_details">

                <?php
                     $room_cat_res= mysqli_query($conn,"SELECT * FROM room_category");
                        
                        while($row=mysqli_fetch_array($room_cat_res)){
                            
                            $room_cat_type= $row['room_cat_type'];
                            $room_cat_feature= $row['room_cat_feature'];
                            $room_cat_rate= $row['room_cat_rate'];
                            $room_count= $row['room_count'];
                            $room_cat_img= $row['room_cat_img'];
                            
                            echo '
                                <div style="width: 300px">
                                    <img src = "'.$room_cat_img.'"/>
                                    <h4 style = "color:rgba(50, 155, 50, 1);">'.$room_cat_type.'</h4>
                                    <p>Number of rooms available : '.$room_count.'</p>
                                    <p><small>'.$room_cat_feature.'</small></p>
                                    <p><b style = "color:red;">Rs : '.$room_cat_rate.'</b></p>
                            ';
                ?>

                                <button id="room_cat_book_btn" onclick="<?php roomBookFun($row['room_id']) ?>">Book Now</button>
                            </div>
                                    
                <?php   } ?>
                
			</div>

			<div id="reserve_end_div">
				<hr>
				<h2 style="text-align: center; margin: 0px 10px;">&#x2B16; &#x2B16; &#x2B16; Thank You. &#x2B16; &#x2B16; &#x2B16;</h2>
				<hr>
			</div>

		</div>

	</body>	
</html>