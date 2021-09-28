<?php

	

			function urlEscolhida($pag)
			{

				$paginas = [
			'home.php',
			'cadastrarCliente.php',
			'cadastrarProdutos.php',
			'login.php'];

				
				if ($pag == 0) {
					return require_once($paginas[0]);
					
					
				}else{
					return require_once($paginas[$pag]);
				}

			}

				