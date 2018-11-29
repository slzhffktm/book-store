<?php 
    class Book_view {
        public $search_result_file = "frontend/book/search/index.php";
        public $search_file = "frontend/book/index.php";
        public $detail_file = "frontend/book/detail/index.php";
        public function render_search_result_page($result) {
            require_once($this->search_result_file);
        }

        public function render_search_page() {
            require_once($this->search_file);
        }

        public function render_book_detail_page($result, $reviews, $recommendation) {
            require_once($this->detail_file);
        }
    }
?>
