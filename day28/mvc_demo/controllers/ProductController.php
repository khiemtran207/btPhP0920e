<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 12:40 PM
 */
require_once "controllers/Controller.php";
require_once "models/Product.php";
class ProductController extends Controller {
    // xử lý thêm mới sp
    public function create(){
        if(isset($_POST['submit'])){
            $obj_name = $_POST['name'];
            $obj_description = $_POST['description'];
            $obj_salary = $_POST['salary'];
            $obj_birthday = $_POST['birthday'];
            if(isset($_POST['gender'])){
                $obj_gender = $_POST['gender'];
            }
            if (empty($obj_name)){
                $this->error = "không được để trống name";
            }else if(empty($obj_description)){
                $this->error = "không được để trống description";
            }else if(empty($obj_salary)){
                $this->error = "không được để trống salary";
            }else if(empty($obj_birthday)){
                $this->error = "không được để trống birthday";
            }else if(!isset($_POST['gender'])){
                $this->error = "không được để trống gender";
            }
            if(empty($this->error)) {
                $producnt_model = new Product();
                $producnt_model->name = $obj_name;
                $producnt_model->description = $obj_description;
                $producnt_model->gender = $obj_gender;
                $producnt_model->salary = $obj_salary;
                $producnt_model->birthday = $obj_birthday;
                $is_insert = $producnt_model->insert();
                if($is_insert){
                    header('location: index.php?controller=product&action=index');
                    exit();
                }
            }
        }
        // gọi view ra để hiển thị
        $this->content = $this->render("views/product/create.php");
        $this->page_title = "Trang thêm mới nhân viên";
        require_once "views/layout/main.php";
    }
    public function index(){
       // gọi model để lấy tất cả các employees trong csdl
        $employees_model = new Product();
        $employees = $employees_model->getAll();
        $variables =  [
            // key của phần  tử là tên  + 'bin,.../sd tại viewd
            //thông thường tên key sẽ trùng  tên biến cho đỡ phải nhiều biến
            'employees' => $employees
        ];
        $this->content = $this->render("views/product/index.php",$variables);
        // gọi layout để thêm content(nd động) vào lay out
        require_once "views/layout/main.php";
    }
}
?>