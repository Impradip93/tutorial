<?php
 include "nav_code2.php";
 if (isset($_GET["succ"]) && $_GET["succ"] ==1){
    echo "Your registratioin successfuly completed";
    include "login_form.php";
 }
if(isset($_SESSION['id'])){
    header('location:home.php');
    }
//include "nav_code1.php";

if(isset($_GET['err']) && $_GET['err']==3){
    echo "Please enter correct password";
}
include_once "login_form.php";
?>