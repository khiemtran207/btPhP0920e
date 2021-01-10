<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/23/2020
 * Time: 11:29 PM
 */
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";

    $error = '';
    $result = '';

    if(isset($_POST['upload'])){
        $obj_fullname = $_POST['fullname'];
        $obj_file = $_FILES['avatar'];
        if(empty($obj_fullname)){
            $error = "không được để trống name";
        }else if(strlen($obj_fullname) < 3){
            $error = "name nhập vào phải lớn hơn 3 kí tự";
        }else if(!filter_var($obj_fullname, FILTER_VALIDATE_EMAIL)){
            $error = "name nhập vào phải có định dạng email";
        }else if($obj_file['error'] == 0){
            // file phải là ảnh
            $_nameFile = pathinfo($obj_file['name'], PATHINFO_EXTENSION);
            $_nameFile = strtolower($_nameFile);
            $_endnameFIle = ['jpg','jpeg','png','gif'];
            $sizeFile = $obj_file['size'];
            $sizeFileMb = round($sizeFile / (1024 * 1024),2);
            if(!in_array($_nameFile, $_endnameFIle)){
               $error = "file tải lên phải là ảnh";
            }else if($sizeFileMb > 1.34){
                $error = "file ảnh tải lên phải có dung lượng nhỏ hơn 2Mb";
            }

        }

        if(empty($error)){
            $result = "tên đăng nhập của bạn là: $obj_fullname";
            if($obj_file['error'] == 0){
                // tạo thư mục chứa ảnh
                $containerFile = 'containerFile';
                if(!file_exists($containerFile)){
                    mkdir($containerFile);
                }
                $fileName = time().'-'.$obj_file['name'];
                $is_upload = move_uploaded_file($obj_file['tmp_name'],$containerFile .'/'. $fileName);
                $result .= " <br>ảnh đại diện là: <img src='$containerFile/$fileName' height='100px' width='100px'>";
                $result .= "<br>đường dẫn ảnh là: $containerFile/$fileName";
                $result .= "<br> dung lượng của ảnh là: $sizeFileMb Mb";
            }
        }

    }

?>
<form action="" method="post" enctype="multipart/form-data">
    userName:
    <input type="text" name="fullname" value="<?php echo ($_POST['fullname'])?$_POST['fullname']:'';?>"><br>
    Upload Avatar:
    <input type="file" name="avatar"><br>
    <input type="submit" name="upload" value="show thông tin">
</form>
<h3 style="color: red"><?php echo $error ;?></h3>
<h3 style="color: green"><?php echo $result ;?></h3>
