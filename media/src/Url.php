<?php
	declare(strict_types=1);
	
	require 'Pagina.php';
class Url
{

	public function urlEscolhida(string $pegaUrl = 'home'): void
	{
		$pagina = new Pagina();
		
		if($pagina->verificaPagina($pegaUrl)){

			require_once $pagina->pegarPagina($pegaUrl);
		}else{

		  require_once $pagina->pegarPagina('home');
		}
	}	


	
}