<?php

    namespace Weliton\Locawell\Domain\Repository;

use Weliton\Locawell\Domain\Model\Filme;

interface FilmesRepository
{
    public function exibirConteudoBanco(string $tabela):array;
    public function exibirUm(string $tabela, string $campo, string $order):array;
    public function insereBanco(Filme $filme):bool;
    public function remove(string $tabela, int $id):bool;
    //public function update(Filme $filme):bool;

}