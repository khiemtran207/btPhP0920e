<?php
    $error = '';
    $result = '';

    if(isset($_POST['upload'])){
        $objUserName = $_POST['fullname'];
        $objAvatar = $_FILES['avatar'];
        if(empty($objUserName)){
            $error = "không được để trống user name";
        }else if(strlen($objUserName) < 3){
            $error = "user name phải nhiều hơn 3 kí tự";
        }else if(!filter_var($objUserName, FILTER_VALIDATE_EMAIL)){
            $error = "user name phải có định dạng email";
        }else if($objAvatar['error'] == 0){
            $endFIle = pathinfo($objAvatar['name'], PATHINFO_EXTENSION);
            $endFIle = strtolower($endFIle);
            $endNameFile = ['jpg','jpeg','png','gif'];
            $sizeName = $objAvatar['size'];
            $sizeNameMb = round($sizeName/(1024*1024),2);
            if(!in_array($endFIle, $endNameFile)){
                $error = "file tải lên phải là ảnh";
            }else if($sizeNameMb > 1){
                $error = "file tải lên phải có dung lượng nhở hơn 1 Mb";
            }
        }
        if(empty($error)){
            $result = "User Name là: $objUserName";
            $containerFile = 'containerFile';
            $nameFile = time().'-'.$objAvatar['name'];
            if(!file_exists($containerFile)){
                mkdir($containerFile);
            }
            // bê ảnh vào containerFile
            move_uploaded_file($objAvatar['tmp_name'], $containerFile.'/'.$nameFile);
            $result .= "<br>Ảnh đại diện là: <img src='$containerFile/$nameFile' height='100px' width='100px'>";
            $result .= "<br>Tên ảnh là: ".$objAvatar['name'];
            $result .="<br>định dạng file ảnh là: ".$endFIle;
            $result .= "<br> đường dẫn file là: $containerFile/$nameFile";
            $result .= "<br> dung lượng file là: $sizeNameMb Mb";
        }

    }
?>
<html>
<head>
    <title>bài 2 day 19</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <h4 class="form-group">Select a file to upload</h4>
    <form action="" method="post" enctype="multipart/form-data">
        <label class="text-muted">User Name</label>
        <input type="text" name="fullname" value="" class="form-group form-control">
        <label class="text-muted">Update Avatar</label>
        <input type="file" name="avatar" class="form-control form-group ">
        <p class="text-muted">Only jpg, jpeg, png, and gif file with maximun size of 1 MB is allowed</p>
        <input type="submit" name="upload" class="btn btn-primary" value="upload">
    </form>
    <p style="color: red"><?php echo $error;?></p>
    <p style="color: green"><?php echo $result;?></p>
</div>
</body>
</html>