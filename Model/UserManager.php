<?php

namespace Model;

use Model\BaseManager;


class UserManager extends BaseManager
{
    public function registerUser($firstname, $lastname, $username, $email, $password)
    {
        $pdo = $this->setPdo();
        $stmt = $pdo->prepare('SELECT * FROM `user` WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            var_dump($count);
            return false;
        } else {
            $stmt = $pdo->prepare('INSERT INTO user(id, firstname, lastname, username, email, password,creation) VALUES(NULL,:firstname, :lastname,:username, :email, :password,:creation)');
            $time = date('Y-m-d H:i:s');
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':creation', $time);
            $stmt->execute();
            return true;
        }
    }

    public function loginUser($email, $password)
    {
        $pdo = $this->setPdo();
        $stmt = $pdo->prepare('SELECT * FROM `user` WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count != 1) {
            return $false;
        } else {
            $result = $stmt->fetch();
            $hash = $result['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['u_id'] = $result['id'];
                $_SESSION['u_first'] = $result['firstname'];
                $_SESSION['u_last'] = $result['lastname'];
                $_SESSION['u_email'] = $result['email'];
                $_SESSION['u_username']= $username['username'];
            } else {
                $error = "Invalid username or password";
                return $error;
            }
        }
    }

}