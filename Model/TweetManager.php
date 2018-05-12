<?php


namespace Model;


class TweetManager extends BaseManager

{
//    public function tweet()
//    {
//        $pdo = $this->setPdo();
//        $req = $pdo->query('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE post_id = ? ORDER BY creation_date ASC ');
////var_dump($req);
////        $req->execute([$id]);
//
//        $result = $req->fetchAll();
//        // var_dump('<pre>', $result);
//        return $result;

   // }
    public function getCommentsById() {

        $pdo = $this->setPdo();
        $sth = $pdo->prepare('SELECT users.firstname, posts.content FROM users RIGHT JOIN posts ON posts.id = users.id');
        $sth->execute();
       // $sth->execute([$id]);
        $comments = $sth->fetchAll();
        return $comments;
    }

}

