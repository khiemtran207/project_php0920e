<?php
require_once "Controller/Controller.php";
require_once "Model/CategoryModel.php";
require_once "Model/ProductModel.php";
require_once "Model/Pagination.php";
    class ProductController extends Controller{
        public function showAll(){
            $obj_product = new ProductModel();
            $count_product = $obj_product -> getCountProduct();
            $param = [
                'controller'=>"product",
                'action' => 'showall',
                'total' => $count_product,
                'limit'=>12,
                'full_mode'=>true,
                'page'=>(isset($_GET['page']) && is_numeric($_GET['page']))?$_GET['page']:1
            ];
            $obj_category = new CategoryModel();
            $category_all = $obj_category->select_all();
            if(isset($_POST['submit'])){
                if(isset($_POST['category'])){
                    $category = implode(',', $_POST['category']);
                    $str_category_id = "($category)";
                    $param['category'] = $str_category_id;
                }
                if(isset($_POST['price'])){
                    $str_price = "";
                    foreach ($_POST['price'] as $price){
                        if($price == 0){
                            $str_price .= " OR products.price < 1000000";
                        }
                        if($price == 1){
                            $str_price .= " OR products.price > 1000000 AND products.price < 2000000";
                        }
                        if($price == 2){
                            $str_price .= " OR products.price > 2000000 AND products.price < 3000000";
                        }
                        if($price == 3){
                            $str_price .= " OR products.price > 3000000 AND products.price < 4000000";
                        }
                        if($price == 4){
                            $str_price .= " OR products.price > 4000000";
                        }
                    }
                    $str_price = substr($str_price, 3);
                    $str_price = "($str_price)";
                    $param['price'] = $str_price;
                }
            }
            $products = $obj_product->getProductInHomePage($param);
            $obj_pagination = new Pagination($param);
            $pagination = $obj_pagination->getPagination();
            $this->page_title = "Sản phẩm";
            $this->content = $this->render("view/product/index.php", ['category_all'=>$category_all,'products'=>$products,'pagination'=>$pagination]);
            require_once "view/layout/index.php";
        }
    }
?>