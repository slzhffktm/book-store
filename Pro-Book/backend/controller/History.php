<?php
	class History{
		private $model;
		private $view;
		private $purchase;

		public function __construct(){
			require_once('backend/model/History_model.php');
            require_once('backend/controller/Auth.php');
			require_once('backend/view/History_view.php');

			$this->model = new History_model();
			$this->view = new History_view();
		}

		public function index(){
			if(isset($_COOKIE["accessToken"])){
                $browser = Auth::get_browser_name($_SERVER['HTTP_USER_AGENT']);
                $ip = Auth::getRealIpAddr();
                $user_access_token = $_COOKIE["accessToken"];
                $user = $this->as->checkAccessToken($user_access_token,$browser,$ip);
    
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