<?php

namespace Model;


class TweetManager extends BaseManager

{
    public function tweet()
    {
        $pdo = $this->setPdo();
        $req = $pdo->query('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date ASC ');
//var_dump($req);
        $result = $req->fetchAll();
        // var_dump('<pre>', $result);
        return $result;

    }


}