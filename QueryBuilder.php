<?php

use Weliton\Locawell\Infra\Persistence\Connection;


    require 'vendor/autoload.php';

class QueryBuilder
{
    private \PDO $pdo;

    private array $columns = ['*'];
    private string $table = '';
    private string $where = '';
    private string $query = '';
    private array $data;
    private string $service;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function columns(array $columns = ['*']): QueryBuilder
    {
        $this->columns = $columns;
        
        return $this;
    }

    public function from(string $table): QueryBuilder
    {
        $this->table = $table;

        return $this;
    }

    public function where(string $columns,string $condition ,  string $value): QueryBuilder
    {
       
        if($condition == 'WHERE'){$this->where = " WHERE {$columns} = {$value} ";}
        

        return $this;
    }
    //método para tratar o dados
    private function treatInsertion(array $data ,string $selector):array|bool
    {
       // var_dump($data);
        //Pegando as colunas do array
        if($selector =='columns'){
            
            $columns= [];
            foreach($data as $colls => $content){
                
                $columns[] = $colls;
                
            }
            return $columns;
        }

        if($selector =='parameters'){
            
            $columns= [];
            foreach($data as $colls => $content){
                
                $columns[] = ":".$colls;
                
            }
            return $columns;
        }

        if($selector == 'content'){
            //pegando o conteudo do array
            $content = [];
            foreach($data as $datas){
                $content [] = $datas;
               
            }
            return $content;
        }
    }

    public function insert(array $data): QueryBuilder
    {
       $this->data = $data;
       
       $this->filds = implode(',',$this->treatInsertion($data,'columns')); 
       
       $this->param = implode(',',$this->treatInsertion($data,'parameters'));

       $this->values = implode(',',$this->treatInsertion($data,'content'));
        
       
       return $this;
    }

    public function get(string $service): array|bool
    {
        if($service == 'select'){
            $select = "SELECT " . implode(",", $this->columns) . " ";
            $table   = "FROM {$this->table} ";
            
            $this->query = $select.$table.$this->where;
            $result = $this->pdo->query($this->query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        if($service == 'insert'){
            $insert = "INSERT INTO ";
            $table = $this->table;
            $columns = " (".$this->filds.") ";
            $parameters = " VALUES (". $this->param.");";
            
            $result= $this->pdo->prepare($this->query = $insert.$table.$columns.$parameters);

            $param =  explode(',',$this->param);
            $values = explode(',', $this->values);
            
            foreach(array_combine($param,$values)as $p => $v){
                $result->bindValue("{$p}",$v);
            }
            
            $result->execute();
            return true;
        }
        
    }
}

$pdo = Connection::Conecta();

$query = new QueryBuilder($pdo);


/*

    //insert
$query->insert(['email' => 'valflores@google.com','idCliente' => 71])
    ->from('emails')
    ->get('insert');


    //SELECT 
    $result = $query
    //->columns(['*'])
    ->columns(['email','idCliente'])
    ->from("emails")
    ->where('idEmail','WHERE',2)
    ->get('select');

    
    foreach($result as  $content){
        echo "email: ".$content['email']. PHP_EOL;
        echo "id Cliente: ".$content['idCliente']. PHP_EOL;
    }
 
*/
    