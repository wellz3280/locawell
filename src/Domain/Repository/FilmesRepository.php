<?php

    namespace Weliton\Locawell\Domain\Repository;

interface FilmesRepository
{
    public function exibirConteudoBando(string $table):array;
}