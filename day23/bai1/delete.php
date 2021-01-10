<?php
    // kiểm tra xem có id đó không
session_start();
include_once 'database.php';
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $_SESSION['error'] = "id không hợp lệ!";
    return;
};
$id = $_GET['id'];
// thực hiện xóa
$sql_delete = "DELETE FROM staff  WHERE id = $id";
$is_delete = mysqli_query($connection, $sql_delete);
//$sql_select = "SELECT * FROM qlns WHERE id = $id";
//$is_select = mysqli_query($connection, $sql_select);
//$is_select = mysqli_fetch_assoc($is_select);
if($is_delete){
    $_SESSION['success'] = "xóa nhân viên thành công!";
    unlink(contai);
}else{
    $_SESSION['error'] = "xóa nhân viên thất bại!";
}
header('location: index.php');
exit();
?>