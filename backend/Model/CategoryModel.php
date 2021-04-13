<?php
    require_once "Model/Model.php";
    class CategoryModel extends Model{
        public $name;
        public $avatar;
        public $type_category;
        public $description;
        public $status;
        public $create_at;
        public $update_at;
        public $str_search;
        public function __construct()
        {
            parent::__construct();
            if(isset($_GET['category_name'])&& !empty($_GET['category_name'])){
                $category_name = addslashes($_GET['category_name']);
                    $this->str_search .= "AND categories.name LIKE '%$category_name%'";
            }
       }

        public function create(){
            $obj_create_category = $this->connection->prepare("INSERT INTO categories(name,avatar,type,description,status) VALUE (:name,:avatar,:type,:description,:status)");
            return $obj_create_category->execute([
                ':name'=>$this->name,
                ':avatar' => $this->avatar,
                ':type' => $this->type_category,
                ':description'=>$this->description,
                ':status'=>$this->status
            ]);
        }
        public function getCountCategory(){
            $obj_select_count =$this->connection->prepare("SELECT COUNT(id) FROM categories WHERE TRUE $this->str_search ");
            $obj_select_count->execute();
            return $obj_select_count->fetchColumn();
        }
        public function getCategoryPagination($param = []){
            $limit = $param['limit'];
            $page = $param['page'];
            $start = ($page-1)*$limit;
                $obj_select_pagination = $this->connection->prepare("SELECT * FROM categories WHERE TRUE $this->str_search ORDER BY created_at DESC LIMIT $start,$limit");
            $obj_select_pagination->execute();
            return $obj_select_pagination->fetchAll(PDO::FETCH_ASSOC);
        }
        public function delete($id){
            $obj_delete_category = $this->connection->prepare("DELETE FROM categories WHERE id = $id");
            return $obj_delete_category->execute();
        }
        public function select_id($id){
            $obj_select_id = $this->connection->prepare("SELECT * FROM categories WHERE id = $id");
            $obj_select_id->execute();
            return $obj_select_id->fetch(PDO::FETCH_ASSOC);
        }
        public function updateCategory($id){
            $obj_update_category = $this->connection->prepare("UPDATE categories SET name =:name,avatar=:avatar,type =:type,description=:description,status=:status,updated_at=:updated_at WHERE id = $id");
            return $obj_update_category->execute([
                ':name'=>$this->name,
                ':avatar'=>$this->avatar,
                ':type'=>$this->type_category,
                ':description'=>$this->description,
                ':status'=>$this->status,
                ':updated_at'=> date("Y/m/d H:i:s")
            ]);
        }
        public function selectAll($type){
            $obj_select_all = $this->connection->prepare("SELECT * FROM categories WHERE type = $type ORDER BY(created_at) DESC");
            $obj_select_all->execute();
            return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
