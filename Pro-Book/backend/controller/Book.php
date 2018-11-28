<?php 

    class Book {
        private $bookService;
        private $bookView;
        private $auth_view;

        function __construct() {
            require_once('backend/model/Book/BookModel.php');
            require_once('backend/model/Book/BookService.php');            
            require_once('backend/view/Book_view.php');
            require_once('backend/model/Auth/Auth_service.php');
            require_once('backend/view/Auth_view.php');
            require_once('backend/controller/helper.php');
            $this->bookService = new BookService();
            $this->bookView = new Book_view();
            $this->auth_view = new Auth_view();
        }

        function searchBook() {
            header('Content-Type: application/json');
            $keyword = $_GET['keyword'];

            if(isset($_COOKIE["accessToken"])){
                $user = checkAccessToken();
                if($user){
                    $results = $this->bookService->searchBook($keyword);
                    $results = json_decode($results->return, true);
                    $results = $results["Result"];

                    foreach($results as $result) {
                        $rating = $this->bookService->getBookDetailReview($result["ID"]);
                        $result["Rating"] = $rating["rating"];
                        $result["Voters"] = $rating["voters"];
                    }

                    $results = json_encode($results);
                    echo $results;
                }else{
                    header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
                }
            } else {
                header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
            }
        }

        function index() {
            if(isset($_COOKIE["accessToken"])){
                $user = checkAccessToken();
                if($user){
                    $this->bookView->render_search_page();
                }else{
                    header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
                }
            }else{
                header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");

            }
        }

        function detail() {
            $book_id = $_GET['id'];

            if(isset($_COOKIE["accessToken"])){
                $user = checkAccessToken();
                if($user){

                    $result = $this->bookService->getBookDetail($book_id);
                    $result = json_decode($result->return, true);

                    $rating = $this->bookService->getBookDetailReview($book_id);
                    $result["Rating"] = $rating["rating"];

                    $reviews = $this->bookService->getBookReviews($book_id);

                    $genres = explode('/', $result["Category"]);
                    $recommendation = $this->bookService->getRecommendation($genres);
                    $recommendation = json_decode($recommendation->return, true);
                    $rating = $this->bookService->getBookDetailReview($recommendation["ID"]);
                    $recommendation["Rating"] = $rating["rating"];
                    $recommendation["Voters"] = $rating["voters"];

                    $this->bookView->render_book_detail_page($result, $reviews, $recommendation);

                }else{
                    header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
                }
            }else{
                header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
            }
        }
    }
?>