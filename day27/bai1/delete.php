<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 9:41 AM
 */
session_start();
require_once 'Database.php';
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $_SESSION['error'] = "id không hợp lệ";
    return;
}
$id = $_GET['id'];
//viết câu truy vấn
$sql_delete = "DELETE FROM employees WHERE id = $id";
// cbi đối tượng truy vấn
$obj_delete = $connect->prepare($sql_delete);
//tạo mảng (bỏ) vì k có papramp trong câu truy vấn
// thực hiện truy vấn
$is_delete = $obj_delete->execute();
if($is_delete){
    $_SESSION['success'] = "xóa nhân viên thành công";
}
header('location: index.php');
exit();
?>