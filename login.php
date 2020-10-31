<?php
include "conn.php";
session_start();
$email=$_POST['email'];
$password=$_POST['password'];

$log="SELECT * FROM `new_table` WHERE email='$email'";
$row=$conn->query($log); 
if($row->num_rows =='0'){
   header('location:reg.php?err=2');
}
else{
    $user=mysqli_fetch_assoc($row);
   
    if(md5($password)== $user['password']){
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            header('location:home.php');
    }
    else{
        header('location:log.php?err=3');
    }
}



?>

