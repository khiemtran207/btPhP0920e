<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/9/2021
 * Time: 2:17 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/EmployessModel.php';
class EmployessController extends Controller {
    public function create(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $salary = $_POST['salary'];
            $birth_day = $_POST['birthday'];
            if(empty($name)){
                $this->error = "không được để trống name";
            }else if(empty($description)){
                $this->error = "không được để trống description";
            }else if(empty($salary)){
                $this->error = "không được để trống salary";
            }else if(!isset($_POST['gender'])){
                $this->error = "không được để trống gender";
            }else if(empty($birth_day)){
                $this ->error = "không được để trống birthday";
            }
            if(empty($this->error)){
                // lưu vào csdl
                $gender = $_POST['gender'];
               $employess = new EmployessModel();
               $employess->name = $name;
               $employess->description = $description;
               $employess->salary = $salary;
               $employess->gender = $gender;
               $employess->birthday = $birth_day;
               $employes = $employess->create();


            }
        }
        $this->page_title = "thêm mới nhân viên";
        // lấy dữ liệu từ view ra
        $this->content = $this->render('views/Employess/create.php');
        require_once 'views/layout/main.php';
    }
    public function index(){
        echo "hàm index";
    }
    public function update(){

    }
    public function delete(){

    }
}
?>