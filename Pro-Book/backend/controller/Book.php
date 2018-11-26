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
                    $result = $this->bookService->searchBook($keyword);
                    $result = json_encode((array)$result);
                    echo $result;
                    // echo var_dump($result);
                    // echo json_encode('{"Result" :[{"ID" :"JgAMbNSt8ikC","URL" :"https://…ntcover&img=1&zoom=1&edge=curl&source=gbs_api"}]}');
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
            $result = $this->bookService->getBookDetail($book_id);
            $reviews = $this->bookService->getBookReviews($book_id);
            if(isset($_COOKIE["accessToken"])){
                $user = checkAccessToken();
                if($user){
                    $this->bookView->render_book_detail_page($result, $reviews);
                }else{
                    header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
                
                }
            }else{
                header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");

            }
            
        }
    }
?>