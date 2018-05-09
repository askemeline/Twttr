<?php

namespace Model; 
use Cool\DBManager;

class TweetManager extends BaseManager{

    public function Tweet($email , $tweetContent, $id )
    {
        $pdo = $this->setPdo(); 
        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE email = :email');
        $stmt->bindParam(':email',$email); 
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count > 0){
            var_dump($count);
            return false;
        } else {
            $stmt = $pdo->prepare('INSERT INTO tweet(id, retweet_id, user_id, tweet_text, date,type) VALUES(NULL, :retweet_id ,:user_id, :tweet_text, :date, :type)');
            $date = date('YYYY-MM-DD HH:MM:SS');
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':retweet_id', $retweet);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':tweet_text', $tweet_text);
            $stmt->bindParam(':type', $type);

            $stmt->execute();
            return true;
        }
    }


}
