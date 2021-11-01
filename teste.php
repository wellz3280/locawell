<?php

use Weliton\Locawell\Domain\Model\Filme;
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






