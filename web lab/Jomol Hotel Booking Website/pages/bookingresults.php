<?php
    include 'connection.php';
    session_start();
    
    $uid= $_SESSION['user_id'];

    if(isset($_POST['delete_btn'])){
        
        $book_id= $_POST['book_id'];
        
        $record_delete_sql= "DELETE from room_booking_reuests WHERE rbook_id=".$book_id." AND rbook_uid=$uid";

        if(mysqli_query($conn,$record_delete_sql)){
            echo "<script>
                    alert('Your pending request has been deleted successfully.');
                    window.location.href='bookingresults.php';
                </script>";
        }
    }

    if(isset($_POST['update_btn'])){
        $age= $_POST['age'];
        $contact_no= $_POST['contact_no'];
        $address= $_POST['address'];
        $check_in_time= $_POST['check_in_time'];
        $book_id=$_POST['book_id'];
        
        $addplaylist_sql= "UPDATE room_booking_reuests SET rbook_age='$age', rbook_contactno='$contact_no',
        rbook_address='$address', rbook_checkin_time='$check_in_time' WHERE rbook_id=$book_id AND rbook_uid=$uid";

        if(mysqli_query($conn,$addplaylist_sql)){
            echo "<script>
                    alert('Your record has been updated successfully.');
                    window.location.href='bookingresults.php';
                </script>";
        }
    }
?>

<html>
    <head>
        <title>Booking Results</title>
        <meta charset = "utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/bookingresults_css.css"/>

        <style>
            th{
                padding: 10px;
                background-color: #fff;
            }

            table{
                margin-top: 30px;
            }

            tr{
                background-color: #fff;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <?php include'navbar.php'; ?>

        <center>
            <div style="padding: 30px 0px;">

                <h1 style="margin-top: 30px;">Accepted Requests</h1>
                <p>The booking requests that are processed and accepted by the admin are listed here</p>
                <table border="1" cellspacing="5" style="background-image: linear-gradient(#1f9900, #166d00);">
                    <tr style="background-color: white;">
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th>Full Address</th>
                        <th>Email ID</th>
                        <th>Check In Time</th>
                        <th>Booking Status</th>
                    </tr>

                    <?php
                        $uid= $_SESSION['user_id'];
                        $rbook_data_res= mysqli_query($conn,"SELECT * FROM room_booking_reuests where rbook_uid=$uid AND rbook_status='accepted'");
                        
                        while($row=mysqli_fetch_array($rbook_data_res)){
                            
                            $rbook_fullname= $row['rbook_fullname'];
                            $rbook_age= $row['rbook_age'];
                            $rbook_contactno= $row['rbook_contactno'];
                            $rbook_address= $row['rbook_address'];
                            $rbook_email_id= $row['rbook_email_id'];
                            $rbook_checkin_time= $row['rbook_checkin_time'];
                            $rbook_status= $row['rbook_status'];

                            echo '
                                <tr>
                                    <td>'.$rbook_fullname.'</td>
                                    <td>'.$rbook_age.'</td>
                                    <td>'.$rbook_contactno.'</td>
                                    <td>'.$rbook_address.'</td>
                                    <td>'.$rbook_email_id.'</td>
                                    <td>'.$rbook_checkin_time.'</td>
                                    <td>'.$rbook_status.'</td>
                                </tr>
                            ';
                        }
                    ?>
                </table>

                <h1 style="margin-top: 30px;">Pending Booking Requests</h1>
                <p>The booking requests that are pending to be processed and verified by the admin are listed here</p>
                <table border="1" cellspacing="5" style="background-color: cyan;">
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th>Full Address</th>
                        <th>Email ID</th>
                        <th>Check In Time</th>
                        <th>Booking Status</th>
                        <th>Options</th>
                    </tr>

                    <?php
                        $uid= $_SESSION['user_id'];
                        $rbook_data_res= mysqli_query($conn,"SELECT * FROM room_booking_reuests where rbook_uid=$uid AND rbook_status='pending'");
                        
                        while($row=mysqli_fetch_array($rbook_data_res)){
                            
                            $rbook_id= $row['rbook_id'];
                            $rbook_fullname= $row['rbook_fullname'];
                            $rbook_age= $row['rbook_age'];
                            $rbook_contactno= $row['rbook_contactno'];
                            $rbook_address= $row['rbook_address'];
                            $rbook_email_id= $row['rbook_email_id'];
                            $rbook_checkin_time= $row['rbook_checkin_time'];
                            $rbook_status= $row['rbook_status'];

                            echo '
                                <tr>
                                    <form action="#" method="post">
                                        <td>
                                            <input type="text" name="book_id" value="'.$rbook_id.'" readonly style="display: none"/>
                                            <input type="text" name="uname" id="uname" value="'.$rbook_fullname.'" disabled/>
                                        </td>
                                        <td><input type="text" name="age" id="age" value="'.$rbook_age.'"/></td>
                                        <td><input type="text" name="contact_no" id="contact_no" value="'.$rbook_contactno.'"/></td>
                                        <td><input type="text" name="address" id="address" value="'.$rbook_address.'"/></td>
                                        <td><input type="text" name="email" id="email" value="'.$rbook_email_id.'" disabled/></td>
                                        <td>
                            ';
                    ?>

                    <select name="check_in_time" style="width: 100%;">
                        <option value="Morning" <?php if($rbook_checkin_time=='Morning'){echo 'selected';} ?>>Morning</option>
                        <option value="Evening" <?php if($rbook_checkin_time=='Evening'){echo 'selected';} ?>>Evening</option>
                        <option value="Night" <?php if($rbook_checkin_time=='Night'){echo 'selected';} ?>>Night</option>
                    </select>
                            
                    <?php
                            echo '
                                </td>
                                <td><input type="text" name="status" id="status" value="'.$rbook_status.'" disabled/></td>
                                <td>
                                    <input type="submit" name="update_btn" id="update_btn" value="Update"/>
                                    <input type="submit" name="delete_btn" value="Delete"/>
                                </td>
                                </form>
                                </tr>
                            ';
                        }
                    ?>
                </table>

                <h1 style="margin-top: 30px;">Cancelled Booking Requests</h1>
                <p>The booking requests that are cancelled by the admin are listed here</p>
                <table border="1" cellspacing="5" style="background-image: linear-gradient(rgb(255, 66, 66), #a00000);">
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th>Full Address</th>
                        <th>Email ID</th>
                        <th>Check In Time</th>
                        <th>Booking Status</th>
                    </tr>

                    <?php
                        $uid= $_SESSION['user_id'];
                        $rbook_data_res= mysqli_query($conn,"SELECT * FROM room_booking_reuests where rbook_uid=$uid AND rbook_status='cancelled'");
                        
                        while($row=mysqli_fetch_array($rbook_data_res)){
                            
                            $rbook_fullname= $row['rbook_fullname'];
                            $rbook_age= $row['rbook_age'];
                            $rbook_contactno= $row['rbook_contactno'];
                            $rbook_address= $row['rbook_address'];
                            $rbook_email_id= $row['rbook_email_id'];
                            $rbook_checkin_time= $row['rbook_checkin_time'];
                            $rbook_status= $row['rbook_status'];

                            echo '
                                <tr>
                                    <td>'.$rbook_fullname.'</td>
                                    <td>'.$rbook_age.'</td>
                                    <td>'.$rbook_contactno.'</td>
                                    <td>'.$rbook_address.'</td>
                                    <td>'.$rbook_email_id.'</td>
                                    <td>'.$rbook_checkin_time.'</td>
                                    <td>'.$rbook_status.'</td>
                                </tr>
                            ';
                        }
                    ?>
                </table>

                <h2 style="text-align: center; margin: 30px 0px;">&#x2B16; &#x2B16; &#x2B16; Thank You. &#x2B16; &#x2B16; &#x2B16;</h2>

            </div>
        </center>
    </body>
</html>