<?php

    namespace Weliton\Locawell\Domain\Model;
    use PDO;

class InsertGlobal
{
    private string $table;
    private array $dados;
    private PDO $conexao;

    public function __construct(string $table, array $dados, PDO $conexao)
    {
        $this->table = $table;
        $this->conexao = $conexao;

        //cria um array associativo
        if($this->trataArray($dados)){
            $this->setTrataArray($dados);
        }else{
           
            return false;
        }
        $this->insereBanco($table);
    }

    private function trataArray(array $dados):array
    {
        $cont = 1;
        for($i = 0; $i < count($dados);$i++){
            $arrayTratado = [
                $cont => 
                ['tableDados' => $dados[$i]]
            ];
            $cont += 1;
            return $arrayTratado;
        }
    }

    private function setTrataArray(array $dados):void
    {
        $this->dados = $dados;
    }

    public function retornaArray():array
    {
        return $this->dados; 
    }

    private function insereBanco (string $table):void
    {
        //pegando o nome das colunas 
        $camposTableSql = "SHOW COLUMNS FROM {$table}";
        $query = $this->conexao->query($camposTableSql); 
        
        //criando um array com as colunas da tabela
        $colunas = [];
        foreach($query->fetchAll(PDO::FETCH_ASSOC)as $fields){
            $colunas[] = $fields['Field'];
        }

        //criando uma string com os colunas da tabela e separando por virgulas
        $camposIn = implode(',',$colunas);
        
        //pegando a quantidade de parâmetro a ser inseridos e criando uma string
        $parametros = implode(',',array_fill(0,count($colunas),'?'));
       
        // $sql = "INSERT INTO nomeTabelea VALUES (?,?,?);";
        $sql = "INSERT INTO {$table} ({$camposIn}) VALUES ({$parametros});)";
        
        //criando objeto para inserir no banco
        $insere = $this->conexao->prepare($sql);
        
        //criando um array associativo apartir do metodo retornaArray
        foreach($dado = $this->retornaArray() as $i => $dados){

            //if($dados == 0 && $dados <= 9){$dados = (int)$dados;}
            
            $insere->bindValue(($i+1),$dados);

        }

           $insere->execute();
    }

}