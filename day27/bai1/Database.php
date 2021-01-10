<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 1/5/2021
 * Time: 7:49 AM
 */
class Database{
    private $DB_HOST = 'localhost';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '';
    private $DB_NAME = 'php0920e_oop';

    public $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }
    private function connect(){
        try{
            $connection = new  PDO('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME.';port=3306;charset=utf8',$this->DB_USERNAME,$this->DB_PASSWORD);
        }catch (PDOException $e){
            die("lỗi ".$e->getMessage());
        }
        return $connection;
    }
};
$bai1 = new Database();
$connect = $bai1->connection;
?>