<?php
    require_once "Model/Model.php";
    class UserModel extends Model{
        public $id;
        public $password;
        public $first_name;
        public $last_name;
        public $email;
        public $created_at;
        public $updated_at;
        public $birth_day;
        public $gender;
        public function Check_username($email){
            // kiểm tra email đã tồn tại trong csdl hay chưa, nếu rồi thì k cho đki
            $obj_check_username = $this->connection->prepare("SELECT COUNT(email) FROM users WHERE users.email = '$email'");
            $obj_check_username->execute();
            return $obj_check_username->fetchColumn();
        }
        public function InsertUser(){
            $obj_insert = $this->connection->prepare("INSERT INTO users(email,first_name,last_name,password,birth_day,gender) VALUES(:email,:first_name,:last_name,:password,:birth_day,:gender)");
            $obj_insert->execute([
                ':email'=>$this->email,
                ':first_name'=>$this->first_name,
                ':last_name'=>$this->last_name,
                ':password'=>$this->password,
                ':birth_day'=>$this->birth_day,
                ':gender'=>$this->gender
            ]);
            return $obj_insert;
        }
        public function checkLogin($email,$password){
            $obj_checkLogin = $this->connection->prepare("SELECT * FROM users WHERE users.email = '$email' && users.password = '$password'");
            $obj_checkLogin->execute();
            return $obj_checkLogin->fetch(PDO::FETCH_ASSOC);
        }
    }
?>