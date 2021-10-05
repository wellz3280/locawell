<?php

/*
$mystring = 'abc@weliton.com';
$findme   = '@';
$pos = strpos($mystring, $findme);

// Note o uso de ===.  Simples == não funcionaria como esperado
// por causa da posição de 'a' é 0 (primeiro) caractere.
if ($pos === false) {
    echo "A string '$findme' não foi encontrada na string '$mystring'";
} else {
    echo "A string '$findme' foi encontrada na string '$mystring'";
    echo " e existe na posição $pos";
}
*/

require 'media/src/ValidaEmail.php';
	
	$meuEmail = new ValidaEmail();

	$meuEmail->email = 'weliton@locawell.com.br';

	echo $meuEmail->recuperaEmail();
	echo $meuEmail->verificaEmail();