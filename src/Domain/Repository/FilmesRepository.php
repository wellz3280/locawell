<?php

    namespace Weliton\Locawell\Domain\Repository;

   

interface FilmesRepository
{
    public function exibirConteudoBanco(string $tabela):array;
}