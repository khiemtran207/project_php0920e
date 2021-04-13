<?php
    require_once "Controller/Controller.php";
    require_once "Model/ProductModel.php";
    class CartsController extends Controller {
        public function add(){
            $product_id = $_GET['id'];
            $obj_product = new ProductModel();
            $products = $obj_product->select_one($product_id);
            $product_cart = [
                'title'=>$products['title'],
                'amount' => $products['amount'],
                'price'=>$products['price'],
                'avatar'=>$products['avatar'],
                'content'=>$products['content'],
                'summary'=>$products['summary'],
                'quantity'=>1
            ];
            // truong hợp chưa tồn tại giỏ hàng
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'][$product_id] = $product_cart;
            }else{
                if(array_key_exists($product_id,$_SESSION['cart'])){
                    // update lại số lượng
                   $_SESSION['cart'][$product_id]['quantity']++;
                }else{
                    $_SESSION['cart'][$product_id] = $product_cart;
                }
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        public function index(){
            if(isset($_POST['submit'])){
                foreach ($_SESSION['cart'] as $product_id => $cart){
                    $_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
                }
            }
    //            header("location: gio-hang-cua-ban.html");
    //            exit();
            $this->page_title = "Giỏ hàng của bạn";
            $this->content = $this->render("View/cart/index.php");
            require_once "View/layout/index.php";
        }
        public function delete(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                echo "<script>alert('id không hợp lệ !')</script>";
            }
            $id = $_GET['id'];
            unset($_SESSION['cart'][$id]);
            header("location: gio-hang-cua-ban.html");
            exit();
        }
    }
?>