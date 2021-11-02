<?php
declare(strict_types=1);

use Weliton\Locawell\Domain\Model\Ator;
use Weliton\Locawell\Domain\Model\Diretor;
use Weliton\Locawell\Domain\Model\Filme;
use Weliton\Locawell\Domain\Model\Genero;
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryFilmes;

require_once 'vendor/autoload.php';

$mysql = Connection::Conecta();

$teste = new RepositoryFilmes($mysql);


/*
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $novoFilme = new Filme(
        (int)$_POST['idFilme'],
        $_POST['titulo'],
        $_POST['subtitulo'],
        $_POST['ano'],
        $_POST['duracao'],
        (int)$_POST['idGenero'],
        (int)$_POST['idAtor'],
        (int)$_POST['idDiretor']
    );
    $teste->insereBanco($novoFilme);
    header('Location:index.php?pag=produtos');
    die();
}
*/


$tabela = 'filmes';
$teste->remove($tabela,77);

exit();
foreach($teste->exibirConteudoBanco($tabela) as $listas){
    echo $listas['idFilme']."<br>";
    echo $listas['titulo']."<br>";
    echo $listas['subtitulo']."<br>";
    echo $listas['ano']."<br>";
    echo $listas['duracao']."<br>";

}


$diretor = new Diretor(4,'whashinton');
$genero = new Genero(5,'terror');
$ator = new Ator(4,'weliton');
$filme = new Filme(null,'Malditos espelhos ','sou feião mano','1995','1h30',
$genero->idGenero(),$ator->idAtor(),$diretor->idDiretor());

echo "#diretor:".$diretor->idDiretor();
echo "<pre>";
var_dump($filme);
echo "</pre>";
$teste->insereBanco($filme);
