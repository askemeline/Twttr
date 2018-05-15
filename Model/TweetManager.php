<?php


namespace Model;


class TweetManager extends BaseManager

{
    public function tweetPost()
    {
//        $pdo = $this->setPdo();
//       // $sth = $pdo->prepare('SELECT users.firstname,users.id, posts.user,posts.content FROM users INNER JOIN posts ON posts.user = users.id WHERE users.id = :user_id ORDER BY creation_date DESC LIMIT 10');
//        $sth = $pdo->prepare('SELECT posts.*, users.firstname FROM posts INNER JOIN users ON user = :user_id ORDER BY creation_date DESC LIMIT 10');
//        $sth->bindParam(':user_id', $_SESSION['u_id']);
//        $sth->execute();
//        // $sth->execute([$id]);
//        $comments = $sth->fetchAll();
//        return $comments;
        $pdo = $this->setPdo();
        //$sth = $pdo->prepare('SELECT users.firstname,users.id, posts.user,posts.content FROM users RIGHT JOIN posts ON posts.user = users.id ORDER BY creation_date DESC ');
        $sth = $pdo->prepare('SELECT users.firstname,users.id, posts.* FROM users LEFT JOIN posts ON posts.user = users.id ORDER BY creation_date DESC LIMIT 15 ');
        $sth->execute();
        $comments = $sth->fetchAll();
        return $comments;
    }
    /*class BooksModel
    {
    
        public function isFav()
            {
                $book_id = $_GET['id']; // from url
                $user_id=$_SESSION['user_id'];
                $sql = "SELECT isFav FROM favourite WHERE book_id = :book_id AND user_id = :user_id AND isFav = 1";
                $query = $this->db->prepare($sql);
                $query->bindParam(':book_id', $book_id);
                $query->bindParam(':user_id', $user_id);
                $query->execute();
    
                if ($query->rowCount() == 1) {
                        $css = 'btn-success';
                        echo $css; //for testing
                    } else {
                        $css = 'btn-default';
                        echo $css; // for testing
                    }
            }
    }*/ 
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
//    public function RTtweetPost()
//    {
//        $pdo = $this->setPdo();
//        // $sth = $pdo->prepare('SELECT users.firstname,users.id, posts.user,posts.content FROM users INNER JOIN posts ON posts.user = users.id WHERE users.id = :user_id ORDER BY creation_date DESC LIMIT 10');
//        $sth = $pdo->prepare('SELECT rtposts.*, users.firstname FROM rtposts INNER JOIN users ON user = :user_id ORDER BY creation_date DESC LIMIT 10');
//        $sth->bindParam(':user_id', $_SESSION['u_id']);
//        $sth->execute();
//        // $sth->execute([$id]);
//        $rtcomments = $sth->fetchAll();
//        return $rtcomments;
//    }
//
//    public function addRTTweet($user, $content)
//    {
//        $pdo = $this->setPdo();
//        $stmt = $pdo->prepare('INSERT INTO rtposts(id,user,content,creation_date) VALUES (NULL ,:user,:content, NOW())');
//        $stmt->bindParam(":user", $user);
//        $stmt->bindParam(":content", $content);
////        $time = date('Y-m-d H:i:s');
////        $stmt->bindParam(':creation_date', $time);
//        //  $stmt->execute();
//        //$comments = $sth->fetchAll();
//        $stmt->execute();
//        return $stmt;
//    }


}
