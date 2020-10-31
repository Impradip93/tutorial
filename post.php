<?php
session_start();
include "conn.php";
//feed= new feed();
//print_r $_POST;
//die;

//_SESSION['id']=$_POST['id'];
$messsage =mysqli_real_escape_string($conn,$_POST['message']);

$my_post="INSERT INTO `post_tbl` (`post_id`, `id`, `message`, `date`) VALUES ('', '".$_SESSION['id']."', '".$messsage."',  current_timestamp())";


//INSERT INTO `post_tbl` (`post_id`, `id`, `message`, `date`) VALUES (NULL, '21', 'dfffhhvhv', current_timestamp());



if(mysqli_query($conn,$my_post)){
header("location:home.php?succ=1");
}
?>