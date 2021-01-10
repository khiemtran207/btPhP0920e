<?php
session_start();
setcookie('username','',time()-1);
setcookie('password','',time()-1);
unset($_SESSION['username']);
$_SESSION['success'] = "đăng xuất thành công";
header('location: login.php')
?>