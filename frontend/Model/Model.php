<?php
    require_once "Config/Database.php";
    class Model extends Database{
        public function __construct()
        {
            $this->connection = $this->connect();
        }
        public $connection;
        public function connect(){
            try {
                $connect = new PDO(Database::DB_DSN,Database::DB_USERNAME,Database::DB_PASSWORD);
            }catch (PDOException $e){
                die("Kết nối thất bại". $e->getMessage());
            }
            return $connect;
        }
        public function closeConnection() {
            $this->connection = null;
        }
    }
?>