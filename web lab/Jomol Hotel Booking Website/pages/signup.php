<?php
	include 'connection.php';
    session_start();

    if(isset($_POST['signup_submit'])){
        
        $signup_fullname= $_POST['signup_fullname'];
        $signup_emailid= $_POST['signup_emailid'];
        $signup_pwd= $_POST['signup_pwd'];

        $email_check = mysqli_query($conn,"SELECT user_id FROM user WHERE user_emailid='$signup_emailid'");
        if(mysqli_num_rows($email_check) >= 1){
            echo "<script>alert('This EmailID already registered !! Please login.');</script>";
        }
        else{
            $reg_query = "INSERT INTO user VALUES(NULL,'$signup_fullname','$signup_emailid','$signup_pwd')";

            if(mysqli_query($conn,$reg_query)){

                $signup_res = mysqli_query($conn,"SELECT * FROM user WHERE user_emailid='$signup_emailid' AND user_password='$signup_pwd'");
                if(mysqli_num_rows($signup_res)==1){
                    $data = mysqli_fetch_array($signup_res);
                    $_SESSION['user_id'] = $data['user_id'];
                    $_SESSION['user_fullname'] = $data['user_fullname'];
                    $_SESSION['user_emailid'] = $s['user_emailid'];

                    echo "<script>
                            alert('Registration Successful.');
                            window.location.href='reservation.php';
                        </script>";
                }
                else{
                    echo "<script>
                            alert('Account created but error occurred !! Please try to login to this account.');
                            window.location.href='login.php';
                        </script>";
                }
            }
            else {
                echo "<script>alert('Registration Failed !! Try Again.');</script>";
            }
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
            <form action="#" method="post" id="signup_form">
                
                <h1>Register Page</h1>

                <table cellspacing=25>

                    <tr>
                        <td><p>Full Name : </p></td>
                        <td><input type="text" placeholder="Enter Full Name" name="signup_fullname" id="signup_fullname" required></td>
                    </tr>

                    <tr>
                        <td><p>Email ID : </p></td>
                        <td><input type="text" placeholder="Enter Email ID" name="signup_emailid" id="signup_emailid" required></td>
                    </tr>

                    <tr>
                        <td><p>Password : </p></td>
                        <td><input type="password" placeholder="Enter Password" name="signup_pwd" id="signup_pwd" required></td>
                    </tr>

                </table>

                <input type="submit" name="signup_submit" id="signup_submit" value="Sign Up">

                <div style="margin-top: 20px; color:rgb(223, 223, 223);"><span style="font-size: 13px;">Already have an account ? </span><a href="login.php" id="sign_logbtn">Login here</a></div>
            </form>	
        </center>
    </body>
</html>