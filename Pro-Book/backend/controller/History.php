<?php
	class History{
		private $model;
		private $view;
		private $purchase;
		public function __construct(){
			require_once('backend/model/History_model.php');
			require_once('backend/view/History_view.php');
			require_once('backend/controller/helper.php');
			$this->model = new History_model();
			$this->view = new History_view();
		}

		public function index(){
			if(isset($_COOKIE["accessToken"])){
                $user = checkAccessToken();
				$page = ! isset($_GET['page'])? 0 : $_GET['page'];
                if($user){
                    $history = $this->model->get_user_history($page);
					$this->view->render_history_page($history);
                }else{
                    header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
                    // $this->auth_view->render_login_page();
                }
            } else {
                // $this->auth_view->render_login_page();
                header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
            }
		}
	}
?>