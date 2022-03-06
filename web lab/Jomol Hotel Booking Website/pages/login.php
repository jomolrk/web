<?php
	include 'connection.php';
    session_start();
    
    if(isset($_POST['login_submit'])){

        $log_emailid= $_POST['log_emailid'];
        $log_pwd= $_POST['log_pwd'];

        $login_res = mysqli_query($conn,"SELECT * FROM user WHERE user_emailid='$log_emailid' AND user_password='$log_pwd'");
        if(mysqli_num_rows($login_res) == 1){
            $data = mysqli_fetch_array($login_res);
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['user_fullname'] = $data['user_fullname'];
            $_SESSION['user_emailid'] = $data['user_emailid'];
            echo "<script>
                    alert('Login Successful.... Going to Reservation Page....');
                    window.location.href='reservation.php';
                </script>";
        }
        else{
            echo "<script>alert('Login Failed. Try again.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/login_css.css"/>
    </head>

    <body>

        <?php include 'navbar.php'; ?>

        <center id="login_form_container">
            <form action="login.php" method="post" id="login_form">
                
                <h1>Login Page</h1>

                <table cellspacing=25>
                    <tr>
                        <td><p>Email ID : </p></td>
                        <td><input type="text" placeholder="Enter Email ID" name="log_emailid" id="log_emailid" required></td>
                    </tr>

                    <tr>
                        <td><p>Password : </p></td>
                        <td><input type="password" placeholder="Enter Password" name="log_pwd" id="log_pwd" required></td>
                    </tr>
                </table>

                <input type="submit" name="login_submit" id="login_submit" value="LOGIN">

                <div style="margin-top: 20px; color:rgb(223, 223, 223);"><span style="font-size: 13px;">Don't have an account ? </span><a href="signup.php" id="log_signbtn">Sign-Up here</a></div>
            </form>	
        </center>
    </body>
</html>