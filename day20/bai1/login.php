

<?php
    session_start();
        if(isset($_SESSION['username'])){
            $_SESSION['success'] = "bạn đã đăng nhập rồi";
            header('location: login_success.php');
            exit();
        }
//        setcookie('username', 'trankhiem207it@gamil.com', )
    $error = '';
    if(isset($_POST['submit'])){
        $obj_username = $_POST['username'];
        $obj_password = $_POST['password'];
        if(empty($obj_username)){
            $error = "không được để trống user name";
        }else if(empty($obj_password)){
            $error = "không được để trống password";
        }else if(!filter_var($obj_username, FILTER_VALIDATE_EMAIL)){
            $error = "username phải có định dạng email";
        }else if(strlen($obj_username) < 3 && strlen($obj_password) < 3){
            $error = "user name và password không được ít hơn 3 kí tự";
        }else if($obj_username != "trankhiem@gmail.com" || (string) $obj_password != "12345"){
            $error = "sai tài khoản hoặc mặt khẩu đăng nhập";
        }
        if(empty($error)){
            $_SESSION['success'] = "đăng nhập thành công";
            $_SESSION['username'] = $obj_username;
            header('location: login_success.php');
            exit();
        }
    }
?>
<html>
<head>
    <title>bài 1 ngày 20</title>
    <link rel="stylesheet" type="text/css" href="../css-fotnawesome/all.min.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .container{
            margin: 0 auto;
            max-width: 70%;
            width: 50%;
            background-image: url("../image/image-human-brain_99433-298.jpg");
            background-size: cover;
            background-position: center;
            font-family: Arial, san-serif;
        }
        .title {
            text-align: center;
            color: #fff;
            height: 65px;
            line-height: 65px;
            font-size: 25px;
            padding: 20px 0;
        }
        input[type="text"], input[type='password'] {
            width: 95%;
            height: 30px;
            border: none;
            background-color: rgba(0,0,0,0);
            margin-left: 10px;
            color: #fff;
            autocomplete : false;
        }
        input[type="submit"] {
            margin: 20px 0 40px 15%;
            border: none;
            background: #65c370;
            width: 75px;
            height: 30px;
            color: #fff;
            border-radius: 5px;
            text-transform: uppercase;
            font-size: 11px;
        }
        p.input {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 100px 30px;
            border-bottom: 1px solid #fff;
        }
        label {
            margin-left: 100px;
            color: gray;
            /* margin-top: 73px; */
        }
        i {
            color: #fff;
            font-size: 22px;
        }
        input[type="checkbox"] {
            margin: 10px 0 30px 100px;
            /* border: none; */
            /* font-size: 34px; */
        }
        label.remember {
            margin-left: 10px;
            font-size: 19px;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <div class="title">Đăng nhập hệ thống</div>
            <label>User Name:</label><br>
            <p class="input"><i class="fas fa-user"></i><input type="text" name="username" value="<?php echo (isset($_POST['username']))?$_POST['username']:'' ?>"></p><br>
            <label>Password</label><br>
            <p class="input"><i class="fas fa-lock"></i><input type="password" name="password"  value="<?php echo (isset($_POST['password']))?$_POST['password']:'' ?>"></p><br>
            <?php
            $checkbox = '';
            if (isset($_POST['remember'])){
                $checkbox = 'checked';
            }
            ?>
            <input type="checkbox" name="remember" value="1" <?php echo $checkbox ;?>><label class="remember">Remember Me</label><br>
            <input type="submit" name="submit" value="Login">
    </form>
</div>
<h4 style="color: red"><?php echo $error ; ?></h4>
<h4 style="color: red"><?php if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    } ; ?></h4>
<h4 style="color: green"><?php if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    } ; ?></h4>
</body>
</html>