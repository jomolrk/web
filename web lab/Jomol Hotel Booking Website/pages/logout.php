<?php
    $isloggout=false;
    
    if(isset($_GET['isloggout'])){
        $isloggout= $_GET['isloggout'];
        if($isloggout){
            session_destroy();
            session_start();
            $_SESSION['user_id']=null;
            header('Location:index.php');
        }
    }
?>