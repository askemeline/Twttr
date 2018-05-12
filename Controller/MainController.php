<?php

namespace Controller;

use Cool\BaseController;
use Model\UserManager;
use Model\TweetManager;
use Model\AddTweetManager;

class MainController extends BaseController
{
    public function homeAction()
    {
        $data = [];
        session_start();
        if (isset($_SESSION['u_id'])) {
            $data['session'] = $_SESSION;
            $manager = new UserManager();
            //$manager->showUsers();
            $result = $manager->showUsers();
            $data['users'] = $result;
            //  var_dump('<pre>',$result);
        }
        return $this->render('home.html.twig', $data);
    }

    public function registerAction()
    {
        $data = [];
        session_start();
        if (isset($_SESSION['u_id'])) {
            $this->redirectToRoute('home');
        }
        if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $manager = new UserManager();
            $users = $manager->registerUser($firstname, $lastname, $email, $password);
            if ($users === true) {
                error_log("[" . date('Y-m-d H:i:s') . "] " . $email . " viens de s'inscrire", 3, "log/access.log");
            } else {
                $data['errors'] = "Something Bad Happend, Please Try later !";
                error_log("[" . date('Y-m-d H:i:s') . "] " . "l'inscription de " . $email . " a echouer", 3, "log/security.log");
                return $this->render('register.html.twig', $data);
            }
            $this->redirectToRoute('home');
        }
        return $this->render('register.html.twig', $data);
    }

    public function loginAction()
    {
        $data = [];
        session_start();
        if (isset($_SESSION['u_id'])) {
            $this->redirectToRoute('home');
            error_log("[" . date('Y-m-d H:i:s') . "] " . "l'utilisateur " . $_SESSION['u_email'] . " a tenter d'aller sur un lieu interdit", 3, "log/security.log");
        }
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $manager = new UserManager();
            $loginUser = $manager->loginUser($email, $password);
            if ($loginUser === false) {
                $data['errors'] = "Something Bad Happend, Please Try later !";
                error_log("[" . date('Y-m-d H:i:s') . "] " . "l'utilisateur " . $email . " a echouer la connexion", 3, "log/security.log");
            } else {
                error_log("[" . date('Y-m-d H:i:s') . "] " . "l'utilisateur " . $_SESSION['u_email'] . " s'est connecter", 3, "log/access.log");
                $this->redirectToRoute('home');
            }
        }
        return $this->render('login.html.twig', $data);
    }

    public function logoutAction()
    {
        session_start();
        error_log("[" . date('Y-m-d H:i:s') . "] " . "l'utilisateur " . $_SESSION['u_email'] . " s'est deconnecter", 3, "log/access.log");
        session_unset();
        session_destroy();
        $this->redirectToRoute('home');
    }
//    public function tweetAction()
//    {
//        $data = [];
//        session_start();
//        if (isset($_SESSION['u_id'])) {
//            $data['session'] = $_SESSION;
//            $manager = new TweetManager();
//            //$manager->showUsers();
//            $result = $manager->tweet();
//            $data['posts'] = $result;
//            //   var_dump('<pre>',$result);
//        }
//        return $this->render('tweet.html.twig', $data);
//
//
//    }
//    public function tweetAction()
//    {
//       // $data = [];
//        session_start();
//        if (isset($_SESSION['u_id'])) {
////            $data['session'] = $_SESSION;
//            $post_manager = new TweetManager();
//            $post = $post_manager->tweet();
//            return $this->render('tweet.html.twig', [
//                'post'      => $post,
//                'data'  => $post_manager->getCommentsById()
//            ]);
//            $this->redirectToRoute('home');
//
//        }
//        //return $this->render('tweet.html.twig', $data);
//
//
//    }
    public function tweetAction()
    {
        $data = [];
        session_start();
        if (isset($_SESSION['u_id'])) {
            $data['session'] = $_SESSION;
            $manager = new TweetManager();
            //$manager->showUsers();
//            $result = $manager->tweet();
//            $data['toto'] = $result;
//            var_dump('<pre>',$result);
            $post = $manager->tweetPost();
            $data['data'] = $post;
            //      var_dump('<pre>',$post);
        }
        return $this->render('tweet.html.twig', $data);
    }

    function addTweetAction()
    {
        session_start();
        if (!empty($_POST['comment-content'])) {
            $manager = new TweetManager();
            $errors = $manager->addTweet(htmlentities($_POST['comment-content']));
            var_dump($errors);
            header('Location: ?action=tweet');
            exit();
        }
        }



}