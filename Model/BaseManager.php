<?php
namespace Model;

use Cool\DBManager;
use PDO;

class BaseManager
{
    protected function setPdo(){
        $dbm = DBManager::getInstance();
        $pdo = $dbm->getPdo();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}