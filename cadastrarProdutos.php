<?php
declare(strict_types=1);

use Weliton\Locawell\Domain\Model\Filme;
use Weliton\Locawell\Infra\Persistence\Connection;
use Weliton\Locawell\Infra\Repository\RepositoryFilmes;

require 'vendor/autoload.php';
	
	$conn = Connection::Conecta();
	$filme = new RepositoryFilmes($conn);

	$idFIlme = $filme->exibirUm('filmes','idFilme','DESC');
	$genero = $filme->exibirConteudoBanco('genero');
	$ator = $filme->exibirConteudoBanco('atores');
	$diretor = $filme->exibirConteudoBanco('diretores');

	
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

				<h2>
					<ul >
						<li><a href="index.php?pag=cliente">Clientes</a></li>
						<li>Filmes</li>
						<li><a href="cadastrarForncedor.html">Fornecedores</a></li>

					</ul>
					
				
				</h2>


					<form action="admin/cadFilmes.php" method="post">
						<fieldset>
							
							<?php 
							
								foreach($idFIlme as $ultimoId){
							?>
							<input class="input-padrao" type="text" id="idFIlme" name="idFilme" value="<?php echo $novoId = $ultimoId['idFilme'] + 1; 
							
							?>" Readonly>
							<?php } ?>
							<input class="input-padrao" type="text" id="titulo" name="titulo" placeholder="Titulo do Filme" required>	

							
							<input class="input-padrao" type="text" id="subtitulo" name="subtitulo" placeholder="Subtitulo">

							<input class="input-padrao" type="text" id="ano" name="ano" placeholder="Ano de Lançamento" required>
							
							<input class="input-padrao" type="text" id="duracao" name="duracao" placeholder="Duração" required >
							
							
								<select class="input-padrao" name="idGenero">
							<option selected disabled>Selecione o Gênero do Filme</option>
								<?php 
									foreach($genero as $generos){
								?>		
									<option value="<?php echo $generos['idGenero'];?>"> <?php echo $generos['genero'];?></option>
								<?php } ?>	
								</select>
							<

							<select class="input-padrao" name="idAtor">
								<option selected disabled>Selecione o Ator Principal</option>
							<?php 
								foreach($ator as $atores){
							?>		
								<option value="<?php echo $atores['idAtor'];?>"><?php echo $atores['ator'];?></option>
							<?php } ?>	
							</select>

						
							<select class="input-padrao" name="idDiretor">
							<option selected disabled>Selecione o Diretor do Filme</option>
							<?php 
								foreach($diretor as $diretores){
							?>		
								<option value="<?php echo $diretores['idDiretor'];?>"><?php echo $diretores['diretor'];?></option>
							<?php } ?>	
							</select>
							

							<input class="enviar" type="submit" value="Cadastrar" name="">
						</fieldset>

					</form>


			</section>

		</main>
		
		
	</body>
</html>
