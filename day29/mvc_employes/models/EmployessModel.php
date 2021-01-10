<?php
require_once 'models/Model.php';
class EmployessModel extends Model {
    public $id;
    public $name;
    public $description;
    public $salary;
    public $gender;
    public $birthday;
    public $created_at;
    public function create(){
//        // vieet cau truy vans
//        $sql_insert = "INSERT INTO employees(name,description,gender,salary,birthday) VALUES (:name,:description,'$this->gender','$this->salary','$this->birthday')";
//        $obj_insert = $this->connection->prepare($sql_insert);
//        $inserts = [
//            ':name'=>$this->name,
//            ':description'=>$this->description
//        ];
//        $insert = $obj_insert->execute($inserts);
//        if(!$insert){
//            die('loi cau truy van');
//        }
//        return $insert;
        //viết câu truy vấn
        $sql_insert = "INSERT INTO employees (name,description,gender,salary,birthday) VALUES (:name,:description,'$this->gender','$this->salary','$this->birthday')";
        //chuẩn bị đối tượng truy vấn
        $obj_insert = $this->connection->prepare($sql_insert);
        // tạo mảng
        $inserts = [
            ':name'=>$this->name,
            ':description'=>$this->description
        ];
        $insert = $obj_insert->execute($inserts);
        return $insert;
    }
}
?>