<?php
include "conn.php"; //connection establish
// $conn = new mysqli("localhost", "root", "", "mysite");

if($_POST["name"] !="" && $_POST["email"] !="" && $_POST["password"] !=""){
 $name=$_POST["name"];  
 $email=$_POST["email"];
 $password=md5($_POST["password"]);

$insert= "INSERT INTO `new_table` (`id`, `name`, `email`, `password`) VALUES ('', '".$name."', '".$email."', '".$password."')";
//data insert into database
 if(mysqli_query($conn,$insert)){
       header('location:log.php?succ=1');
    }

     else{
          echo "something wrong";
          }  
 }

else{
    header('location:reg.php?err=1');
}

