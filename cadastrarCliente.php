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
						<li>Clientes</li>
						<li><a href="index.php?pag=produtos">Filmes</a></li>
						<li><a href="#">Fornecedores</a></li>

					</ul>


				</h2>


					<form>
						<fieldset>
							
							
							<input class="input-padrao" type="text" id="nome" name="nome" placeholder="Nome" required>	

							
							<input class="input-padrao" type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>

							<input class="input-padrao" type="tel" id="cpf" name="cpf" placeholder="Cpf: XXX.XXX.XXX-XX" required>

							<input class="input-padrao" type="tel" id="telefone" name="telefone" placeholder="Telefone (xx) XXXXX-XXXX" required>

							<input class="input-padrao" type="email" id="email" name="email" placeholder="email@exemplo.com" required >

							<input class="input-padrao" type="tel" id="cep" name="cep" placeholder="Cep: xxxxx-xxx" required >
							
							<input class="input-padrao" type="text" id="endereco" name="endereco" placeholder="Endereço" required >

							<input class="input-padrao" type="text" id="numero" name="numero" placeholder="numero" required >

							<input class="input-padrao" type="text" id="complemento" name="complemento" placeholder="Complemento" required >

							<input class="input-padrao" type="text" id="bairro" name="bairro" placeholder="Bairro" required >

							<input class="input-padrao" type="text" id="cidade" name="cidade" placeholder="Cidade" required>

							<input class="input-padrao" type="text" id="estado" name="estado" placeholder="Estado" required >
						</fieldset>

						<div class="input-radio">
							<label>dependente</label><br>
							<label for="sim">
								<input type="radio" name="dependente" value="sim" id="sim" checked> sim
							</label>
							<br>
							<label for="nao">
								<input type="radio" name="dependente" value="nao" id="nao"> não
							</label>
						</div>
						<input class="enviar" type="submit" value="Cadastrar" name="">
					</form>


			</section>

		</main>
		
	</body>
</html>
