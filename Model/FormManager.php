<?php 	
namespace Model;	
use Model\UserManager;	
class FormManager	
{	
    public function checkLogin($username, $password)	
    {	
        if (empty($password) OR empty($username)) {	
            return false;	
        }	
        $userManager = new UserManager();	
        $usersByUsername = $userManager->getUserByUsername($username);	
        if ($password == $usersByUsername['password']) {	
            return $usersByUsername['user_id'];	
        } else if (empty($usersByUsername)) {	
            return false;	
        } else {	
            return false;	
        }	
    }	
}	
?> 