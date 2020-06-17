<?php
namespace Core;

use \PDO;

class DataBase
{
    protected function getConnection()
    {
        try {
            $bdd = new PDO("mysql:host=127.0.0.1;dbname=piePHP;charset=utf8" , 'admin', 'admin');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfuly";
            $GLOBALS['bdd'] = $bdd;
            return $GLOBALS['bdd'];

        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

// $bdd = new Database();
// $bdd->getConnection();