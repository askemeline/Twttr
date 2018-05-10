<?php
namespace Model;
use Cool\DBManager;
class UserManager extends BaseManager{
    public function registerUser($firstname,$lastname,$email,$password){
        $pdo = $this->setPdo();
        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count > 0){
            var_dump($count);
            return false;
        } else {
            $stmt = $pdo->prepare('INSERT INTO users(id, creation, firstname, lastname, email, password) VALUES(NULL, :creation ,:firstname, :lastname, :email, :password)');
            $time = date('Y-m-d H:i:s');
            $stmt->bindParam(':creation', $time);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return true;
        }
    }
    public function loginUser($email,$password){
        $pdo = $this->setPdo();
        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count != 1){
            return $false;
        } else {
            $result = $stmt->fetch();
            $hash = $result['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['u_id'] = $result['id'];
                $_SESSION['u_first'] = $result['firstname'];
                $_SESSION['u_last'] = $result['lastname'];
                $_SESSION['u_email'] = $result['email'];
            } else {
                $error = "Invalid username or password";
                return $error;
            }
        }
    }
    public function showUsers()
    {
        $pdo = $this->setPdo();
        $stmt = $pdo->prepare("SELECT `firstname` FROM `users`ORDER BY creation DESC   ");
        $stmt->execute();
        $result = $stmt->fetchAll();
        // var_dump('<pre>',$result);
        return $result;
    }
}