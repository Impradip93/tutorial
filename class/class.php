<?php
require_once('connector.php');

class album extends connect
{
    public function insert_album($data = array())
    {
        $sql = "INSERT INTO `album_tbl` (`album_id`, `user_id`, `album_title`, `al_message`, `date`) VALUES (NULL, '" . $data['user_id'] . "', '" . $data['title'] . "', '" . $data['description'] . "', current_timestamp())";
        //  INSERT INTO `album_tbl` (`album_id`, `user_id`, `album_title`, `al_message`, `date`) VALUES ('1', '21', 'wqe', 'qwee', current_timestamp());
        //print_r($this->mysqli);
        $result = $this->mysqli->query($sql);
        return $result;
    }
    public function get_albums($cond = array())
    {
        $sql = "SELECT * FROM `album_tbl`  where `album_tbl`.`user_id` = '" . $cond['user_id'] . "' ORDER BY `album_tbl`.`album_id` DESC";
        return $this->mysqli->query($sql);
    }

    public function del_album($cond = array())
    {  //  print_r($cond);
       $sql=" DELETE FROM `album_tbl` WHERE `album_id`='".$cond['album_id']."'";
         $result = $this->mysqli->query($sql);
        return $result;
    }

    public function upload_photo($data = array())
    {
        $sql = "INSERT INTO `upload_pic`(`photo_id`, `album_id`, `photo_path`, `date`) VALUES (NULL,'" . $data['album_id'] . "','" . $data['photo_path'] . "',current_timestamp())";
        $result = $this->mysqli->query($sql);
        return $result;
    }
    public function get_photo($cond = array())
    {
        $sql = "SELECT * FROM `upload_pic`  where `upload_pic`.`album_id` = '" . $cond['album_id'] . "' ORDER BY `upload_pic`.`photo_id` DESC";
        return $this->mysqli->query($sql);
    }
}
