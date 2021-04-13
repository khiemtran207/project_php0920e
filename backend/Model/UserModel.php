<?php
    require_once "Model/Model.php";
    class UserModel extends Model{
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $phone;
        public $address;
        public $email;
        public $avatar;
        public $jobs;
        public $last_login;
        public $facebook;
        public $status;
        public $created_at;
        public $updated_at;
        public $str_search;
        public function __construct()
        {
            parent::__construct();
            if(isset($_GET['username']) && !empty($_GET['username'])){
               $name_search = addslashes($_GET['username']);
               $this->str_search .= "AND users.username LIKE '%$name_search%'";
            }
        }

        public function getSelectUsername($username){
            $obj_select_Username = $this->connection->prepare("SELECT COUNT(username) FROM users WHERE username = '$username'");
            $obj_select_Username->execute();
            return $obj_select_Username->fetchColumn();
        }
        public function insert_user(){
            $obj_insert = $this->connection->prepare("INSERT INTO users(username,password,first_name,last_name,phone,address,email,avatar,jobs,facebook,status) VALUES (:username,:password,:first_name,:last_name,:phone,:address,:email,:avatar,:jobs,:facebook,:status)");
            return $obj_insert->execute([
                ':username' => $this->username,
                ':password' => $this->password,
                ':first_name'=>$this->first_name,
                ':last_name'=>$this->last_name,
                ':phone'=>$this->phone,
                ':address'=>$this->address,
                ':email'=>$this->email,
                ':avatar'=>$this->avatar,
                ':jobs'=>$this->jobs,
                ':facebook'=>$this->facebook,
                ':status'=>$this->status
            ]);
        }
        public function checkLogin($username,$password){
            $obj_select = $this->connection->prepare("SELECT * FROM users WHERE username = '$username' && password = '$password'");
            $obj_select->execute();
            return $obj_select->fetch(PDO::FETCH_ASSOC);
        }
        public function count_total(){
           $count_total = $this->connection->prepare("SELECT COUNT(id) FROM users WHERE TRUE $this->str_search");
           $count_total->execute();
           return $count_total->fetchColumn();
        }
        public function select_total_pagination($param = []){
            $limit = $param['limit'];
            $start = ($param['page'] - 1)*$limit;
            $obj_select_all =  $this->connection->prepare("SELECT * FROM users WHERE TRUE $this->str_search ORDER BY created_at DESC LIMIT $start,$limit");
            $obj_select_all->execute();
            return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        }
        public function delete($id){
            $obj_delete = $this->connection->prepare("DELETE FROM users WHERE id = $id");
            return $obj_delete->execute();
        }
        public function select_one($id){
            $obj_select_id = $this->connection->prepare("SELECT * FROM users WHERE id = $id");
            $obj_select_id->execute();
            return $obj_select_id->fetch(PDO::FETCH_ASSOC);
        }
        public function update($id){
            $obj_update = $this->connection->prepare("UPDATE users SET username=:username,first_name=:first_name,last_name=:last_name,phone=:phone,email=:email,address=:address,avatar=:avatar,jobs=:jobs,updated_at=:updated_at,status=:status WHERE id=$id");
            return $obj_update->execute([
                ':username'=>$this->username,
                ':first_name'=>$this->first_name,
                ':last_name'=>$this->last_name,
                ':phone'=>$this->phone,
                ':email'=>$this->email,
                ':address'=>$this->address,
                ':avatar'=>$this->avatar,
                ':jobs'=>$this->jobs,
                ':status'=>$this->status,
                ':updated_at'=>$this->updated_at
            ]);
        }
        public function update_lastlogin($id){
            $obj_update_login = $this->connection->prepare("UPDATE users SET last_login=:last_login WHERE id = $id");
            return $obj_update_login->execute([':last_login' =>$this->last_login]);
        }
    }
?>
