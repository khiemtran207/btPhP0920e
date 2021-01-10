<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 12:18 PM
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
?>
<html>
<head>
    <title>cập nhật thông tin nhân sự</title>
    <link rel="stylesheet" href="../../ngay27/bai1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../ngay27/bai1/css-fotnawesome/all.min.css">
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
    </style>
</head>
<body>
<div class="container">
    <div class="main_container">
        <div class="title">
            <h2>View Record</h2><hr>
        </div>
        <div class="content">
            <h6>ID:</h6>
            <p><?php echo $obj_employee['id']?></p>
            <h6>Name:</h6>
            <p><?php echo $obj_employee['name']?></p>
            <h6>Description:</h6>
            <p><?php echo $obj_employee['description']?></p>
            <h6>Salary:</h6>
            <p><?php echo $obj_employee['salary']?></p>
            <h6>Gender:</h6>
            <p><?php
                if($obj_employee['gender'] == 0){
                    echo 'male';
                }else{
                    echo 'female';
                }
                ?>
            </p>
            <h6>Birthday:</h6>
            <p><?php
                if($obj_employee['birthday'] == "0000-00-00 00:00:00"){
                    echo "";
                }else{
                    echo date('d/m/Y', strtotime($obj_employee['birthday'])) ;
                }
                ?>
            </p>
            <h6>Created_at:</h6>
            <p><?php echo date('d/m/Y H:i:s', strtotime($obj_employee['created_at']))?></p>
        </div>
        <div class="goback">

            <a href="index.php" class="btn btn-primary">Back</a>

        </div>
    </div>
</div>
</body>
</html>
