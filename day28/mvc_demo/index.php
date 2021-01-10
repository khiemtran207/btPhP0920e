<?php
    session_start();
    //set múi giờ vn
date_default_timezone_set("Asia/Ho_Chi_Minh");
//index?controller=employess&action=create
// phân tích url để lấy ra controller
$controller = (isset($_GET['controller']))?$_GET['controller']:"Home";
// chuyển controller thành chữ viết hoa
$controller = ucfirst($controller);
// chuyển thành đường dẫn
$controller .= "Controller";
$controller_path = "controllers/$controller.php";
// lấy ra action
$action = (isset($_GET['action']))?$_GET['action']:"index";
//kiêm tra xem đã có file hay chưa
if(!file_exists($controller_path)){
    die("không tồn tại trang yêu cầu");
}
require_once $controller_path;
$obj = new $controller();
// kiểm tra xem trong class có phương thức action không
if(!method_exists($obj,$action)){
    die("không tồn tại phương thức trong class");
}
$obj->$action();
?>