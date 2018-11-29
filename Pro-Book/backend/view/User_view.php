<?php

class User_view {
	public $view_file = "frontend/user/profile/profile.php";
	public $register_file = "frontend/register/register.php";
	public $register_google_file = "frontend/register/register_google.php";
	public $login_file = "frontend/login/login.php";
	public $edit_file = "frontend/user/edit/edit.php";
	
	public function render_profile_page($user){
		require_once($this->view_file);	
	}
	public function render_register_page(){
		require_once($this->register_file);	
	}
	public function render_login_page(){
		require_once($this->login_file);	
	}
	public function render_edit_profile_page($user){
		require_once($this->edit_file);	
	}
	public function render_register_google_page(){
		require_once($this->register_google_file);	
	}
}

?>