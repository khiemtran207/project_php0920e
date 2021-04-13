<?php
    require_once "Controller/Controller.php";
    require_once "Model/ProductModel.php";
    require_once "Model/Pagination.php";
    require_once "Model/CategoryModel.php";
    class ProductController extends Controller{
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
        public function index(){
            $obj_product = new ProductModel();
            $param = [
              'total'=>$obj_product->selectCount(),
              'limit'=>5,
              'controller'=>'product',
              'action'=>'index',
              'full_mode' => true,
              'page'=>(isset($_GET['page']) && is_numeric($_GET['page']))?$_GET['page']:1
            ];
            $category_obj = new CategoryModel();
            $select_category = $category_obj->selectAll("0");
            $pagination = new Pagination($param);
            $pagination_page = $pagination->getPagination();
            $select_Pagination = $obj_product->selectAllPagination($param);
            $this->page_title = "Danh sách sản phẩm";
            $this->content = $this->render("View/product/index.php",['pagination_page'=>$pagination_page,'select_Pagination'=>$select_Pagination,'select_category'=>$select_category    ]);
            require_once "View/layout/index.php";
        }
        public function create(){
            $obj_category = new CategoryModel();
            $select_all_category = $obj_category->selectAll("0");

            if(isset($_POST['create'])){
                $category_id = $_POST['category_id'];
                $name_product = $_POST['name_product'];
                $price = $_POST['price'];
                $avatar_arr = $_FILES['avatar'];
                $amount = $_POST['amount'];
                $summary = $_POST['summary'];
                $description = $_POST['description'];
                $seo_title = $_POST['seo_title'];
                $seo_description = $_POST['seo_description'];
                $seo_keywords = $_POST['seo_keywords'];
                $status = $_POST['status'];
                if(empty($name_product)){
                    $this->error = "Không được để trống tên sản phẩm !";
                }else if(empty($price)){
                    $this->error = "Không được để trống giá sản phẩm !";
                }else if(empty($amount)){
                    $this->error = "Không được để trống số lượng sản phẩm !";
                }else if($avatar_arr['error'] == 0){
                    $end_file = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
                    $end_file = strtolower($end_file);
                    $end_file_success = ['jpg','jpeg','png','gif'];
                    $size_file = $avatar_arr['size']/1024/1024;
                    $size_file = round($size_file,2);
                    if(!in_array($end_file,$end_file_success)){
                        $this->error = "File tải lên phải là ảnh!";
                    }else if($size_file>2){
                        $this->error = "Ảnh tải lên phải có dung lượng nhỏ hơn 2 mb!";
                    }
                }
                if(empty($_this->error)){
                    $name_avatar = "";
                    if($avatar_arr['error'] == 0){
                        $container_file = "container_file";
                        $container_file_path = "Assets/$container_file";
                        if(!file_exists($container_file_path)) {
                            mkdir($container_file_path);
                        }
                        $name_avatar .= time()."-product-".$avatar_arr['name'];
                        move_uploaded_file($avatar_arr['tmp_name'],$container_file_path.'/'.$name_avatar);
                    }
                    $obj_product = new ProductModel();
                    $obj_product->category_id = $category_id;
                    $obj_product->title = $name_product;
                    $obj_product->avatar = $name_avatar;
                    $obj_product->price = $price;
                    $obj_product->amount = $amount;
                    $obj_product->summary = $summary;
                    $obj_product->content = $description;
                    $obj_product->seo_title = $seo_title;
                    $obj_product->seo_description = $seo_description;
                    $obj_product->seo_keywords = $seo_keywords;
                    $obj_product->status = $status;
                    $insert = $obj_product->insert();
                    if($insert){
                        $_SESSION['success'] = "Thêm mới sản phẩm thành công !";
                        header("location: index.php?controller=product");
                        exit();
                    }else{
                        $_SESSION['error'] = "Thêm mới sản phẩm thất bại !";
                    }
                }
            }

            $this->page_title = "Thêm mới sản phẩm";
            $this->content = $this->render("View/product/create.php",['select_all_category'=>$select_all_category]);
            require_once "View/layout/index.php";
        }
        public function delete(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = "Id không hợp lệ !";
                header("location: index.php?controller=product");
                exit();
            }
            $id = $_GET['id'];
            $obj_product = new ProductModel();
            $select_one = $obj_product->select_one($id);
            $delete =  $obj_product->delete($id);
            if($delete){
                unlink("Assets/container_file/{$select_one['avatar']}");
                $_SESSION['success'] = "Xóa sản phẩm thành công !";
            }else{
                $_SESSION['error'] = "Xóa sản phẩm thất bại !";
            }
            header("location: index.php?controller=product");
            exit();
        }
        public function detail(){

        }
        public function update(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $this->error = "id Không hợp lệ";
                header("location: index.php?controller=product");
                exit();
            }
            $id = $_GET['id'];
            $obj_product = new ProductModel();
            $select_one_product = $obj_product->select_one($id);
            $obj_category = new CategoryModel();
            $categorise = $obj_category->selectAll("0");

            if(isset($_POST['update'])) {
//                    echo "<pre>";
//                    print_r($_POST);
//                    echo "</pre>";
                $category_id = $_POST['category_id'];
                $name_product = $_POST['name_product'];
                $price = $_POST['price'];
                $amount = $_POST['amount'];
                $summary = $_POST['summary'];
                $description = $_POST['description'];
                $seo_title = $_POST['seo_title'];
                $seo_description = $_POST['seo_description'];
                $seo_keywords = $_POST['seo_keywords'];
                $status = $_POST['status'];
                $avatar_arr = $_FILES['avatar'];
                if(empty($name_product)){
                    $this->error = "Không được để trống tên sản phẩm !";
                }else if(empty($price)){
                    $this->error = "Không được để trống giá sản phẩm !";
                }else if(empty($amount)){
                    $this->error = "Không được để trống số lượng sản phẩm !";
                }else if($avatar_arr['error'] == 0){
                    $end_file = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
                    $end_file = strtolower($end_file);
                    $end_file_success = ['jpg','jpeg','png','gif'];
                    $size_file = $avatar_arr['size']/1024/1024;
                    $size_file = round($size_file,2);
                    if(!in_array($end_file,$end_file_success)){
                        $this->error = "File tải lên phải là ảnh!";
                    }else if($size_file>2){
                        $this->error = "Ảnh tải lên phải có dung lượng nhỏ hơn 2 mb!";
                    }
                }
                if(empty($_this->error)) {
                    $name_avatar = $select_one_product['avatar'];
                    if ($avatar_arr['error'] == 0) {
                        $container_file = "container_file";
                        $container_file_path = "Assets/$container_file";
                        unlink($container_file_path.'/'.$name_avatar);
                        if (!file_exists($container_file_path)) {
                            mkdir($container_file_path);
                        }
                        $name_avatar .= time() . "-product-" . $avatar_arr['name'];
                        move_uploaded_file($avatar_arr['tmp_name'], $container_file_path . '/' . $name_avatar);
                    }
                    $obj_product->category_id = $category_id;
                    $obj_product->title = $name_product;
                    $obj_product->avatar = $name_avatar;
                    $obj_product->price = $price;
                    $obj_product->amount = $amount;
                    $obj_product->summary = $summary;
                    $obj_product->content = $description;
                    $obj_product->status = $status;
                    $obj_product->seo_title = $seo_title;
                    $obj_product->seo_description = $seo_description;
                    $obj_product->seo_keywords = $seo_keywords;
                    $obj_product->updated_at = date("Y/m/d H:i:s");
                    $is_update =  $obj_product->update($id);
                    if($is_update){
                        $_SESSION['success'] = "Cập nhật sản phẩm thành công !";
                        header("location: index.php?controller=product");
                        exit();
                    }else{
                        $_SESSION['error'] = "Cập nhật sản phẩm thất bại !";
                    }
                }
            }

            $this->page_title = "Cập nhật sản phẩm #{$select_one_product['id']}";
            $this->content = $this->render("View/product/update.php",['select_one_product'=>$select_one_product,'categorise'=>$categorise]);
            require_once "View/layout/index.php";
        }
    }
?>