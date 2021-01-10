
<?php
    session_start();
    if(isset($_COOKIE['username'])){
        $_SESSION['success'] = "đăng nhập thành công tự động";
        $_SESSION['username'] = $_COOKIE['username'];
        header('location: login_success.php');
        exit();
    }
    if(isset($_SESSION['username'])){
        $_SESSION['success'] = "bạn đã đăng nhập rồi";
        header('location: login_success.php');
        exit();
    }
    $error= '';
    if(isset($_POST['submit'])){
        $obj_username = $_POST['username'];
        $obj_password = $_POST['password'];
        if(empty($obj_username)){
            $error = "không được để trống username";
        }else if(empty($obj_password)){
            $error = "không được để trống password";
        }else if(!filter_var($obj_username, FILTER_VALIDATE_EMAIL)){
            $error = "user name phải có định dạng email";
        }else if(strlen($obj_password) < 3){
            $error = "mật khẩu phải có độ dài hơn 3 kí tự";
        }
        if(empty($error)){
            if(isset($_POST['remember'])){
                setcookie('username', $obj_username, time()+300);
                setcookie('password', $obj_password, time()+300);
            }
            $_SESSION['success'] = "đăng nhập thành công";
            $_SESSION['username'] = $obj_username;
            header('location: login_success.php');
            exit();
        }
    }
?>
<html>
    <head>
        <title>bài 2 ngày 20</title>
        <link rel="stylesheet" href="../css-fotnawesome/all.min.css">
        <style>
            body{
                padding: 0;
                margin: 0;
            }
            .container{
                font-family: Arial, san-serif;
                margin: 0 auto;
                max-width: 70%;
                width: 50%;
                background-image: url("../image/img1.jpg");
                background-repeat: no-repeat;
                background-size: cover  ;
                background-position: center;
                border: 1px solid gray;
            }
            .title {
                text-align: center;
                color: black;
                height: 80px;
                line-height: 80px;
                font-size: 29px;
                margin-bottom: 10px;
            }
            .input {
                width: 70%;
                margin: 10px 15% 50px 15%;
                display: flex;
                height: 35px;
                align-items: center;
                /* justify-content: center; */
                border-bottom: 2px solid #fff;
            }
            label {
                margin: 0 0 10px 15%;
                color: #5a4a4a;
                font-size: 18px;
            }
            .data {
                width: 100%;
                border: none;
                background: rgba(0,0,0,0);
                height: 90%;
                font-size: 15px;
            }
            i {
                font-size: 22px;
                margin-right: 20px;
            }
            .submit {
                padding: 10px 0 40px 15%;
            }
            input[type="submit"] {
                border: none;
                background: #ffb897;
                border-radius: 5px;
                width: 80px;
                height: 35px;
                color: #fff;
                font-size: 15px;

            }
            input[type="submit"]:hover{
                background: #ffad3c;
            }
            p.remember {
                margin: 10px 0 30px 15%;

            }
            label.me {
                margin-left: 10px;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="" method="post">
                <h3 class="title">Đăng nhập hệ thống</h3>
                <label>User Name:</label>
                <p class="input"><i class="far fa-user"></i>
                    <input class="data" type="text" name="username" value=""></p>
                <label>Password:</label>
                <p class="input"><i class="fas fa-lock"></i>
                    <input class="data" type="password" name="password" value=""></p>
                <p class="remember">
                    <input type="checkbox" name="remember" value=""><label class="me">Remember_Me</label>
                </p>
                <p class="submit"><input type="submit" name="submit" value="Login"></p>
            </form>
                <p style="color: red; margin: 10px 0 40px 15%; box-sizing: padding-box"><?php
                        if(!empty($error)){
                            echo $error;
                        }else{
                            echo "vui lòng đăng nhập hệ thống !";
                        }
                    ?></p>
                <p style="color: green; margin: 10px 0 40px 15%; box-sizing: padding-box"><?php if(isset($_SESSION['success'])) {
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }?></p>
<!--                <p style="color: red; margin: 10px 0 40px 15%; box-sizing: padding-box">--><?php //echo $error?><!--</p>-->
        </div>
    </body>
</html>