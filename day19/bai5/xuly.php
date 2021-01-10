<?php
$error = '';
$result = '';

if(isset($_POST['login'])){
    $obj_userName = $_POST['username'];
    $obj_password = $_POST['password'];
    if(empty($obj_userName)){
        $error = "không được để trống user name!";
    }else if(empty($obj_password)){
        $error = "không được để trống password!";
    }else if(!filter_var($obj_userName, FILTER_VALIDATE_EMAIL)){
        $error = "user name nhập vào cần phải có định dạng email!";
    }
    if(empty($error)){
        $result = "Đăng nhập thành công";
        $result .= "<br> Tên đăng nhập là: $obj_userName";
        $result .= "<br> Mật khẩu đăng nhập là: $obj_password";
    }
}
?>