<?php
    session_start();
    $error = '';
    if(isset($_POST['submit'])){
        $obj_username = $_POST['username'];
        $obj_password = $_POST['password'];
        if(empty($obj_username)){
            $error = "không được để trống username";
        }else if(empty($obj_password)){
            $error = "không được để trống password";
        }
//        else if(!filter_var($obj_username, FILTER_VALIDATE_EMAIL)){
//            $error = "user name phải có định dạng email";
//        }
        else if(strlen($obj_password) < 3){
            $error = "password phải lớn hơn 3 kí tự";
        }else if($obj_username !== "admin " && (string) $obj_password !== "123456"){
            $error = "sai tài khoản hoặc mật khẩu";
        }


        if(empty($error)){
            if(isset($_POST['remember'])){
                setcookie('username', $obj_username, time()+30);
                // mật khẩu luôn phải đc mã hóa trc khi lưu
                setcookie('password', $obj_password, time()+30);
            }else{
                setcookie('username', $obj_username, time()-1);
                setcookie('password', $obj_password, time()-1);
            }
                $_SESSION['success'] = "đăng nhập thành công";
                $_SESSION['username'] = $obj_username;
                header('location: login_success.php');
                exit();
        }

    }
    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi, cần logout tài khoản nếu muốn quay trở lại màn hình login form';
    header('location: login_success.php');
    exit();
}
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<html>
<head>
    <title>Bài 3 ngày 20</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .container{
           max-width: 60%;
            margin:  0 auto;
        }
    </style>
</head>
<body>
<div class="container">
<form action="" method="post">
    <label>Username</label><br>
    <input type="text" name="username" value=""><br>
    <label>Password</label><br>
    <input type="password" name="password" value=""><br>
    <input type="checkbox" name="remember" value="1">Remember me<br>
    <input type="submit" value="Login" name="submit">
</form>
    <p style="color: red"><?php echo $error ?></p>
</div>
</body>
</html>
