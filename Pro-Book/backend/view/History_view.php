<?php

	class History_view {
		private $view;

		public function __construct(){
			$this->view = 'frontend/user/history/index.php';
		}

		public function render_history_page($history){
			require_once($this->view);
		}
	}	

?>