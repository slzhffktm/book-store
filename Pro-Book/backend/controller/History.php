<?php
	class History{
		private $model;
		private $view;
		private $purchase;

		public function __construct(){
			require_once('backend/model/History_model.php');
			require_once('backend/view/History_view.php');

			$this->model = new History_model();
			$this->view = new History_view();
		}

		public function index(){
			$page = ! isset($_GET['page'])? 0 : $_GET['page'];
			if(isset($GLOBALS['user']) and $page == 0){
				$history = $this->model->get_user_history($page);
				$this->view->render_history_page($history);
			}else{
				header('Location: http://localhost/tugasbesar1_2018/index.php/Auth/index');
			}
		}
	}
?>