<?php
    session_start();
   date_default_timezone_set('asia/Ho_Chi_Minh');
   if(!$_SESSION['username']){
       $_SESSION['error'] = "bạn phải đăng nhập trc khi truy cập";
       header('location: index.php');
       exit();
   }
?>
<h1><?php echo $_SESSION['success']?></h1>
<p>chào mừng bạn: <?php echo $_SESSION['username'] ?></p>
<p>Thời gian hiện tại là: <?php echo date('h:i:s d/m/Y') ?></p>
<a href="logout.php">Logout</a>
<?php
    unset($_SESSION['success']);
?>
