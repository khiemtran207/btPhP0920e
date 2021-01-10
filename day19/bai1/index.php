<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/24/2020
 * Time: 9:01 AM
// */
//    echo "<pre>";
//        print_r($_POST);
//    echo "</pre>";
//    echo "<pre>";
//        print_r($_FILES);
//    echo "</pre>";
    $error = '';
    $result = '';
    if(isset($_POST['upload'])){
        $avatar = $_FILES['avatar'];
        if($avatar['error'] == 0){
            $_endNameFile = pathinfo($avatar['name'], PATHINFO_EXTENSION);
            $_endNameFile = strtolower($_endNameFile);
            $_nameFile = ['jpg','jpeg','png','gif'];
            $sizeFile = $avatar['size'];
            $sizeFileMb = round($sizeFile / (1024 * 1024),2);
            if(!in_array($_endNameFile, $_nameFile)){
                $error = "file tải lên phải là ảnh";
            }else if($sizeFileMb > 1){
                $error = "ảnh tải lên k quá 1Mb";
            }
        }
        if(empty($error)){
            // tạo thư mục chứa ảnh
            $containerFile = 'containerfile';
            if(!file_exists($containerFile)){
                mkdir($containerFile);
            }
            // tạo tên co file
            $nameAvatar = time().'-'.$avatar['name'];
            // lưu ảnh vào foder
            move_uploaded_file($avatar['tmp_name'], $containerFile.'/'.$nameAvatar);
            $result = "ảnh đại hiện: <img src='$containerFile/$nameAvatar' height='100px' width='100px'>";
            $result .="<br> Tên ảnh: ".$avatar['name'];
            $result .= "<br>định dạng file là: $_endNameFile";
        }
    }
?>
<html>
    <head>
        <title>bài 1 day 19</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <meta charset="utf-8">
    </head>
    <body>
    <div class="container">
        <h4 class="form-group">Select a file to upload</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" class="form-control form-group ">
            <p class="text-muted">Only jpg, jpeg, png, and gif file with maximun size of 1 MB is allowed</p>
            <input type="submit" name="upload" class="btn btn-primary" value="upload">
        </form>
        <p style="color: red"><?php echo $error;?></p>
        <p style="color: green"><?php echo $result;?></p>
    </div>
    </body>
</html>
