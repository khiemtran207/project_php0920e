<?php
    require_once "Model/Model.php";
    class CategoryModel extends Model{
        public function select_all(){
            $obj_select_all = $this->connection->prepare("SELECT * FROM categories ORDER BY created_at DESC");
            $obj_select_all->execute();
            return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>