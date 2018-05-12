<?php
//
//namespace Controller;
//
//use Cool\BaseController;
//use Model\AddTweetManager;
//
//class AddTweetController extends BaseController
//{
//    public function addTweetAction () {
//        session_start();
////        if (!isset($_SESSION['id'])) {
////            header('Location: ?action=login');
////            exit();
////        }
////
//
//            if (!empty($_POST['comment-content'])) {
//                $manager = new AddTweetManager;
//                $errors = $manager->addTweet(htmlentities($_POST['comment-content']));
//                header('Location: ?action=tweet');
//                exit();
//            }
//
////        $req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
////        $req->execute(array($_POST['pseudo'], $_POST['message']));
////
////// Redirection du visiteur vers la page du minichat
////        header('Location: minichat.php');
//
//    }
//
//}