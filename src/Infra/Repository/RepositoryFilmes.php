<?php
    namespace Weliton\Locawell\Infra\Repository;
use PDO;
//use mysqli;
use  Weliton\Locawell\Domain\Model\Filme;
    
    use Weliton\Locawell\Domain\Repository\FilmesRepository;

class RepositoryFilmes implements FilmesRepository
{
    private PDO $connection;
    private Filme $filme;
    private string $tabela;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function exibirConteudoBanco(string $tabela):array
    {
        $query = $this->connection->query("SELECT * FROM {$tabela} ;");
        $queryResult = $query->fetch(PDO::FETCH_ASSOC);
        
        return $queryResult;
    }

}