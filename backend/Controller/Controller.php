<?php
    class Controller{
        public $content;
        public $error;
        public $page_title;
            public function __construct()
            {
                if(!isset($_SESSION['user'])){
                    $_SESSION['error'] = "Bạn cần phải đăng nhập !";
                    header("location: index.php?controller=login&action=login");
                    exit();
                }
            }

        public function render($file,$variable = []){
            extract($variable);
            ob_start();
            require_once $file;
            $render_view = ob_get_clean();
            return $render_view;
        }
    }
?>