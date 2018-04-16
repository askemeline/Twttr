<?php
namespace Model;
use Cool\DBManager;

class FormManager
{
    public function CheckUsername($username)
    {
        $dbm = DBManager::getInstance();
        $pdo = $dbm->getPdo();
        $result = $pdo->query("SELECT username FROM users");
        var_dump($result); 
        $posts = $result->fetchAll(PDO::FETCH_COLUMN, 0);
        foreach ($posts as $value) {
            if ($value === $username) {
                return false;
            }
        }
        return true;
    }
    public function CheckPassword($username, $password)
    {
        $dbm = DBManager::getInstance();
        $pdo = $dbm->getPdo();
        $result = $pdo->query("SELECT password FROM user where username = '$username'");
        $posts = $result->fetch(PDO::FETCH_COLUMN, 0);
        if ($posts === $password) {
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }
    public function Register($firstname, $lastname, $username, $email, $password, $password_repeat)
    {
        $dataerrors = [];
        if (strlen($username) < 4) {
            array_push($dataerrors, "4 letters needed for an username");
        }
        if (strlen($firstname) < 1) {
            array_push($dataerrors, "Enter a first name");
        }
        if (strlen($lastname) < 1) {
            array_push($dataerrors, "Enter a last name");
        }
        if (strlen($password) < 6) {
            array_push($dataerrors, "Password too short(min6)");
        }
        if ($password !== $password_repeat) {
            array_push($dataerrors, "Passwords does not match");
        }
        if ($dataerrors !== []) {
            return $dataerrors;
        } else {

            $dbm = DBManager::getInstance();
            $pdo = $dbm->getPdo();
            $result = $pdo->prepare('INSERT INTO `user` (`id`, `firstname`, `lastname`,`username`, `email`, `password`, `creation` ) VALUES (NULL, :firstname, :lastname, :username ,:email  ,:password ,:creation )');
            $result->bindParam(':firstname', $firstname);
            $result->bindParam(':lastname', $lastname);
            $result->bindParam(':email', $email);
            $result->bindParam(':password', $password);
            $result->bindParam(':username', $username);
            $result->execute();
            return true;
        }
    }
}
