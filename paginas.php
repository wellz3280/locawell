<?php

	$paginas = [
			'home.php',
			'cadastrarCliente.php',
			'cadastrarProdutos.php',
			'login.php'];

				if ($_GET['pag'] == 0) {
					require_once($paginas[0]);
					
				}else{
					require_once($paginas[$_GET['pag']]);
					
			}

				