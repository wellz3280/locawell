<?php

class LimitaCaracter
{
	public string $texto;


	public function recuperaFrase():string
	{
		return $this->texto;
	}



	public function limiteDeCaracteres():string
	{	
		$caracteres = strlen($this->texto);

		if($caracteres > 150)
		{
			return substr($this->texto,0,120);
		}else{
			return $this->recuperaFrase();
		}
	}

}


