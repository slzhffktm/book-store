<?php

class Auth_view {
	public $login_file = "frontend/login/login.php";
	public function render_login_page(){
		require_once($this->login_file);	
	}
}

?>