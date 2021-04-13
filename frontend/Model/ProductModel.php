<?php
    require_once "Model/Model.php";
    class ProductModel extends Model{
        public function getCountProduct(){
            $obj_select_count = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE");
            $obj_select_count->execute();
            return $obj_select_count->fetchColumn();
        }
        public function getProductInHomePage($param){
            $str_filter = '';
            if (isset($param['category'])) {
                $str_category = $param['category'];
                $str_filter .= " AND categories.id IN $str_category";
            }
            if (isset($param['price'])) {
                $str_price = $param['price'];
                $str_filter .= " AND $str_price";
            }
            $obj_select = $this->connection->prepare("SELECT products.* FROM products INNER JOIN categories ON products.category_id = categories.id WHERE 1 $str_filter ORDER BY products.created_at DESC");
            $obj_select->execute();
            return $obj_select->fetchAll(PDO::FETCH_ASSOC);
        }
        public function select_one($id){
            $obj_select_one = $this->connection->prepare("SELECT * FROM products WHERE id=$id");
            $obj_select_one->execute();
            return $obj_select_one->fetch(PDO::FETCH_ASSOC);
        }
    }
?>