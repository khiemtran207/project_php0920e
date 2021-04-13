<?php
    require_once "Controller/Controller.php";
    require_once "Model/ProductModel.php";
    class HomeController extends Controller {
        public function index(){
            $param = [];
            $obj_product = new ProductModel();
            $products = $obj_product->getProductInHomePage($param);
            $this->page_title = "Trang chủ";
            $this->content = $this->render('View/home/index.php',['products'=>$products]);
            require_once "View/layout/index.php";
        }
    }
?>
