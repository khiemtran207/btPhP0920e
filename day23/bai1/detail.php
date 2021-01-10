<?php
    session_start();
    include_once 'database.php';

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        $_SESSION['error'] = "id không hợp lệ";
        header('location: index.php');
        exit();
    }
    $id = $_GET['id'];
    // lấy dữ liệu từ csdl của id ra
    $sql_select = "SELECT * FROM staff WHERE id = $id";
    $is_select = mysqli_query($connection, $sql_select);
    $is_select = mysqli_fetch_assoc($is_select);
//    echo "<pre>";
//    print_r($is_select);
//    echo "</pre>";
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
                <p><?php echo $is_select['id']?></p>
                <h6>Name:</h6>
                <p><?php echo $is_select['name']?></p>
                <h6>Description:</h6>
                <p><?php echo $is_select['description']?></p>
                <h6>Salary:</h6>
                <p><?php echo $is_select['salary']?></p>
                <h6>Gender:</h6>
                <p><?php echo $is_select['gender']?></p>
                <h6>Birthday:</h6>
                <p><?php
                    if($is_select['birthday'] == "0000-00-00 00:00:00"){
                    echo "";
                    }else{
                    echo date('d/m/Y', strtotime($is_select['birthday'])) ;
                    }
                    ?>
                </p>
                <h6>Created_at:</h6>
                <p><?php echo date('d/m/Y H:i:s', strtotime($is_select['created_at']))?></p>
            </div>
            <div class="goback">

                    <a href="index.php" class="btn btn-primary">Back</a>

            </div>
        </div>
    </div>
</body>
</html>
