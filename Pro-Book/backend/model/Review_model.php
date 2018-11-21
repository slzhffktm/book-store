<?php

class Review_model {
	public $db;

	public function __construct(){
		require_once("backend/model/db/db_connection.php");
		$this->db = OpenCon();
	}

	public function __destruct(){
		$this->db->close();	
	}

	public function insert_review($parameter){		
		$sql = "INSERT INTO book_review(book_id,username,order_id,rating,comment) VALUES ";
		$sql .= "({$parameter['book_id']},{$parameter['username']},{$parameter['order_id']},{$parameter['rating']},{$parameter['comment']})";

		$this->update_review_book($parameter['order_id']);
		$status = $this->db->query($sql);

		return $status;
	}

	public function update_review_book($order_id){
		$sql = "UPDATE book_order SET is_commented=1 WHERE order_id={$order_id}";

		$this->db->query($sql);
	}

	public function get_review_details($order_id){
		$sql = "SELECT * FROM book_review WHERE order_id='{$order_id}'";

		$result = $this->db->query($sql)->fetch_assoc();

		return $result;
	}

	public function get_book_details($book_id){
		$sql = "SELECT * FROM book WHERE book_id={$book_id}";
		
		$result = $this->db->query($sql)->fetch_assoc();

		return $result;
	}

	public function get_order_details($order_id){
		$sql = "SELECT * FROM book_order WHERE order_id='{$order_id}'";
		echo $sql;
		$result = $this->db->query($sql)->fetch_assoc();

		return $result;
	}
}

?>