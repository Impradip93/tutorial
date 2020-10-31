<?php
require_once('connector.php');
class album extends connect{
    public function insert_album($data=array()){
        $sql="INSERT INTO `album_tbl` (`album_id`, `user_id`, `album_title`, `al_message`, `date`) VALUES (NULL, '".$data['user_id']."', '".$data['title']."', '".$data['mymessage']."', current_timestamp())";
    //  INSERT INTO `album_tbl` (`album_id`, `user_id`, `album_title`, `al_message`, `date`) VALUES ('1', '21', 'wqe', 'qwee', current_timestamp());
          //print_r($this->mysqli);
         $result=$this->mysqli->query($sql);
        return $result;
    }
    public function get_albums($cond = array()){
		$sql = "SELECT * FROM `album_tbl`  where `album_tbl`.`user_id` = '".$cond['user_id']."' ORDER BY `tbl_album`.`album_id` DESC";
		return $this->mysqli->query($sql);
	}
	
}


?>