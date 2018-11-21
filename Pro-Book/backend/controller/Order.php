<?php
    class Order{
        private $orderService;

        function __construct() {
            require_once('backend/model/Order/OrderModel.php');
            require_once('backend/model/Order/OrderService.php');

            $this->orderService = new OrderService;
        }

        function orderHistory() {
            $user_id = $_GET["user_id"];
            $result = $this->orderService->history($user_id);
            return $result;
        }

        function orderBook() {
            $username = $GLOBALS['user']->getUserName();
            if(!$username){
                echo "false";
                exit();
            }else {
                $username = $_POST["username"];
                $book_id = $_POST["book_id"];
                $amount = $_POST["amount"];
                $username = strval($username);
                $order_id = $this->orderService->orderBook($username, $book_id, $amount);
                echo "$order_id";
            }
        }
    }


?>