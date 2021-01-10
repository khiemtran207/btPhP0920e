<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/9/2021
 * Time: 1:50 PM
 */
// cập nhập thành giờ vn
date_default_timezone_set('Asia/Ho_Chi_Minh');
//echo date("d/m/Y");
session_start();
// đường dẫn
//index.php?controller=employess&action=create
// phân tích url để lấy ra controller
$controller = (isset($_GET['controller']))?$_GET['controller']:'Home';
// viết hoa chữ cái đầu của controller
$controller = ucfirst($controller);
// nối chuỗi để thành tên file EmployesController.php
$controller.= "Controller";
//echo $controller;
$controller_path = "controllers/$controller.php";
if(file_exists($controller_path)){
    require_once $controller_path;
}else{
    die('Không tồn tại trang');
}
// lấy action
$action = (isset($_GET['action']))?$_GET['action']:"index";
$obj = new EmployessController()        ;
if(!method_exists($obj,$action)){
    die("không tồn tại phương thức $action");
}
$obj->$action();
?>