<?php
//include "nav_code2.php";
session_start();
unset( $_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['id']);
session_destroy();
header('location:log.php');

?>