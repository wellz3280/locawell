<?php

class ValidaEmail
{
	public string $email;

	
	public function recuperaEmail():string
	{
		return $this->email;
	}

	public function verificaEmail():bool
	{
		//$encontreArroba = "@";
		
		$encontrePontoCom = strpos($this->email,".com");

		$encontreArroba = strpos($this->email,'@');

		if($encontreArroba === false or $encontrePontoCom === false)
		{
			echo "<br>"."email invalido ";

			return false;
		}else{
			echo "<br>". "email correto";

			return true;
		}
	
	}

}