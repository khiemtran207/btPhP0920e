<?php
    session_start();
    require_once 'database.php';
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        $_SESSION['error'] = "id không hợp lệ";
        return;
    };
    $id = $_GET['id'];
    // thực hiện xóa dữ liệu
    // viết câu truy vấn:
    $sql_delete = "DELETE FROM products WHERE id = $id";
    $is_delete = mysqli_query($connection, $sql_delete);
    if($is_delete){
        $_SESSION['success'] = "xóa sản phẩm thành công";
    }else{
        $_SESSION['error'] = "xóa dữ liệu thất bại";
    }
header('location: index.php');
exit();
?>