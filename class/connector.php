<?php
class connect{
    public $mysqli;
    public function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "", "mysite");
        if ($this->mysqli->connect_errno){
            echo "failed to connect MySQL: " . $this->mysqli->connect_error;
            exit();
        // $this->mysqli = new mysqli("localhost", "root", "", "mysite");
        // if ($this->mysqli->connect_errno){
        //     echo "failed to connect MySQL: " . $mysqli->connect_error();
        //     exit();
        }
    }
}
?>