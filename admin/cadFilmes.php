<?php

use Weliton\Locawell\Domain\Model\Filme;
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryFilmes;

require '../vendor/autoload.php';

    $conn = Connection::Conecta();
    $repositorioFilme = new RepositoryFilmes($conn);

    $filme = new Filme(
        $_POST['idFilme'],$_POST['titulo'],$_POST['subtitulo'],
        $_POST['ano'],$_POST['duracao'],$_POST['idGenero'],
        $_POST['idAtor'],$_POST['idDiretor']);
        
        $repositorioFilme->insereBanco($filme);
        
     
     
     header('Location:../index.php?pag=produtos');
        
