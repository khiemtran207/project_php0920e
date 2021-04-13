<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $controller = (isset($_GET['controller']))?$_GET['controller']:"home";
    $action = (isset($_GET['action']))?$_GET['action']:"index";
    $controller = ucfirst($controller);
    $controller = $controller."Controller";
    $controller_path = "Controller/$controller.php";
    if(!file_exists($controller_path)){
        die("Trang bạn tìm không tồn tại");
    }
    require_once $controller_path;
    if (!method_exists($controller,$action)){
        die("Không tồn tại phương thức $action");
    }
    $obj = new $controller;
    $obj->$action();
?>