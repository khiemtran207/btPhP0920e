<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 1/4/2021
 * Time: 7:51 PM
 */
// Model cha, chứa thuộc tính kết nối dùng chung cho các model con
require_once 'configs/Database.php';
class Model {
    // Đối tượng kết nối csdl
    public $connection;
    // khởi tạo thuộc tính connection = hàm
    public function __construct()
    {
        $this->connection = $this->getConnection();
    }
    // phương thức kết nối CSDL theo PDO
    public function getConnection(){
        // sử dụng khối try catch khi dùng PDO
        try{
            $connection = new PDO(Database::DB_DSN,Database::DB_USERNAME,Database::DB_PASSWORD);
            return $connection;
        }catch (PDOException $e){
            die("lỗi kết nối ".$e->getMessage());
        }
    }
}
?>