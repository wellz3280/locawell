<?php

use Weliton\Locawell\Domain\Model\Ator;
use Weliton\Locawell\Domain\Model\Diretor;
use Weliton\Locawell\Domain\Model\Filme;
use Weliton\Locawell\Domain\Model\Genero;
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryFilmes;

require_once 'vendor/autoload.php';

$mysql = Connection::Conecta();

$teste = new RepositoryFilmes($mysql);

$tabela = 'filmes';

foreach($teste->exibirConteudoBanco($tabela) as $listas){
    echo $listas['idFilme']."<br>";
    echo $listas['titulo']."<br>";
    echo $listas['subtitulo']."<br>";
    echo $listas['ano']."<br>";
    echo $listas['duracao']."<br>";

}


$diretor = new Diretor(1,'whashinton');
$genero = new Genero(5,'terror');
$ator = new Ator(4,'weliton');
$filme = new Filme(5,'gato escaldado no fim do relacionamento','cachorro que fez','1995','1h30',
$genero->idGenero(),$ator->idAtor(),$diretor->idDiretor());


$teste->insereBanco($filme);
