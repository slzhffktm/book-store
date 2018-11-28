<?php
    require_once 'backend/model/db/db_connection.php';
    class BookService {

        private $client;

        public function __construct() {
            $this->client = connectToBookWebService();
        }

        public function searchBook($keyword) {
            $params = array("arg0" => $keyword);
            return $this->client->searchBook($params);
        }

        public function getBookDetail($book_id) {
            $params = array("arg0" => $book_id);
            return $this->client->getBookDetail($params);
        }

        public function getRecommendation($genres) {
            $params = array("arg0" => $genres);
            return $this->client->getRecommendation($params);
        }

        public function getBookDetailReview($book_id) {
            $conn = OpenConPDO();
            $sql = "SELECT COUNT(order_id) AS voters, AVG(rating) AS rating FROM book_review WHERE book_id = :book_id GROUP BY book_id";
            $query = $conn->prepare($sql);
            $parameters = array(':book_id' => $book_id);
            
            $query->execute($parameters);

            return $query->fetch();
        }

        // TODO
        public function getBookReviews($book_id) {
            $conn = OpenConPDO();
            $sql = "SELECT user.username, user.image_url, book_review.rating, book_review.comment 
                    FROM book INNER JOIN book_review ON book.book_id = book_review.book_id INNER JOIN user ON book_review.username = user.username 
                    WHERE book.book_id = :book_id ORDER BY order_id DESC";
            $query = $conn->prepare($sql);
            $parameters = array(':book_id' => $book_id);
            
            $query->execute($parameters);

            return $query->fetch();
        }
    }
?>