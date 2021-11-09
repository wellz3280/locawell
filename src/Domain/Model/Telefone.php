<?php

    namespace Weliton\Locawell\Domain\Model;

class Telefone
{
    private string $telefone;
    private int $idCliente;

    public function __construct(string $telefone, int $idCliente)
    {
        $this->idCliente = $idCliente;
        $this->telefone = $telefone;
    }

    public function validaTelefone(string $telefone):bool
    {
       return preg_match('/^[0-9]{2}[0-9]{5}-[0-9]{4}$/',$telefone,$encontrados);
    }
    
    public function telefone():string
    {
        return $this->telefone;
    }

    public function idCliente():int
    {
        return $this->idCliente;
    }
}