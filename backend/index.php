<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $controller = (isset($_GET['controller']))?$_GET['controller']:"Product";
    $action = (isset($_GET['action']))?$_GET['action']:'index';
    $controller = ucfirst($controller);
    $controller = $controller."Controller";
    $controller_parh = "Controller/$controller.php";
    if(!file_exists($controller_parh)){
        die("Trang bạn tìm không tồn tại");
    }
    require_once ($controller_parh);
    $obj = new $controller;
    if(!method_exists($obj,$action)){
        die("Không tồn tại phương thức $action");
    }
    $obj->$action();
?>