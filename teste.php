<?php
declare(strict_types=1);

use Weliton\Locawell\Domain\Model\{Filme,Genero,Ator,Diretor, InsertGlobal, Testes};
use Weliton\Locawell\Domain\Model\{Telefone,Email,Dependente,Endereco,Cpf};
use Weliton\Locawell\Domain\Model\Cliente;
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryCliente;
use Weliton\Locawell\Infra\Repository\RepositoryFilmes;


require_once 'vendor/autoload.php';

$mysql = Connection::Conecta();

$email = [null,'zelito@gmail.com',116];
$endereco = [null,'rua 1','12588-888','luz','45b','proximo ao lixão','alberta','california',116];
$teste = new InsertGlobal('emails',$email,$mysql);

//$insereBanco->insereCliente(new Cliente(7,'joão','silva','15-12-1983'), new Cpf('758.146.789-11'));
//$insereBanco->insereEmail(new Email('joaosilva@cea.com.br',7));
//$insereBanco->insereEndereco(new Endereco('Rua crocodilo','02122-130','catalunia','1600','Guarulhos','São paulo',7));
//$insereBanco->insereTelefone(new Telefone('1194555-2433',7));
//$insereBanco->insereDependente(new Dependente('guilherme','dos santos','10-11-2005',7));

/*
$cliente = new Cliente(6,'karla','apoliana da silva',
new Cpf('325.222.789-10'),'10-06-1986', new Dependente('Renata','da silva','06-08-2016',6),
new Endereco('araguaia','01105-000','caninde','207','são paulo','são paulo',6),
 new Email('welington.a2you@gmail.com',6),
new Telefone('97634-0280',6)
);
*/


//inserir filmes 
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

exit();
$filme = new Filme(81,'pink e celebro','sofiastica Vida invejosa','2021','45min',5,5,4);

$teste->update($filme);
$tabela = 'filmes';

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
