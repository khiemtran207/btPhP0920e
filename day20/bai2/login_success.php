<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/28/2020
 * Time: 8:22 AM
 */
session_start();

if(!isset($_SESSION['username'])){
    $_SESSION['success'] = "bạn cần đăng nhập trc khi truy cập trang";
    header('location: login.php');
    exit();
}
?>
<h1><?php echo $_SESSION['success']?></h1>
<p>Xin chào: <?php echo $_SESSION['username']?></p>
<a href="logout.php">logout</a>

