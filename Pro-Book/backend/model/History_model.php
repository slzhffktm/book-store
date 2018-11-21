<?php
	
	class History_model {
		private $db;

		public function __construct(){
			require_once('backend/model/db/db_connection.php');

			$this->db = OpenCon();
		}

		public function get_user_history($page, $limit=10){
			$username = $GLOBALS['user']->getUserName();
			$offset = $page*$limit;

			$sql = "SELECT * FROM book_order JOIN book ON book_order.book_id = book.book_id WHERE username='{$username}' ORDER BY date DESC";

			$result = $this->db->query($sql);
			$book_history = array();

			while($history = $result->fetch_assoc()){
				array_push($book_history, $history);
			}

			return $book_history;
		}
	}

?>