<?php
    declare(strict_types=1);
    namespace Weliton\Locawell\Infra\Repository;
use PDO;
use PDOException;
//use mysqli;
use  Weliton\Locawell\Domain\Model\Filme;
    
    use Weliton\Locawell\Domain\Repository\FilmesRepository;

class RepositoryFilmes implements FilmesRepository
{
    private PDO $connection;
    private Filme $filme;
    private string $tabela;
    private string $campo;
    private string $order;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function exibirConteudoBanco(string $tabela):array
    {
        
        $query = $this->connection->query("SELECT * FROM {$tabela} ;");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function insereBanco(Filme $filme):bool
    {
        try{
        $sql = "INSERT INTO filmes (idFilme,titulo,subtitulo,ano,duracao,idGenero,idAtor,idDiretor)
            VALUES (?,?,?,?,?,?,?,?);
        ";
        $insere = $this->connection->prepare($sql);
            $insere->bindValue(1,$filme->idFilme(),PDO::PARAM_INT);
            $insere->bindValue(2,$filme->titulo(),PDO::PARAM_STR);
            $insere->bindValue(3,$filme->subtitulo(),PDO::PARAM_STR);
            $insere->bindValue(4,$filme->ano(),PDO::PARAM_STR);
            $insere->bindValue(5,$filme->duracao(),PDO::PARAM_STR);
            $insere->bindValue(6,$filme->generoFilme(),PDO::PARAM_INT);
            $insere->bindValue(7,$filme->atorFilme(),PDO::PARAM_INT);
            $insere->bindValue(8,$filme->diretorFilme(),PDO::PARAM_INT);
            
       
       
             $insere->execute();
            return true;
            
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }

    }

    public function exibirUm(string $tabela, string $campo, string $order ):array
    {
        $sql = "SELECT {$campo} FROM {$tabela} ORDER BY {$campo} {$order} limit 1 ";
        $query = $this->connection->query($sql);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

}