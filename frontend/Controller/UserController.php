<?php
    require_once "Controller/Controller.php";
    require_once  "Model/UserModel.php";
    class UserController extends Controller{
        public function register(){
            if(isset($_POST['register'])){
                if(isset($_POST['gender'])){
                    $gender = $_POST['gender'];
                }
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $birthday = $_POST['birthday'];
                if(empty($first_name)){
                    $this->error = "Không được để trống first name !";
                }else if(empty($last_name)){
                    $this->error = "Không được để trống last name !";
                }else if(empty($password)){
                    $this->error = "Không được để trống password !";
                }else if(strlen($password) < 6){
                    $this->error = "Password phải nhiều hơn 6 kí tự !";
                } else if(empty($birthday)){
                    $this->error = "Không được để trống date of Bbrth !";
                }
                if(empty($this->error)){
                    $obj_user = new UserModel();
                    $obj_user->email = $email;
                    $obj_user->password = md5($password);
                    $obj_user->first_name = $first_name;
                    $obj_user->last_name = $last_name;
                    $obj_user->birth_day = $birthday;
                    $obj_user->gender = $gender;
                    $is_insert_user = $obj_user->InsertUser();
                    if($is_insert_user){
                        $_SESSION['success'] = "Đăng kí tài khoản thành công !";
                        unset($_SESSION['email']);
                        header('Location: dang-nhap.html');
                        exit();
                    }else{
                        $_SESSION['error'] = "Đăng kí tài khoản thất bại !";
                    }
                }
            }

            $this->page_title = "Đăng kí tài khoản";
            $this->content = $this->render("View/user/register.php");
            require_once "View/layout/index.php";
        }
        public function login(){
            if(isset($_SESSION['users'])){
                $this->error = "Bạn đã đăng nhập !";
                header("location: trang-chu.html");
                exit();
            }
            if(isset($_POST['register'])){
                $email = $_POST['email_create'];
                if(empty($email)){
                    $this->error = "Không được để trống địa chỉ email.";
                }
                $obj_users = new UserModel();
                $check_username = $obj_users->Check_username($email);
                if($check_username != 0){
                    $this->error = "User đã được đăng kí.";
                }
                if(empty($this->error)){
                    $_SESSION['email'] = $email;
                    header("location: dang-ki-tai-khoan.html");
                    exit();
                }

            }
            if(isset($_POST['submit'])){
               $email = $_POST['email'];
               $password = md5($_POST['password']);
               if(empty($email)){
                   $this->error = "Không được để trống email đăng nhập !";
               }else if(empty($password)){
                   $this->error = "Không được để trống password đăng nhập !";
               }
                $obj_users = new UserModel();
                $check_login = $obj_users->checkLogin($email,$password);
                if($check_login){
                    $_SESSION['success'] = "Đăng nhập thành công !";
                    $_SESSION['users'] = $check_login;
                }else{
                    $this->error = "Sai email hoặc password";
               }
               if(empty($this->error)){
                   header("location: trang-chu.html");
                   exit();
               }
            }
           
            $this->page_title = "Đăng nhập";
            $this->content = $this->render("View/user/login.php");
            require_once "View/layout/index.php";
        }
        public function address(){
            $this->page_title = "Địa chỉ nhận hàng";
            $this->content = $this->render('View/user/address.php');
            require_once "View/layout/index.php";
        }
    }
?>
