<?php
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'bai23';

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);


//    if(!$connection){
//        die('kết nối thất bại'. mysqli_connect_error());
//    }else{
//        echo 'kết nối thành công';
//    }
?>