<?php 

define("DB_HOST",'localhost');
define("DB_USER",'fahmid');
define("DB_PASS",'123456');
define("DB_NAME",'chack_trsh_box');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($conn){
    // echo "connection is successful";
} else {
    echo "EROOROROR";
}

?>