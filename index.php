<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Locawell</title>
		<link rel="stylesheet" type="text/css" href="media/css/style.css">
		<link rel="stylesheet" type="text/css" href="media/css/reset.css">
	</head>
	<body>

		<header>
			<div class="topo">
				<h1>
						<a href="index.php?pagina=index.php"><img src="media/img/logo.png" alt="logo"></a>
				<nav>
					<ul>
						<li><a href="cadastrarCliente.html">cadastrar</a></li>
						<li><a href="#">alugar</a></li>
						<li><a href="#">devolver</a></li>
						<li><a href="login.php?pagina=login.php">Login</a></li>
					</ul>
				</nav>
	
			</div>
			</h1>
		</header>

		<main>
			<?php

				$pagina = $_GET['pagina'];
				if ($pagina == 0) {
					require_once('home.php');
				}else{
					require_once($pagina);
				}


				
			?>

		</main>
		
		<footer>
			<img src="media/img/logo.png" alt="logo">
			<p class="copyright">&copy; Copyright LocaWell - 2021</p>
		</footer>
	</body>
</html>
