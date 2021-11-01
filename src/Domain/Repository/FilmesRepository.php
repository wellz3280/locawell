<?php

    namespace Weliton\Locawell\Domain\Repository;

use Weliton\Locawell\Domain\Model\Filme;

interface FilmesRepository
{
    public function exibirConteudoBanco(string $tabela):array;
    public function insereBanco(Filme $filme):bool;
}