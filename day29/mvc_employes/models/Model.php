<?php
require_once 'config/Database.php';
class Model{
    public $connection;
    public function __construct()
    {
        $this->connection = $this->connect();
    }

    public function connect(){
        try{
            $connect = new PDO(Database::DSN,Database::DB_USERNAME,Database::DB_PASSWORD);
            return $connect;
        } catch (PDOException $e){
            die("lỗi".$e->getMessage());
        }
    }
}
?>