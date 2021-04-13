<?php
    require_once "Config/database.php";
    class Model extends database {
        public $connection;
        public function __construct(){
            $this->connection = $this->getConnect();
        }
        public function getConnect(){
            try {
                $connection = new PDO(database::DB_DSN,database::DB_USERNAME,database::DB_PASSWORD);
            }catch (PDOException $e){
                die("Kết nối thất bại ".$e->getMessage());
            }
            return $connection;
        }
        public function closeConnection() {
            $this->connection = null;
        }
    }
?>
