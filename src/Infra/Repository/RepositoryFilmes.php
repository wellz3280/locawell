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
    private int $id;


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

    public  function remove(string $tabela, int $id):bool
    {
        try{
            $sql = "DELETE FROM {$tabela} WHERE idFilme = ? ";
            $query = $this->connection->prepare($sql);
             $query->bindValue(1,(int)$id,PDO::PARAM_INT);
            
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo "ERROR: ". $e->getMessage();
        }

    }

    public function update(Filme $filme):bool
    {
        try{

            $sql = "UPDATE filmes SET titulo = :titulo, subtitulo = :subtitulo,
            ano = :ano, duracao = :duracao, idGenero = :idGenero, idAtor = :idAtor,
            idDiretor = :idDiretor WHERE idFilme = :idFilme ";
            
            $update = $this->connection->prepare($sql);
            
            $update->bindValue(':titulo',$filme->titulo(),PDO::PARAM_STR);
            $update->bindValue(':subtitulo',$filme->subtitulo(),PDO::PARAM_STR);
            $update->bindValue(':ano',$filme->ano(),PDO::PARAM_STR);
            $update->bindValue(':duracao',$filme->duracao(),PDO::PARAM_STR);
            $update->bindValue(':idGenero',(int)$filme->generoFilme(),PDO::PARAM_INT);
            $update->bindValue(':idAtor',(int)$filme->atorFilme(),PDO::PARAM_INT);
            $update->bindValue(':idDiretor',(int)$filme->diretorFilme(),PDO::PARAM_INT);
            $update->bindValue(':idFilme',(int)$filme->idFilme(),PDO::PARAM_INT);

            $update->execute();
            return true;
        }catch(PDOException $e){
            echo "ERROR: ". $e->getMessage();
        }
    }
}