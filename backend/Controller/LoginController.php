<?php
    require_once "Model/UserModel.php";
    class LoginController {
        public $error;
        public $content;
        public $page_title;
        public function render($file,$valiable=[]){
            extract($valiable);
            ob_start();
            require_once $file;
            $render_view = ob_get_clean();
            return $render_view;
        }
        public function login(){
            $obj_user = new UserModel();
            if(isset($_SESSION['user'])){
                header("location: index.php?controller=product&action=index");
                exit();
            }
            if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user = $obj_user->checkLogin($username,md5($password));
                if(strlen($password) < 6){
                    $this->error = "Password không được ít hơn 6 kí tự !";
                }else if(empty($user)){
                    $this->error = "Username hoặc Password không đúng !";
                }
                if(empty($this->error)){
                    $_SESSION['success'] = "Đăng nhập thành công !";
                    $_SESSION['user'] = $user;
                    $obj_user->last_login = date("Y/m/d H:i:s");
                    $obj_user->update_lastlogin($_SESSION['user']['id']);
                    header("location: index.php?controller=product");
                    exit();
                }
            }

            $this->page_title = "Đăng nhập hệ thống";
            $this->content = $this->render('View/user/login.php');
            require_once "View/layout_login/index.php";
        }
        public function register(){
            if(isset($_POST['register'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                $obj_user = new UserModel();
                $check_username = $obj_user->getSelectUsername($username);
                if(strlen($password) < 6){
                    $this->error = "Password phải có nhiều hơn 6 kí tự !";
                }else if($password !== $password_confirm){
                    $this->error = "Password nhập lại chưa đúng !";
                }else if(!empty($check_username)){
                    $this->error = "Username đã tồn tại !";
                }
                if(empty($this->error)){
                    // lưu vào csdl
                    $obj_user->username = $username;
                    $obj_user->password = md5($password);
                    $obj_user->created_at = date("Y/m/d H:i:s");
                    $insert_user = $obj_user->insert_user();
                    if($insert_user){
                        $_SESSION['success'] = "Đăng kí tài khoản thành công !";
                        header("location: index.php?controller=login&action=login");
                        exit();
                    }else{
                        $_SESSION['error'] = "Đăng kí tài khoản thất bại !";
                    }
                }
            }
            $this->page_title = "Đăng kí tài khoản";
            $this->content = $this->render('View/user/register.php');
            require_once "View/layout_login/index.php";
        }
        public function logout(){
            $_SESSION['success'] = "Đăng xuất tài khoản thành công !";
            unset($_SESSION['user']);
            header("location: index.php?controller=login&action=login");
            exit();
        }
    }
?>