<?php
include_once('class/class.php');

        if(isset($_GET['album_id'])){
            if($_GET['album_id'] !=''){
                $cond['album_id']=$_GET['album_id'];
            $delete = new album();
            if($delete->del_album($cond)){
                // print_r($delete);
                echo "success";
                header('location:galary.php');
            } 
        }
    }
