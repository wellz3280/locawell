<?php
	use Weliton\Locawell\Domain\Model\Dependente;
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryCliente;

require 'vendor/autoload.php';
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		   $conn = Connection::Conecta();
			$dependente = new Dependente($_POST['nomeDependente']
			,$_POST['sobreNomeDependente'],$_POST['generoDependente'],
			$_POST['dataNascDependente'],$_POST['idCliente']);

			$insere = new RepositoryCliente($conn);

			$insere->insereDependente($dependente);

			header("Location:cadastrarDependente.php?idCliente={$_POST['idCliente']}");
	}
?>

<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Locawell</title>
		<link rel="stylesheet" type="text/css" href="media/css/style.css">
		<link rel="stylesheet" type="text/css" href="media/css/reset.css">
	</head>
	<body>
		<section class="cadastro-cliente">	
		<h2>Dependentes</h2>
				
				<form action="cadastrarDependente.php" method="post">
				<input type="hidden" name="idCliente" id="idCliente" value="<?php echo $_GET['idCliente']; ?>">
				<input class="input-padrao" type="text" name="nomeDependente" placeholder="Nome Dependente" id="nomeDependente" >
							<input class="input-padrao" type="text" name="sobreNomeDependente" placeholder="Sobrenome Dependente" id="sobreNome">
							<input class="input-padrao" type="text" name="dataNascDependente" placeholder="Data de Nascimento Dependente" id="sobreNome">
							
							<select class="input-padrao" name="generoDependente" required>
								<option selected disabled>Selecione um Gênero Para seu dependente</option>
								<option value="masculino">masculino</option>
								<option value="feminino">feminino</option>
							</select>				
				
						<input class="enviar" type="submit" value="Cadastrar" name="">
					</form>


			</section>

		</main>
		
	</body>
</html>






