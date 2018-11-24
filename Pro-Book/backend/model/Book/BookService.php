<?php
    require_once 'backend/model/db/db_connection.php';
    class BookService {

        private $client = Null;

        public function __construct() {
            $this->client = connectToBookWebService();
        }

        public function searchBook($keyword) {
<<<<<<< HEAD
            $params = array("arg0" => $keyword);
            return $this->client->searchBook($params);
        }

        public function getBookDetail($book_id) {
            $params = array("arg0" => $book_id);
            return $this->client->getBookDetail($params);
=======
            return $this->client->searchBook($keyword);
        }

        public function getBookDetail($book_id) {
            return $this->client->getBookDetail($book_id);
>>>>>>> d5afd3f7f45d53935bfa84009a6d99c3c02d3783
        }

        // TODO
        public function getBookReviews($book_id) {
            $conn = OpenCon();
            $sql = "SELECT user.username, user.image_url, book_review.rating, book_review.comment 
                    FROM book INNER JOIN book_review ON book.book_id = book_review.book_id INNER JOIN user ON book_review.username = user.username 
                    WHERE book.book_id = $book_id ORDER BY order_id DESC";
            $result = mysqli_fetch_all($conn->query($sql), MYSQLI_ASSOC);
            CloseCon($conn);
            return $result;
        }
    }
?>