<?php
    session_start();
    require_once 'database.php';
    $error = '';
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        $_SESSION['error'] = "id không hợp lệ";
        header('location: index.php');
        exit();
    }
    $id = $_GET['id'];
    // thực hiện lấy dữ liệu ra
    $sql_select = "SELECT * FROM staff WHERE id = $id";
    $is_select = mysqli_query($connection, $sql_select);
    $is_select = mysqli_fetch_assoc($is_select);
    if(empty($is_select)){
        echo "bản ghi với id = $id không tồn tại";
        return;
    };
    $checked_male = "";
    $checked_female = "";
    if($is_select['gender'] == "male"){
        $checked_male = "checked";
    }else if($is_select['gender'] == "female"){
        $checked_female = "checked";
    }
if(isset($_POST['update'])){
    $obj_name = $_POST['name'];
    $obj_description = $_POST['description'];
    $obj_salary = $_POST['salary'];
    $obj_birthday = $_POST['birthday'];
    // validate
    if(empty($obj_name)){
        $error = "Name không được để trống!";
    }
    if(empty($error)){
        if(isset($_POST['gender'])){
            if($_POST['gender'] == 0){
                $obj_gender = "male";
            }else if($_POST['gender'] == 1){
                $obj_gender = "female";
            }
        }
        // lưu vào csdl
        // viết câu truy vấn
        $sql_update = "UPDATE staff SET name = '$obj_name', description = '$obj_description', salary = '$obj_salary'
, gender = '$obj_gender', birthday = '$obj_birthday' WHERE id = $id";
        $is_update = mysqli_query($connection, $sql_update);
        if($is_update){
            $_SESSION['success'] = "cập nhật nhân viên thành công!";
            header('location: index.php');
            exit();
        }else{
            $error = "cập nhật nhân viên thất bại!";
        }
    }

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
                <input type="text" name="name" class="form-group form-control" value="<?php echo $is_select['name'] ;?>">
                <i class="fas fa-audio-description"></i><label class="start">Description:</label>
                <textarea name="description" id="" cols="5" rows="3" class="form-control form-group"><?php echo $is_select['description'] ;?></textarea>
                <i class="fas fa-donate"></i><label class="start">Salary:</label>
                <input type="number" name="salary" class="form-group form-control" value="<?php echo $is_select['salary'] ;?>">
                <i class="fas fa-venus-mars"></i><label class="start">Gender:</label><br>
                <input type="radio" name="gender"  value="0" <?php echo $checked_male;?> > Male
                <input type="radio" name="gender"  value="1" class="form-group" <?php echo $checked_female;?>> Female<br>
                <i class="fas fa-birthday-cake"></i><label class="start">Birthday</label>
                <input type="date" class="form-control form-group" name="birthday"
                       value="<?php echo date('d/m/Y', strtotime($is_select['birthday'])) ;?>"><br>
                <input type="submit" name="update" value="update" class="btn btn-primary">
                <button class="btn btn-secondary" id="cancel">Cancel</button>
            </form>
            <p style="color: red"><?php echo $error;?></p>
        </div>
    </div>
</div>
</body>
</html>
