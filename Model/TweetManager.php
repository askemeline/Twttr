<?php


namespace Model;


class TweetManager extends BaseManager

{
    public function tweetPost() {

        $pdo = $this->setPdo();
        $sth = $pdo->prepare('SELECT users.firstname, posts.content FROM users RIGHT JOIN posts ON posts.id = users.id');
        $sth->execute();
       // $sth->execute([$id]);
        $comments = $sth->fetchAll();
        return $comments;
    }

    public function addTweet()
    {
        $pdo = $this->setPdo();
        $stmt = $pdo->prepare('INSERT INTO posts(id,content,creation_date) VALUES (NULL, ?, NOW())');
       // $stmt->execute();
        //$comments = $sth->fetchAll();
        $stmt->execute(array($_POST['comment-content']));
        return $stmt;


    }

}

