<?php
namespace Model;
use Cool\DBManager;
class UserManager
{
    public function getUserByUsername($username)
    {
        $dbm = DBManager::getInstance();
        $pdo = $dbm->getPdo();
        $result = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $result->execute([':username' => $username]);
        $users = $result->fetch();
        return $users;
    }
    public function login($username, $password)
    {
        if (empty($password) OR empty($username)) {
            return false;
        }
        $salt = 'gvu.site';
        $pw_hash = md5($salt . $password);
        $userManager = new UserManager();
        $usersByUsername = $userManager->getUserByUsername($username);
        if ($pw_hash == $usersByUsername['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $usersByUsername['user_id'];
            return true;
        } else if (empty($usersByUsername)) {
            return false;
        } else {
            return false;
        }
    }
    public function logout()
    {
        session_destroy();
    }
    public function register($username, $email, $password, $passwordRepeat)
    {
        $errors = [];
        if (strlen($username) < 4 OR strlen($username) > 30) {
            $errors[] = 'Le nom d\'utilisateur choisit est trop petit ou trop grand';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email invalide';
        }
        if (strlen($email) > 250) {
            $errors[] = 'L\'email choisit est trop grand';
        }
        if (strlen($password) < 4 || strlen($password) > 30) {
            $errors[] = 'Le mot de passe choisit est trop petit ou trop grand';
        }
        if ($password !== $passwordRepeat) {
            $errors[] = 'Les deux mots de passe doivent être les mêmes';
        }
        if (empty($errors)) {
            $dbm = DBManager::getInstance();
            $pdo = $dbm->getPdo();
            $salt = 'gvu.site';
            $pw_hash = md5($salt . $password);
            $creation = date('Y-m-d H:i:s');
            $role = "user";
            $tokenPassword = bin2hex(openssl_random_pseudo_bytes(16));
            $stmt = $pdo->prepare("INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `creation`, `role`, `token_password`) VALUES (NULL, :username, :email, :password, :creation, :role, :tokenPassword);");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $pw_hash);
            $stmt->bindParam(':creation', $creation);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':tokenPassword', $tokenPassword);
            $stmt->execute();
            return true;
        } else {
            return $errors;
        }
    }
}