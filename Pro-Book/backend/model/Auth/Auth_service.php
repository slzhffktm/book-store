<?php
require_once 'backend/model/Auth/Auth_model.php';
require_once 'backend/model/User/User_model.php';


class AuthService {
    public function createAccessToken($username, $password) {
        $conn = OpenCon();
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($sql);
        if($result->num_rows === 1) {
            $val = mysqli_fetch_assoc($result);
            $user = new User_model($val['name'], $val['username'], $val['email'], $val['hashedPassword'], $val['address'], $val['phone'],$val['image_url'], $val['card']);
            if($user->checkPassword($password)) {
                $accesToken = new Auth_model($username);
                $accesToken->save($conn);
                CloseCon($conn);
                return $accesToken;
            } else{
                return false;
            }
        } else {
            return false;
        }
        CloseCon($conn);
        return null;
    }

    public function checkAccessToken($token) {
        $conn = OpenCon();
        $currentTimestamp = date("Y-m-d H:i:s",strtotime("now"));
        $sql = "SELECT * FROM auth NATURAL JOIN user WHERE token = '$token' AND expiredAt > '$currentTimestamp'";
        $result = $conn->query($sql);
        if($result->num_rows === 1){
            $val = mysqli_fetch_assoc($result);
            CloseCon($conn);
            return new User_model($val['name'], $val['username'], $val['email'], $val['hashedPassword'], $val['address'], $val['phone'],$val['image_url'], $val['card']);
        }
        CloseCon($conn);
        return false;
    }

    public function deleteAccessToken($username) {
        $conn = OpenCon();
        $sql = "DELETE FROM auth WHERE username='$username'";
        $result = $conn->query($sql);
        CloseCOn($conn);
    }


}


?>