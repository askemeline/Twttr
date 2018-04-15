<?php 
namespace Controller;

use Cool\BaseController;
use Model\FormManager;
use Model\UserManager;
class UserController extends BaseController
{
    public function LoginAction()
    {
        if (!empty($_POST['username']) OR !empty($_POST['password'])){
            $userManager = new UserManager();
            $result = $userManager->login($_POST['username'], $_POST['password']);
            if (true === $result){
                return $this->redirectToroute('home');
            } else {
                $data = [
                    'username' => $_POST['username'],
                    'error'    => 'Le mot de passe est invalide'
                ];
                return $this->render('login.html.twig', $data);
            }
        }
        return $this->render('login.html.twig');
    }
    public function RegisterAction()
    {
        if(!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password'])
            || !empty($_POST['password_repeat'])) {
           $userManager = new UserManager();
           $formResult = $userManager->register(htmlentities($_POST['username']), htmlentities($_POST['email']), $_POST['password'], $_POST['password_repeat']);
            if (true !== $formResult) {
                $data = [
                    'errors' => $formResult,
                    'usernamee' => $_POST['username'],
                    'email' => $_POST['email']
                ];
                return $this->render('register.html.twig', $data);
            } else {
                return $this->render('login.html.twig', ["username"=>htmlentities($_POST['username'])]);
            }
        }
        return $this->render('register.html.twig');
    }
    public function LogoutAction()
    {
        $UserManager = new UserManager();
        $UserManager->logout();
    }
}
?>