<?php

namespace Model; 

class ReactionManager extends BaseManager
{
    public function likePosts()
    {
        $pdo = $this->setPdo(); 
        $stmt = $pdo->prepare('SELECT favs , username_id FROM favs INNER JOIN users');
        $sth->bindParam(':user_id', $_SESSION['u_id']); 


        

    }
}