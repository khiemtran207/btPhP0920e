<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 8:37 AM
 */
session_start();
require_once 'Database.php';
// viết câu truy vấn
$sql_select = "SELECT * FROM employees ORDER BY created_at DESC";
// chuẩn bị đối tượng truy vấn
$obj_select = $connect->prepare($sql_select);
//tạo mảng(k cần)
// thực thi truy vấn
$obj_select->execute();
$is_select = $obj_select->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <title>Hiển thị nhân sự</title>
    <link rel="stylesheet" href="../../ngay27/bai1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../ngay27/bai1/css-fotnawesome/all.min.css">
    <style>
        .main_container {
            max-width: 90%;
            margin: 0 auto;
            padding: 20px 0;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="main_container">
        <div class="title">
            <h2>Employees List</h2></div>
        <hr>
        <div class="showstaff">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($is_select as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ;?></td>
                        <td><?php echo $item['name'] ;?></td>
                        <td><?php echo $item['description'] ;?></td>
                        <td><?php echo number_format($item['salary'], '0','.','.') ;?> vnđ</vnđ></td>
                        <td><?php
                            if($item['gender'] == 0){
                                echo 'male';
                            }else {
                                echo 'female';
                            }
                            ;?></td>
                        <!--                    <td>--><?php //echo $item['birthday'] ;?><!--</td>-->
                        <td><?php
                                echo date('d/m/Y', strtotime($item['birthday'])) ;
                            ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($item['created_at'])) ;?></td>
                        <td>
                            <a href="detail.php?id=<?php echo $item['id']?>"><i class="fas fa-eye"></i></a>
                            <a href="update.php?id=<?php echo $item['id']?>"><i class="fas fa-pen"></i></a>
                            <a href="delete.php?id=<?php echo $item['id']?>" onclick="return confirm("xóa nhân viên này")"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="create.php" class="badge badge-success">Thêm mới nhân viên</a><br><br>
            <p style="color: green">
                <?php
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                }
                ?>
            </p>
            <p style="color: red">
                <?php
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </p>
        </div>
    </div>
</div>
</body>
</html>
