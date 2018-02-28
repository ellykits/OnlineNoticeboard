<?php 
    session_start();
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['current_user']) ){
        header("location:../index.php");
    }

?>