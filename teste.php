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
use Weliton\Locawell\Domain\Model\{Filme, Ator, Genero,Diretor};
require_once 'vendor/autoload.php';

$filme = new Filme(1,'homens de preto 3',' ','2021','2h',
new Genero(1,'aventura'), new Ator(1,'weliton'), new Diretor(1,'mark escoseci'));

echo $filme->idFilme(). PHP_EOL;
echo $filme->titulo(). PHP_EOL;
echo $filme->subtitulo(). PHP_EOL;
echo $filme->ano(). PHP_EOL;
echo $filme->duracao(). PHP_EOL;









