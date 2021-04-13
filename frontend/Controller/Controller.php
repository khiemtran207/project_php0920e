<?php
    class Controller{
        public $error;
        public $page_title;
        public $content;
        public function render($file,$variable = []){
            extract($variable);
            ob_start();
            require_once $file;
            return ob_get_clean();
        }
    }
?>
