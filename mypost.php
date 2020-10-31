<?php
include_once('class/class.php');
session_start();
if($_POST['title'] !='' && $_POST['description'] !=''){

    $data = $_POST;
    $data['user_id']=$_SESSION['id'];
    //print_r($data); die;
    $album= new album();
    //$album->insert_album($data); die;
   if($album->insert_album($data)== '1'){
        header('location:galary.php');
   }
    else{
        echo "something wrong";
    }
}

?>