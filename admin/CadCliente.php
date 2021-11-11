<?php

use Weliton\Locawell\Domain\Model\{Cliente,Cpf};
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryCliente;

require '../vendor/autoload.php';

$conn = Connection::Conecta();

$insereBanco = new RepositoryCliente($conn);


$cliente = new Cliente(null,'danilo','silva Pinto','004.456.888-10','28-08-1999');

if($insereBanco->insereCliente($cliente)){
    echo "inserido com sucesso !!!";
}else{
    return false;
}

