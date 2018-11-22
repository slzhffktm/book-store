<?php
require_once 'backend/model/Auth/Auth_service.php';
require_once 'backend/model/db/db_connection.php';
require_once 'backend/model/User/User_model.php';
require_once 'backend/view/Auth_view.php';
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
            $browser = $this->get_browser_name($_SERVER['HTTP_USER_AGENT']);
            $ip = $this->getRealIpAddr();
            $user_access_token = $_COOKIE["accessToken"];
            $user = $this->as->checkAccessToken($user_access_token,$browser,$ip);
            if($user){
                $this->as->deleteAccessToken($user->getUsername());
                setcookie('accessToken',null);
            }
        }
        unset($_COOKIE['accessToken']);
        setcookie('accessToken',null,-1,'/');
        header("Location: http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
    }

    function get_browser_name($user_agent) {
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
        elseif (strpos($user_agent, 'Edge')) return 'Edge';
        elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
        elseif (strpos($user_agent, 'Safari')) return 'Safari';
        elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
        elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
        return 'Other';
    }

    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    function checkAccessToken(){
        if (isset($_COOKIE['accessToken'])){
            $browser = $this->get_browser_name($_SERVER['HTTP_USER_AGENT']);
            $ip = $this->getRealIpAddr();
            $user_access_token = $_COOKIE["accessToken"];
            $user = $this->as->checkAccessToken($user_access_token,$browser,$ip);
            if($user) {
                return $user;
            }else{
                return false;
            }
        } else{
            return false;
        }
    }
    function createAccessToken($username, $password){
        $browser = $this->get_browser_name($_SERVER['HTTP_USER_AGENT']);
        $ip = $this->getRealIpAddr();
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