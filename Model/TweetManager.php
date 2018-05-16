<?php


namespace Model;


class TweetManager extends BaseManager

{
    public function tweetPost()
    {
        $pdo = $this->setPdo();
        $sth = $pdo->prepare('SELECT users.firstname,users.id, posts.* FROM users LEFT JOIN posts ON posts.user = users.id ORDER BY creation_date DESC LIMIT 15 ');
        $sth->execute();
        $comments = $sth->fetchAll();
        return $comments;
    }

    public function addTweet($user, $content)
    {
        $pdo = $this->setPdo();
        $stmt = $pdo->prepare('INSERT INTO posts(id,user,content,creation_date) VALUES (NULL ,:user,:content, NOW())');
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":content", $content);
        $stmt->execute();
        return $stmt;
    }
}
