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

    public function addTweet($user, $content)
    {
        $pdo = $this->setPdo();
        $stmt = $pdo->prepare('INSERT INTO posts(id,user,content,creation_date) VALUES (NULL ,:user,:content, NOW())');
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":content", $content);
//        $time = date('Y-m-d H:i:s');
//        $stmt->bindParam(':creation_date', $time);
        //  $stmt->execute();
        //$comments = $sth->fetchAll();
        $stmt->execute();
        return $stmt;
    }

}
