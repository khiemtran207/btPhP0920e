<?php
    session_start();
    unset($_SESSION['password']);
    unset($_SESSION['username']);
    setcookie('username',NULL,time()-1);
    setcookie('password',NULL,time()-1);
    $_SESSION['success'] = "Bạn đã đăng xuất khỏi hệ thống";
    header('location: index.php');
?>