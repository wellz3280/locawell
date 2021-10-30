<?php

    namespace Weliton\Locawell\Infra\Persistence;

use PDO;

class Connection
{
   public static function createConnection():PDO
    {
        return $conexao = new PDO('mysql:localhost;dbname:locawell','weliton','well1006');
        
    }
}