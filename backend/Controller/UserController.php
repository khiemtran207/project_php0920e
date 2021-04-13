<?php
    require_once "Controller/Controller.php";
    require_once "Model/UserModel.php";
    require_once "Model/Pagination.php";
    class UserController extends Controller {
        public function index(){
            $obj_user = new UserModel();
            $param = [
                'controller' => 'user',
                'action'=>'index',
                'limit'=>5,
                'total'=>$obj_user->count_total(),
                'page'=>(isset($_GET['page']) && is_numeric($_GET['page']))?$_GET['page']:1,
                'full_mode'=>true
            ];
            $pagination = new Pagination($param);
            $pagination_page = $pagination->getPagination();
            $select_all_pagination = $obj_user->select_total_pagination($param);
            $this->page_title ="Hiển thị tài khoản";
            $this->content = $this->render("View/user/index.php",['select_all_pagination'=>$select_all_pagination,'pagination_page'=>$pagination_page]);
            require_once "View/layout/index.php";
        }
        public function create(){
            $obj_user = new UserModel();
            if(isset($_POST['create'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $avatar_arr = $_FILES['avatar'];
                $job = $_POST['job'];
                $facebook = $_POST['facebook'];
                $status = $_POST['status'];
                if(empty($username)){
                    $this->error = "Không được để trống username !";
                }else if(empty($password)){
                    $this->error = "Không được để trống password !";
                }else if(strlen($password) < 6){
                    $this->error = "Mật khẩu phải từ 6 kí tự trở lên !";
                }else if($password != $password_confirm){
                    $this->error = "Mật khẩu nhập lại không chính xác !";
                }else if(!empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $this->error = "Email không đúng định dạng !";
                }else if(!empty($facebook) && !filter_var($facebook, FILTER_VALIDATE_URL)){
                    $this->error = "Địa chỉ facebook không đúng định dạng !";
                }else if(!empty($obj_user->getSelectUsername($username))){
                    $this->error = "Username đã tồn tại, vui lòng chọn username khác !";
                }else if($avatar_arr['error'] == 0){
                    $end_file = pathinfo($avatar_arr['name'], PATHINFO_EXTENSION);
                    $end_file_success = ['jpg','jpeg','png','gif'];
                    $end_file = strtolower($end_file);
                    $size_file_mb = $avatar_arr['size']/1024/1024;
                    $size_file_mb = round($size_file_mb,2);
                    if(!in_array($end_file,$end_file_success)){
                        $this->error = "File tải lên phải là ảnh !";
                    }else if($size_file_mb > 2){
                        $this->error = "Ảnh tải lên phải có dung lượng < 2mb !";
                    }
                }
                if(empty($this->error)){
                    $name_avatar = "";
                    if($avatar_arr['error'] == 0){
                        $path_save_file = "Assets/container_file";
                        if(!file_exists($path_save_file)){
                            mkdir($path_save_file);
                        }
                        $name_avatar .= time().'-user-'.$avatar_arr['name'];
                        move_uploaded_file($avatar_arr['tmp_name'],$path_save_file.'/'.$name_avatar);
                    }
                    $obj_user->username = $username;
                    $obj_user->password = md5($password);
                    $obj_user->first_name =$first_name;
                    $obj_user->last_name = $last_name;
                    $obj_user->phone = $phone;
                    $obj_user->address = $address;
                    $obj_user->email = $email;
                    $obj_user->avatar = $name_avatar;
                    $obj_user->jobs = $job;
                    $obj_user->facebook = $facebook;
                    $obj_user->status = $status;
                    $insert_user = $obj_user->insert_user();
                    if($insert_user){
                        $_SESSION['success'] = "Thêm mới tài khoản thành công !";
                        header("location: index.php?controller=user");
                        exit();
                    }else{
                        $_SESSION['error'] = "Thêm mới tài khoản thất bại !";
                    }
                }
            }
            $this->page_title = "Thêm mới tài khoản";
            $this->content = $this->render('View/user/create.php');
            require_once "View/layout/index.php";
        }
        public function delete(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = "id không hợp lệ !";
                header("location: index.php?controller=user");
                exit();
            }
            $id = $_GET['id'];
            $obj_user = new UserModel();
            $select_one = $obj_user->select_one($id);
            $delete =  $obj_user->delete($id);
            $avatar_name = $select_one['avatar'];
            echo $avatar_name;
            if($delete){
                $_SESSION['success'] = "Xóa user thành công !";
                unlink("Assets/container_file/$avatar_name");
            }else{
                $_SESSION['error'] = "Xóa user thất bại !";
            }
            header("location: index.php?controller=user");
            exit();
        }
        public function detail(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = "id không hợp lệ !";
                header("location: index.php?controller=user");
                exit();
            }
            $id = $_GET['id'];
            $obj_user = new UserModel();
            $select_one = $obj_user->select_one($id);
            $this->page_title = "Chi tiết tài khoản #{$select_one['id']}";
            $this->content = $this->render("View/user/detail.php",['select_one' => $select_one]);
            require_once "View/layout/index.php";
        }
        public function update(){
            if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
                $_SESSION['error'] = "Id không hợp lệ !";
                header("location: index.php?controller=user");
                exit();
             }
            $id = $_GET['id'];
            $obj_user = new UserModel();
            $select_one = $obj_user->select_one($id);

            if(isset($_POST['update'])){
                $username = $_POST['username'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $avatar_arr = $_FILES['avatar'];
                $job = $_POST['job'];
                $facebook = $_POST['facebook'];
                $status = $_POST['status'];
                if(empty($username)){
                    $this->error = "Không được để trống username !";
                }else if(!empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $this->error = "Email không đúng định dạng !";
                }else if(!empty($facebook) && !filter_var($facebook, FILTER_VALIDATE_URL)){
                    $this->error = "Địa chỉ facebook không đúng định dạng !";
                }else if($avatar_arr['error'] == 0){
                    $end_file = pathinfo($avatar_arr['name'], PATHINFO_EXTENSION);
                    $end_file_success = ['jpg','jpeg','png','gif'];
                    $end_file = strtolower($end_file);
                    $size_file_mb = $avatar_arr['size']/1024/1024;
                    $size_file_mb = round($size_file_mb,2);
                    if(!in_array($end_file,$end_file_success)){
                        $this->error = "File tải lên phải là ảnh !";
                    }else if($size_file_mb > 2){
                        $this->error = "Ảnh tải lên phải có dung lượng < 2mb !";
                    }
                }
                if(empty($this->error)){
                    $name_avatar = $select_one['avatar'];
                    if($avatar_arr['error'] == 0){
                        $path_save_file = "Assets/container_file";
                        unlink("$path_save_file/$name_avatar");
                        if(!file_exists($path_save_file)){
                            mkdir($path_save_file);
                        }
                        $name_avatar = time().'-user-'.$avatar_arr['name'];
                        move_uploaded_file($avatar_arr['tmp_name'],$path_save_file.'/'.$name_avatar);
                    }
                    $obj_user->username = $username;
                    $obj_user->first_name = $first_name;
                    $obj_user->last_name = $last_name;
                    $obj_user->phone = $phone;
                    $obj_user->address = $address;
                    $obj_user->email = $email;
                    $obj_user->avatar = $name_avatar;
                    $obj_user->jobs = $job;
                    $obj_user->facebook = $facebook;
                    $obj_user->status = $status;
                    $obj_user->updated_at = date("Y/m/d H:i:s");
                    $update_user = $obj_user->update($id);
                    if($update_user){
                        $_SESSION['success'] = "Cập nhật tài khoản thành công !";
                        header("location: index.php?controller=user");
                        exit();
                    }else{
                        $_SESSION['error'] = "Cập nhật tài khoản thất bại !";
                    }
                }
            }

            $this->page_title = "Cập nhật danh mục #{$select_one['id']}";
            $this->content = $this->render("View/user/update.php",['select_one' => $select_one]);
            require_once "View/layout/index.php";
        }
    }
?>