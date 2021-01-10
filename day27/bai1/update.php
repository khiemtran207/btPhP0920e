<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 11:53 AM
 */
session_start();
require_once "Database.php";
// lấy id
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $_SESSION['error'] = "id không tồn tại";
    return;
}
$id = $_GET['id'];
// select về
// viết câu truy vấn
$sql_select = "SELECT * FROM employees where id = $id";
// chuẩn bị đối tượng truy vấn
$obj_select = $connect->prepare($sql_select);
// tạo mảng(bỏ)
$obj_select->execute();
$obj_employee = $obj_select->fetch(PDO::FETCH_ASSOC);
if(empty($obj_employee)){
    $_SESSION['error'] = "bản ghi với $id không tồn tại";
}
//echo date('d/m/Y',strtotime($obj_employee['birthday']));
$error = '';
// bắt đầu update
if(isset($_POST['submit'])){
    $obj_name = $_POST['name'];
    $obj_description = $_POST['description'];
    $obj_salary = $_POST['salary'];
    $obj_birthday = $_POST['birthday'];
    if(isset($_POST['gender'])){
        $obj_gender = $_POST['gender'];
    }
    if (empty($obj_name)){
        $error = "không được để trống name";
    }else if(empty($obj_description)){
        $error = "không được để trống description";
    }else if(empty($obj_salary)){
        $error = "không được để trống salary";
    }else if(empty($obj_birthday)){
        $error = "không được để trống birthday";
    }
    if(empty($error)){
        if(empty($obj_gender)){
            $error = "không được để trống gender";
        }
        // lưu giá trị vào csdl
        // viết câu truy vấn update
        $sql_insert = "UPDATE employees SET name=:name,description=:description,gender='$obj_gender',salary='$obj_salary',birthday='$obj_birthday'";
        // chuẩn bị đối tượng truy vấn
        $obj_update = $connect->prepare($sql_insert);
        //tạo mảng
        $is_updates = [
            ':name'=>$obj_name,
            ':description'=>$obj_description
        ];
        // thực thi đối tượng truy vấn
        $is_update = $obj_update->execute($is_updates);
        if($is_update){
            $_SESSION['success']="Cập nhật nhân viên thành công";
            header('location: index.php');
            exit();
        }else{
            $error = "Cập nhật nhân viên thất bại";
        }
    }
}
?>
<html>
<head>
    <title>update nhân sự</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../project/do_an_PHP0920e/frontend/css-fotnawesome/all.min.css">
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .main_container {
            max-width: 50%;
            margin: 0 auto;
            margin-top: 0px;
        }
        .title {
            text-align: center;
        }
        i{
            margin-right: 5px;
            font-size: 20px;
        }
        .start:after {
            content:" * ";color:red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="main_container">
        <div class="title"><h2>Create Record</h2></div>
        <hr>
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <i class="fas fa-user"></i><label class="start">Name:</label>
                <input type="text" name="name" class="form-group form-control" value="<?php echo $obj_employee['name'] ?>">
                <i class="fas fa-audio-description"></i><label class="start">Description:</label>
                <textarea name="description" id="" cols="5" rows="3" class="form-control form-group"><?php echo $obj_employee['description'] ?></textarea>
                <i class="fas fa-donate"></i><label class="start">Salary:</label>
                <input type="number" name="salary" class="form-group form-control"  value="<?php echo $obj_employee['salary'] ?>">
                <i class="fas fa-venus-mars"></i><label class="start">Gender:</label><br>
                <?php
                $checkbox_male = "";
                $checkbox_female = "";
                if($obj_employee['gender'] == 0){
                    $checkbox_male = "checked";
                }else{
                    $checkbox_female = "checked";
                }
                ?>
                <input type="radio" name="gender" <?php echo $checkbox_male ?>  value="0"> Male
                <input type="radio" name="gender" <?php echo $checkbox_female ?>  value="1" class="form-group"> Female<br>
                <i class="fas fa-birthday-cake"></i><label class="start">Birthday</label>
                <input type="date" class="form-control form-group" name="birthday" value="<?php echo date('d/m/Y',strtotime($obj_employee['birthday']))?>"><br>
                <input type="submit" name="submit" value="save" class="btn btn-primary">
                <button class="btn btn-secondary" id="cancel" name="cancel"><a href=index.php style="color: #eeeeee; text-decoration: none">Cancel</a></button>
            </form>
        </div>
        <p style="color: red; text-transform: capitalize"><?php echo $error; ?></p>
    </div>
</div>
</body>
</html>
