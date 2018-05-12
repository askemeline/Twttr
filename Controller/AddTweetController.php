<?php

namespace Controller;

use Cool\BaseController;
use Model\AddTweetManager;

class AddTweetController extends BaseController
{
    public function addTweetAction () {
        session_start();
        if (!isset($_SESSION['id'])) {
            header('Location: ?action=login');
            exit();
        }

        if (isset($_GET['id']) && $id = intval($_GET['id']))
        {
            if (!empty($_POST['comment-content'])) {
                $manager = new AddTweetManager;
                $errors = $manager->addTweet($_SESSION['id'], $id, htmlentities($_POST['comment-content']));
                header('Location: ?action=tweet' . $id);
                exit();
            }
        }


    }

}