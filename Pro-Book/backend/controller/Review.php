<?php

class Review {
	private $model;
	private $view;
	private $auth;
	private $order_record;

	public function __construct(){
		require_once("backend/model/Review_model.php");
		require_once("backend/model/Auth/Auth_service.php");
		require_once("backend/model/db/db_connection.php");
		require_once('backend/controller/Auth.php');
		require_once("backend/view/Review_view.php");

		$this->model = new Review_model();
		$this->auth = new AuthService();
		$this->view = new Review_view();		
	}

	public function show_review_page(){
		if(isset($_COOKIE["accessToken"])){
			$browser = Auth::get_browser_name($_SERVER['HTTP_USER_AGENT']);
			$ip = Auth::getRealIpAddr();
			$user_access_token = $_COOKIE["accessToken"];
			$user = $this->as->checkAccessToken($user_access_token,$browser,$ip);

			if($user){
				$history = $this->model->get_user_history($page);
				$this->view->render_history_page($history);
			}else{
				$order_id = $_GET['order_id'];
				$book_id = $_GET['book_id'];
				$book = $this->model->get_book_details($book_id);
				$order_details = $this->model->get_order_details($order_id);
				$username = $user->getUserName()
				if($order_details['username'] == $username) {
					if($order_details['is_commented']){
						exit("unauthorized request");
					} else {
						$this->view->render_review_page($book, $order_id);
					}
				}
				// $this->auth_view->render_login_page();
			}
		} else {
			// $this->auth_view->render_login_page();
			header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
		}

		// $username = $GLOBALS['user']->getUserName();

		// if(!$username){
		// 	header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
		// 	exit();
		// }

		// $order_id = $_GET['order_id'];
		// $book_id = $_GET['book_id'];
		// $book = $this->model->get_book_details($book_id);
		// $order_details = $this->model->get_order_details($order_id);

		// if($order_details['username'] == $username) {
		// 	if($order_details['is_commented']){
		// 		exit("unauthorized request");
		// 	} else {
		// 		$this->view->render_review_page($book, $order_id);
		// 	}
		// }
		// exit("unauthorized request");
	}

	private function get_username_from_cookie(){
		$browser = Auth::get_browser_name($_SERVER['HTTP_USER_AGENT']);
		$ip = Auth::getRealIpAddr();
		$user_access_token = $_COOKIE["accessToken"];
		$user = $this->as->checkAccessToken($user_access_token,$browser,$ip);
		$username = $user->getUsername();

		return $username;
	}

	public function insert_review(){
		if(!isset($GLOBALS['user'])){
			header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
			exit();
		}

		$parameter = $_POST;
		$parameter['username'] = $this->get_username_from_cookie();
		
		foreach($parameter as $key => $val){
			$parameter[$key] = escape($val);
		}

		var_dump($parameter);

		$status = $this->model->insert_review($parameter);

		var_dump($status);
	}
}

?>