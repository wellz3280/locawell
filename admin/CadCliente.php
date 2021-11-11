<?php

use Weliton\Locawell\Domain\Model\{Cliente,Cpf, Dependente, Email, Endereco, Filme, Telefone};
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryCliente;
use Weliton\Locawell\Infra\Repository\RepositoryFilmes;

require '../vendor/autoload.php';

$conn = Connection::Conecta();



$idCliente = new RepositoryFilmes($conn);

$exibir = $idCliente->exibirUm('clientes','idCliente','DESC');

foreach($exibir as $exibeId){
    $novoId =   $exibeId['idCliente'] + 1;
}


$insereBanco = new RepositoryCliente($conn);

$cliente = new Cliente($novoId,$_POST['nome'],$_POST['sobrenome'],$_POST['generoCliente'],$_POST['cpf'],$_POST['datanascimento']);
$telefone = new Telefone($_POST['telefone'],$novoId);
$email = new Email($_POST['email'],$novoId);
$endereco = new Endereco($_POST['endereco'],$_POST['cep'],$_POST['bairro'],
$_POST['numero'],$_POST['complemento'],$_POST['cidade'],$_POST['estado'],$novoId);

$conn->beginTransaction();


if($_POST['nomeDependente'] == " " &&  $_POST['sobreNomeDependente'] == " " && 
$_POST['dataNascDependente'] == "" && $_POST['generoDependente'] == " "){
    echo "Nenhum Dependente Adicionado";
         
    }else{
       
        $dependente = new Dependente($_POST['nomeDependente']
        ,$_POST['sobreNomeDependente'],$_POST['generoDependente'],$_POST['dataNascDependente'],$novoId);
    }

if ($insereBanco->insereCliente($cliente) &&
    $insereBanco->insereTelefone($telefone) &&
    $insereBanco->insereEmail($email) &&
    $insereBanco->insereEndereco($endereco)&&
    $insereBanco->insereDependente($dependente)){
    
        $conn->commit();

        header('Location:../index.php?pag=cliente');
    }else{
        echo "Revise as Informações";
    }
    
        
      
