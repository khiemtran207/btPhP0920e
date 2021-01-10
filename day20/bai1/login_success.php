<?php
    session_start();
    // neeus ng dung chua dang nhap thi deo cho vao
    if(!isset($_SESSION['username'])){
        $_SESSION['error'] = "Cần đăng nhập để truy cập trang này";
        header('location: login.php');
        exit();
    }
?>
<h1><?php echo $_SESSION['success'];?></h1>
<p>xin chào: <?php echo $_SESSION['username']?></p>
<a href="logout.php">Logout</a>
