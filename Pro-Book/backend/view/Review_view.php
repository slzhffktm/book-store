<?php

class Review_view {
	public $view_file = "frontend/review/review.php";

	public function render_review_page($book, $purchase_id, $review = array()){
		require_once($this->view_file);	
	}
}

?>