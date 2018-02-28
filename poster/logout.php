<?php

/**
 * @author nerdsofts 
 * @copyright 2016
 */

session_start();
unset($_SESSION['current_user']);
unset($_SESSION['role']);
session_destroy();
header("location:../index.php");
?>