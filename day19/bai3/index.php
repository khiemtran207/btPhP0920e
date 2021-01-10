<?php
    $error = '';
    $result = '';
    if(isset($_POST['submit'])){
        $obj_userName = $_POST['userName'];
        $obj_email = $_POST['email'];
        $obj_password = $_POST['password'];
        $obj_confirm = $_POST['comfirm'];
        $obj_avatar = $_FILES['avatar'];
        if(empty($obj_userName)) {
            $error = "không được để trống user name";
        }else if(empty($obj_email)){
            $error = "không được để trống email";
        }else if(empty($obj_password)){
            $error = "không được để trống password";
        }else if(empty($obj_confirm)){
            $error = "không được để trống confirm password";
        }else if(strlen($obj_userName) < 3){
            $error = "user nam phải nhiều hơn 3 kí tự";
        }else if(!filter_var($obj_email, FILTER_VALIDATE_EMAIL)){
            $error = "email phải có định dạng email ";
        }else if($obj_password !== $obj_confirm){
            $error = "Trường confirm password phải trùng với password";
        }else if($obj_avatar['error'] == 0){
            $FileName = $obj_avatar['name'];
            $endFileName = pathinfo($FileName, PATHINFO_EXTENSION);
            $endFileName = strtolower($endFileName);
            $fileNameTrue = ['jpg','jpeg','png','gif'];
            $sizeFile = $obj_avatar['size'];
            $sizeFileMb = round($sizeFile/(1024 * 1024),2);
            if(!in_array($endFileName, $fileNameTrue)){
                $error = "file tải lên phải là ảnh";
            }else if($sizeFileMb > 1){
                $error = "file tải lên phải có dung lượng nhở hơn 1 mb";
            }
        }
    }
    if(empty($error)){
        $result = "Đăng nhập thành công";
        $result .= "<br> Tên đăng nhập của bạn là: $obj_userName";
        // bê ảnh tải lên vào file
        $fileName = time().'-'.$obj_avatar['name'];
        $containerFile = 'containerFile';
        if(!file_exists($containerFile)){
            mkdir($containerFile);
        }
        move_uploaded_file($obj_avatar['tmp_name'], $containerFile.'/'.$fileName);
        $result .= "<br>Ảnh tải lên là: <img src='$containerFile/$fileName' width='100px' height='100px'>";
    }
?>
<html>
    <head>
    <title>bài 3 ngày 19</title>
        <style>
            body {
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 50%;
                margin: 0 auto;
                background: rgb(44,25,162);
                background: linear-gradient(90deg, rgba(44,25,162,1) 0%, rgba(17,17,88,1) 100%);
                font-family: Arial, san-serif;
            }
            h3 {
                color: #fff;
                padding: 30px 0 30px 80px;
                font-size: 30px;
                font-weight: normal;
                margin: 0;
            }
            form {
                margin: 0 80px 0 80px;
            }
            input[type = 'text'] ,input[type = 'password']{
                width: 100%;
                height: 40px;
                margin: 0 0 20px 0;
                background: #0A1823;
                border: none;
                padding-left: 10px;
                font-size: 15px;
                color: white;
            }
            label {
                color: white;
                font-size: 15px;
                margin-right: 10px;
            }
            input[type="file"] {
                font-size: 15px;
                color: white;
                margin-bottom: 20px;
            }
            input[type="submit"] {
                width: 100%;
                height: 40px;
                background: #0481BB;
                margin-bottom: 20px;
                border: none;
                color: #fff;
                font-size: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Creat an accont</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="User Name" name="userName" value=""><br>
                <input type="text" placeholder="Email" name="email" value=""><br>
                <input type="password" placeholder="password" name="password" value=""><br>
                <input type="password" placeholder="comfirm password" name="comfirm" value=""><br>
                <label>Select yout avatar:</label><input type="file" name="avatar"><br>
                <input type="submit" value="Register" name="submit">
            </form>
        </div>
        <p style="color: red; margin-left: 25%"><?php echo $error;?></p>
        <p style="color: green"><?php echo $result;?></p>
    </body>
</html>