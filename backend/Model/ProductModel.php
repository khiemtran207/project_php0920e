<?php
    require_once "Model/Model.php";
    require_once "Model/CategoryModel.php";
    class ProductModel extends Model{
        public $id;
        public $category_id;
        public $title;
        public $avatar;
        public $price;
        public $amount;
        public $summary;
        public $content;
        public $status;
        public $seo_title;
        public $seo_description;
        public $seo_keywords;
        public $created_at;
        public $updated_at;
        public $str_search;
        public function __construct()
        {
            parent::__construct();
            if (isset($_GET['product_name']) && !empty($_GET['product_name'])) {
                $this->str_search .= " AND products.title LIKE '%{$_GET['product_name']}%'";
            }
            if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
                $this->str_search .= " AND products.category_id = {$_GET['category_id']}";
            }
        }

        public function insert(){
            $obj_insert = $this->connection->prepare("INSERT INTO products(category_id,title,avatar,price,amount,summary,content,status,seo_title,seo_description,seo_keywords) VALUES (:category_id,:title,:avatar,:price,:amount,:summary,:content,:status,:seo_title,:seo_description,:seo_keywords)");
            return $obj_insert->execute([
                ':category_id'=>$this->category_id,
                ':title'=>$this->title,
                ':avatar'=>$this->avatar,
                ':price'=>$this->price,
                ':amount'=>$this->amount,
                ':summary'=>$this->summary,
                ':content'=>$this->content,
                ':status'=>$this->status,
                ':seo_title'=>$this->seo_title,
                ':seo_description'=>$this->seo_description,
                ':seo_keywords'=>$this->seo_keywords,
            ]);

        }
        public function selectCount(){
            $obj_select_count = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
            $obj_select_count->execute();
            return $obj_select_count->fetchColumn();
        }
        public function selectAllPagination($param = []){
            $limit = $param['limit'];
            $start = ($param['page']-1)*$limit;
            $obj_select_all = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products INNER JOIN  categories ON categories.id = products.category_id WHERE TRUE $this->str_search ORDER BY products.created_at DESC LIMIT $start,$limit");
            $obj_select_all->execute();
            return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        }
        public function delete($id){
            $obj_delete = $this->connection->prepare("DELETE FROM products WHERE TRUE AND id = $id");
            return $obj_delete->execute();
        }
        public function select_one($id){
            $select_one = $this->connection->prepare("SELECT * FROM products WHERE id = $id");
            $select_one->execute();
            return $select_one->fetch(PDO::FETCH_ASSOC);
        }
        public function update($id){
            $obj_update_product = $this->connection->prepare("UPDATE products SET category_id=:category_id,title=:title,avatar=:avatar,price=:price,amount=:amount,summary=:summary,content=:content,status=:status,seo_title=:seo_title,seo_description=:seo_description,seo_keywords=:seo_keywords,updated_at=:updated_at WHERE id = $id");
            return $obj_update_product->execute([
                ':category_id'=>$this->category_id,
                ':title'=>$this->title,
                ':avatar'=>$this->avatar,
                ':price'=>$this->price,
                ':amount'=>$this->amount,
                ':summary'=>$this->summary,
                ':content'=>$this->content,
                ':status'=>$this->status,
                ':seo_title'=>$this->seo_title,
                ':seo_description'=>$this->seo_description,
                ':seo_keywords'=>$this->seo_keywords,
                ':updated_at'=>$this->updated_at
            ]);
        }
    }
?>