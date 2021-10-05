<?php
	declare(strict_types=1);
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

		<header>
			<div class="topo">
				<h1>
						<a href="index.php?pag=home"><img src="media/img/logo.png" alt="logo"></a>
				<nav>
					<ul>
						<li><a href="index.php?pag=cliente">cadastrar</a></li>
						<li><a href="#">alugar</a></li>
						<li><a href="#">devolver</a></li>
						<li><a href="index.php?pag=login">Login</a></li>
					</ul>
				</nav>
	
			</div>
			</h1>
		</header>

		<main>
			<?php
				require 'media/src/Url.php';
					
				$url = new Url();
				 if (isset($_GET['pag'])){
				 	
				 	$url->urlEscolhida($_GET['pag']);
				 }else{
				 	$url->urlEscolhida();
				 }

			?>

		</main>
		
		<footer>
			<img src="media/img/logo.png" alt="logo">
			<p class="copyright">&copy; Copyright LocaWell - 2021</p>
		</footer>
	</body>
</html>
