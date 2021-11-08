<?php
    namespace Weliton\Locawell\Domain\Repository;

interface ClienteRepository
{
    public function exibirConteudoBanco(string $tabela):array;
    public function insereBanco(string $tabela ):bool;
    
}