<?php

    namespace Weliton\Locawell\Domain\Model;

class Cpf extends Pessoa
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        $this->cpf=$cpf;
    }
    public static function validaCpf(string $cpf):int
    {
        return preg_match('/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/',$cpf,$encontrados);
    }
    
    public function cpf()
    {
        return $this->cpf;
    }
}