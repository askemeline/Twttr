<?php

namespace Model; 

class ReactionManager extends BaseManager
{
    public function likePosts()
    {
        $post_id = $_POST["id"]; 
        $user_id = $_SESSION["u_id"]; 
        $pdo = $this->setPdo(); 
        $stmt = $pdo->prepare('SELECT likePost FROM favorite WHERE'); 
    }
}