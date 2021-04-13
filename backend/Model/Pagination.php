<?php
    class Pagination{
        public $param = [
          'total'=>0,
          'limit'=>0,
          'controller'=>'',
          'action'=>'',
            'full_mode'=>true
        ];
        public function __construct($param){
            $this->param = $param;
        }
        public function getTotalPage(){
            $page = $this->param['total']/$this->param['limit'];
            $page = ceil($page);
            return $page;
        }
        public function getCurrentPage(){
            $page = 1;
            if(isset($_GET['page']) && is_numeric($_GET['page'])) {
                $page = $_GET['page'];
                $total_page = $this->getTotalPage();
                if ($page > $total_page) {
                    $page = $total_page;
                }
            }
            return $page;
        }
        public function getPrevPage(){
            $prev_page = "";
            $controller = $this->param['controller'];
            $action = $this->param['action'];
            $page_current = $this->getCurrentPage();
            if($page_current >= 2){
                $prev_url = "index.php?controller=$controller&action=$action&page=".($page_current-1);
                $prev_page = "<li ><a href='{$prev_url}'>Prev</a></li>";
            }
            return $prev_page;
        }
        public function getNextPage(){
            $next_page = "";
            $controller = $this->param['controller'];
            $action = $this->param['action'];
            if($this->getTotalPage()>$this->getCurrentPage()) {
                $next_url = "index.php?controller=$controller&action=$action&page=" . ($this->getCurrentPage() + 1);
                $next_page = "<li style='margin-left: 10px'><a href='$next_url'>Next</a></li>";
            }
            return $next_page;
        }
        public function getPagination(){
            $data = "";
            $total_page = $this->getTotalPage();
            $controller = $this->param['controller'];
            $action = $this->param['action'];
            if($total_page == 1){
                return "";
            }
            $data .= "<ul class='pagination'>";
            $data.=$this->getPrevPage();
            if($this->param['full_mode'] == true){
                for ($page = 1; $page <= $total_page; $page++) {
                    $current_page = $this->getCurrentPage();
                    //nếu trang hiện tại trùng với với số lần lặp hiện
                    //tại thì sẽ thêm class active và ko gắn link
//                cho trang hiện tại
                    if ($current_page == $page) {
                        $data .= "<li class='active' style='margin-left: 10px'><a style='text-decoration: underline' href='#'>$page</a></li>";
                    } else {
                        $page_url
                            = "index.php?controller=$controller&action=$action&page=$page";
                        $data .= "<li><a href='$page_url' style='margin-left: 10px'>$page</a></li>";
                    }
                }
            }
            $data.=$this->getNextPage();
            $data.="</ul>";
            return $data;
        }
    }
?>
