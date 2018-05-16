<?php

namespace Model; 

class ReactionManager extends BaseManager
{
    public function likePosts()
    {
        $pdo = $this->setPdo(); 
        $stmt = $pdo->prepare('INSERT INTO favs(user, posts) VALUES (:user,:posts)');
        $stmt = $pdo->prepare('SELECT favs.* , username_id FROM favs ');


        $sth->bindParam(':user_id', $_SESSION['u_id']); 


        

    }
}