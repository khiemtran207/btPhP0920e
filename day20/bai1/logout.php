<?php
    session_start();
unset($_SESSION['username']);
unset($_SESSION['success']);
$_SESSION['success'] = "Đăng xuất thành công";
header('location: login.php');
?>