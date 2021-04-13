<?php
    require_once "Controller/Controller.php";
    require_once "Model/CategoryModel.php";
    require_once "Model/Pagination.php";
    class CategoryController extends Controller{
        public function index(){
            $obj_category_model = new CategoryModel();
            $total_category =  $obj_category_model->getCountCategory();
            $param = [
                'total'=>$total_category,
                'limit'=>5,
                'controller'=>'category',
                'action'=>'index',
                'full_mode'=>true
            ];
            $param['page'] = (isset($_GET['page']) && is_numeric($_GET['page']))?$_GET['page']:1;
            $select_pagination = $obj_category_model->getCategoryPagination($param);
            $obj_pagination = new Pagination($param);
            $pagination = $obj_pagination->getPagination();
            $this->page_title = "Hiển thị danh mục";
            $this->content = $this->render("View/category/index.php",['pagination'=>$pagination,'select_pagination'=>$select_pagination]);
            require_once "View/layout/index.php";
        }
        public function create(){
           if(isset($_POST['create'])){
                $name = $_POST['name'];
                $avatar_arr = $_FILES['avatar'];
                $type_category = $_POST['type_category'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                if(empty($name)) {
                    $this->error = "Không được để trống tên danh mục!";
                }
                else if(!isset($type_category)){
                    $this->error = "Không được để trống kiểu danh mục!";
                }
                else if($avatar_arr['error'] == 0){
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
                if(empty($this->error)){
                    $name_avatar = "";
                    if($avatar_arr['error'] == 0){
                        $container_file = "container_file";
                        $container_file_path = "Assets/$container_file";
                        if(!file_exists($container_file_path)) {
                            mkdir($container_file_path);
                        }
                        $name_avatar .= time()."-category-".$avatar_arr['name'];
                        move_uploaded_file($avatar_arr['tmp_name'],$container_file_path.'/'.$name_avatar);
                    }
                    $create_category = new CategoryModel();
                    $create_category->name = $name;
                    $create_category->avatar = $name_avatar;
                    $create_category->type_category = $type_category;
                    $create_category->description= $description;
                    $create_category->status = $status;
                    $create = $create_category->create();
                    if($create){
                        $_SESSION['success'] = "Thêm mới category thành công!";
                        header("location:index.php?controller=category");
                        exit();
                    }else{
                        $_SESSION['error'] = "Thêm mới category thất bại!";
                    }
                }
           }
            $this->page_title = "Thêm mới danh mục";
            $this->content = $this->render("View/category/create.php");
            require_once "View/layout/index.php";
        }
        public function delete(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = 'ID không hợp lệ';
                header("location: index.php?controller=category&action=index");
                exit();
            }
            $id = $_GET['id'];
            $obj_category = new CategoryModel();
            $select_id = $obj_category->select_id($id);
            $avatar_name = $select_id['avatar'];
            $delete_category = $obj_category->delete($id);
            if($delete_category){
                $_SESSION['success'] = "Xóa category thành công";
                unlink("Assets/container_file/$avatar_name");
            }else{
                $_SESSION['error'] = "Xóa category thất bại";
            }
            header("location: index.php?controller=category&action=index");
            exit();
        }
        public function detail(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = "id Không hợp lệ";
                header("location: index.php?controller=category");
                exit();
            }
            $id = $_GET['id'];
            $obj_category = new CategoryModel();
            $select_id = $obj_category->select_id($id);
            $this->page_title = "Chi tiết danh mục #{$select_id['id']}";
            $this->content = $this->render('View/category/detail.php',['select_id'=>$select_id]);
            require_once "View/layout/index.php";
        }
        public function update(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $this->error = "id không hợp lệ!";
                header("location:index.php?controller=category");
                exit();
            }
            $id = $_GET['id'];
            $obj_category = new CategoryModel();
            $select_id = $obj_category->select_id($id);

            if(isset($_POST['update'])){
                $name = $_POST['name'];
                $avatar_arr = $_FILES['avatar'];
                $type_category = $_POST['type_category'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                if(empty($name)) {
                    $this->error = "Không được để trống tên danh mục!";
                }
                else if(!isset($type_category)){
                    $this->error = "Không được để trống kiểu danh mục!";
                }
                else if($avatar_arr['error'] == 0){
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
                if(empty($this->error)){
                    $name_avatar = $select_id['avatar'];
                    if($avatar_arr['error'] == 0){
                        $container_file = "container_file";
                        $container_file_path = "Assets/$container_file";
                        unlink($container_file_path.'/'.$name_avatar);
                        if(!file_exists($container_file_path)) {
                            mkdir($container_file_path);
                        }
                        $name_avatar .= time()."-category-".$avatar_arr['name'];
                        move_uploaded_file($avatar_arr['tmp_name'],$container_file_path.'/'.$name_avatar);
                    }
                    $obj_category->name = $name;
                    $obj_category->avatar = $name_avatar;
                    $obj_category->type_category = $type_category;
                    $obj_category->description= $description;
                    $obj_category->status = $status;
                    $update = $obj_category->updateCategory($id);
                    if($update){
                        $_SESSION['success'] = "Cập nhật category thành công!";
                        header("location:index.php?controller=category");
                        exit();
                    }else{
                        $_SESSION['error'] = "Cập nhật nhân viên thất bại!";
                    }
                }
            }
            $this->page_title = "Cập nhật danh mục #{$select_id['id']}";
            $this->content = $this->render('View/category/update.php',['select_id'=>$select_id]);
            require_once "View/layout/index.php";
        }
    }
?>
