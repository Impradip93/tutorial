<?php
//require_once('feed/connector.php');
require_once('feed/insert_album.php');
//include "conn.php";
//include "myalbum2.php";
//include "new_alubm.php";
session_start();

if($_POST['title'] !='' && $_POST['mymessage'] !=''){

    $data = $_POST;
    $data['user_id']=$_SESSION['id'];
    //print_r($data); die;
    $album= new album();
    //$album->insert_album($data); die;
   if($album->insert_album($data)== '1'){
        header('location:alubm.php');
   }
    else{
        echo "something wrong";
    }
}
// class connect{
//     public function __construct(){
//         $this->mysqli = new mysqli("localhost", "root", "", "mysite");
//         if ($this->mysqli->connect_errno){
//             echo "failed to connect MySQL: " . $mysqli->connect_error;
//             exit();
//         }
//     }
// }

// class album extends connect{
//     public function insert_album($data=array()){
//         $sql="INSERT INTO `album_tbl` (`album_id`, `user_id`, `album_title`, `al_message`, `date`) VALUES (NULL, '".$data['user_id']."', '".$data['title']."', '".$data['mymessage']."', current_timestamp())";
//     //  INSERT INTO `album_tbl` (`album_id`, `user_id`, `album_title`, `al_message`, `date`) VALUES ('1', '21', 'wqe', 'qwee', current_timestamp());
//           print_r($this->mysqli);
//         // $result=$this->mysqli->query($sql);
//         return $result;
//     }
// }

?>
