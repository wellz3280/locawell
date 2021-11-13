<?php

use Weliton\Locawell\Domain\Model\{Cliente,Cpf, Dependente, Email, Endereco, Filme, Telefone};
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryCliente;
use Weliton\Locawell\Infra\Repository\RepositoryFilmes;

require '../vendor/autoload.php';

$conn = Connection::Conecta();



$idCliente = new RepositoryFilmes($conn);


$insereBanco = new RepositoryCliente($conn);
$cliente = new Cliente(null,$_POST['nome'],$_POST['sobrenome'],$_POST['generoCliente'],$_POST['cpf'],$_POST['datanascimento']);
$conn->beginTransaction();

if($insereBanco->insereCliente($cliente)){

    $exibir = $idCliente->exibirUm('clientes','idCliente','DESC');

    foreach($exibir as $exibeId){
        $novoId =   $exibeId['idCliente'];
    }

    
    $telefone = new Telefone($_POST['telefone'],$novoId);
    $email = new Email($_POST['email'],$novoId);
    $endereco = new Endereco($_POST['endereco'],$_POST['cep'],$_POST['bairro'],
    $_POST['numero'],$_POST['complemento'],$_POST['cidade'],$_POST['estado'],$novoId);



    if ($insereBanco->insereTelefone($telefone)  &&
        $insereBanco->insereEmail($email)  &&
        $insereBanco->insereEndereco($endereco)){
        
            $conn->commit();
            //query para verificar se o id existe 
       
            
         
        }else{
            echo "Revise as Informações";
            header('Location:../index.php?pag=cliente');
        }
}else{
    echo "Revise as Informaçẽs";
}