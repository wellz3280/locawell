<?php
     
     namespace Weliton\Locawell\Infra\Persistence;
     use PDO;
    use PDOException;
 
class Connection
{
  public static function Conecta():PDO
  {
       try{

        $conn = new PDO('mysql:host=localhost;dbname=locawell','weliton','well1006');
        return $conn;
      }catch(PDOException $e){
        echo "ERROR: ". $e->getMessage();
      }
  }
}
