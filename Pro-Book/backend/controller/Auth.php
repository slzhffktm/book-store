<?php
require_once 'backend/model/Auth/Auth_service.php';
require_once 'backend/model/db/db_connection.php';
require_once 'backend/model/User/User_model.php';
require_once 'backend/view/Auth_view.php';
require_once 'backend/controller/helper.php';
require_once 'backend/view/Book_view.php';
class Auth{
    private $as;
    private $view;
    private $book_view;
    function __construct(){
        $this->as = new AuthService;
        $this->view = new Auth_view;
        $this->book_view = new Book_view;
    }
    function index(){
        $this->view->render_login_page();
    }

    function login(){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if($this->createAccessToken($username,$password)){
            header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Book/index");
        }else{
            echo "<script>
                alert('Wrong username or password');
                </script>";
            $this->view->render_login_page();
        }
    }

    function logout(){
        if(isset($_COOKIE["accessToken"])){
            $user = checkAccessToken();
            if($user){
                $this->as->deleteAccessToken($user->getUsername());
                setcookie('accessToken',null);
            }
        }
        unset($_COOKIE['accessToken']);
        setcookie('accessToken',null,-1,'/');
        header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
    }

    
    function createAccessToken($username, $password){
        $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);
        $ip = getRealIpAddr();
        $authToken = $this->as->createAccessToken($username,$password, $browser, $ip);
        if($authToken){
            setcookie("accessToken",$authToken->getToken(),time()+86400, "/");
            return true;
        }else{
            return false;
        }
    }

}


?>