<?php
	
	class History_model {
		private $db;

		public function __construct(){
			require_once('backend/model/db/db_connection.php');

			require_once('backend/model/Book/BookService.php');            
            $this->bookService = new BookService();
			$this->db = OpenCon();
		}

		public function get_user_history($page, $limit=10){
			$username = $GLOBALS['user']->getUserName();
			$offset = $page*$limit;

			$sql = "SELECT * FROM book_order WHERE username='{$username}' ORDER BY date DESC";
			
			$result = $this->db->query($sql);
			$book_history = array();
			
			while($history = $result->fetch_assoc()){
				$detailRes = $this->bookService->getBookDetail($history["book_id"]);

				$detail = json_decode($detailRes->return, true);
				$bookHistory = array();
				$bookHistory[]	= json_decode($detailRes->return, true);
				$bookHistory[]	= $history;
				$bookHistory = json_encode($bookHistory,true);
				$bookHistory = json_decode($bookHistory,true);
				array_push($book_history, $bookHistory);
			}

			return $book_history;
		}
	}

?>