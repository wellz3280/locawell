<?php
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

        $dadosArrayFilme = [
            1 =>
            ['dadoBd' => $filme->idFilme()],
            2 =>
            ['dadoBd' => $filme->titulo()],
            3 =>
            ['dadoBd' => $filme->subtitulo()],
            4 =>
            ['dadoBd' => $filme->ano()],
            5 =>
            ['dadoBd' => $filme->duracao()],
            6 =>
            ['dadoBd' => $filme->generoFilme()],
            7 =>
            ['dadoBd' => $filme->atorFilme()],
            8 =>
            ['dadoBd' => $filme->diretorFilme()]
            
        ];
        foreach($dadosArrayFilme as $indice => $filmes){
			
			$insere->bindValue($indice,$filmes['dadoBd']);
            echo "</br>".$indice." ".$filmes['dadoBd']. "</br>";
        }

       
            $insere->execute();
            echo "inserido com sucesso";
            return true;
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }

    }

}