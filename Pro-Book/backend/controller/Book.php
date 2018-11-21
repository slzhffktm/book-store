<?php 

    class Book {
        private $bookService;
        private $bookView;
        private $as;
        private $auth_view;

        function __construct() {
            require_once('backend/model/Book/BookModel.php');
            require_once('backend/model/Book/BookService.php');            
            require_once('backend/view/Book_view.php');
            require_once('backend/model/Auth/Auth_service.php');
            require_once('backend/view/Auth_view.php');
            $this->bookService = new BookService();
            $this->bookView = new Book_view();
            $this->as = new AuthService();
            $this->auth_view = new Auth_view();
        }

        function searchBook() {
            $keyword = $_GET['keyword'];
            $result = $this->bookService->searchBook($keyword);
            if(isset($_COOKIE["accessToken"])){
                $user_access_token = $_COOKIE["accessToken"];
                $user = $this->as->checkAccessToken($user_access_token);
    
                if($user){
                    $this->bookView->render_search_result_page($result);
                }else{
                    header("Location: http://localhost/tugasbesar1_2018/index.php/Auth/index");
                    // $this->auth_view->render_login_page();
                }
            } else {
                // $this->auth_view->render_login_page();
                header("Location: http://localhost/tugasbesar1_2018/index.php/Auth/index");
            }
        }

        function index() {
            if(isset($_COOKIE["accessToken"])){
                $user_access_token = $_COOKIE["accessToken"];
                $user = $this->as->checkAccessToken($user_access_token);
                if($user){
                    $this->bookView->render_search_page();
                }else{
                    header("Location: http://localhost/tugasbesar1_2018/index.php/Auth/index");
                }
            }else{
                header("Location: http://localhost/tugasbesar1_2018/index.php/Auth/index");
                
            }
        }

        function detail() {
            $book_id = $_GET['id'];
            $result = $this->bookService->getBookDetail($book_id);
            $reviews = $this->bookService->getBookReviews($book_id);
            if(isset($_COOKIE["accessToken"])){
                $user_access_token = $_COOKIE["accessToken"];
                $user = $this->as->checkAccessToken($user_access_token);
                if($user){
                    $this->bookView->render_book_detail_page($result, $reviews);
                }else{
                    header("Location: http://localhost/tugasbesar1_2018/index.php/Auth/index");
                
                }
            }else{
                header("Location: http://localhost/tugasbesar1_2018/index.php/Auth/index");

            }
            
        }
    }
?>