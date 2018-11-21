<?php
require_once 'backend/model/User/User_model.php';

class User_service {
    public function register($name, $username, $email, $password, $address, $phone) {
        $conn = OpenCon();
        $sql = "SELECT name FROM user WHERE username = '$username' or email = '$email'";
        $result = $conn->query($sql);
        $defaultProfilePath = "/tugasbesar1_2018/frontend/img_resource/default-profile.jpg";
        if($result->num_rows === 0) {
            $hashedPassword =  $this->hashPassword($password);
            $user = new User_model($name, $username, $email, $hashedPassword, $address, $phone, $defaultProfilePath);
            $user->save($conn, $user);
            return $user;
        } else {
            return NULL;
        }
        CloseCon($conn);
    }

    public function edit($user, $name, $address, $phone, $imageUrl) {
        $conn = OpenCon();
        $user->setName($name);
        $user->setAddress($address);
        $user->setPhone($phone);
        if($imageUrl){

            $user->setImageUrl($imageUrl);
        }
        $user->update($conn);
        CloseCon($conn);
        return $user;
    }

    public function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function checkUsernameAvailability($username) {
        $conn = OpenCon();
        $sql = "SELECT name FROM user WHERE username = '$username'";
        $result = $conn->query($sql);
        if($result->num_rows === 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function checkEmailAvailability($email) {
        $conn = OpenCon();
        $sql = "SELECT name FROM user WHERE email = '$email'";
        $result = $conn->query($sql);
        if($result->num_rows === 0) {
            echo "true";
        } else {
            echo "false";
        }
    }
    public function getUserProfile($username) {
        $conn = OpenCon();
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($sql);
        if($result->num_rows === 1) {
            $val = mysqli_fetch_assoc($result);
            CloseCon($conn);
            return new User_model($val['name'], $val['username'], $val['email'], $val['hashedPassword'], $val['address'], $val['phone'], $val['image_url']);
        } else {
            CloseCon($conn);
            return NULL;
        }
    }

}
?>
