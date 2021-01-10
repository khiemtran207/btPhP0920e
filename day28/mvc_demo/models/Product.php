<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 12:40 PM
 */
require_once "models/Model.php";
class Product extends Model {
    public $id;
    public $name;
    public $description;
    public $gender;
    public $salary;
    public $birthday;
    public $created_at;
    public function insert(){
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
    public function getAll(){
        // viết câu truy vấn
        $sql_select = "SELECT * FROM employees ORDER BY created_at DESC";
        // chuẩn bị đối tượng truy vấn
        $obj_select = $this->getConnection()->prepare($sql_select);
        // tạo mảng: bỏ qua vì k có tham số
        //  thực thi truy vấn
        $obj_select->execute();
        $employees = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $employees;
    }
}
?>