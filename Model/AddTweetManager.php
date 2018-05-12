<?php
//
//namespace Model;
//
//use Cool\DBManager;
//
//class AddTweetManager {
//    public function addTweet($id, $content)
//    {
//        $pdo = $this->setPdo();
//        $stmt = $pdo->prepare('INSERT INTO posts(id,content,creation_date) VALUES (:id, :content, :creation_date)');
//        $stmt->bindParam(":id", $id);
//        $time = date('Y-m-d H:i:s');
//        $stmt->bindParam(':creation_date', $time);
//        $stmt->bindParam(":content", $content);
//
//        return $stmt->execute();
//
//    }
//}