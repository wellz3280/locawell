<?php

    namespace Weliton\Locawell\Domain\Model;

class Telefone
{
    private string $telefone;

    public function __construct(string $telefone)
    {
        if($this->validaTelefone($telefone)){
            $this->setTelefone($telefone);
        }else{
            $this->setTelefone('telefone invalido');
        }
    }

    private function validaTelefone(string $telefone):bool
    {
       return preg_match('/^[0-9]{5}-[0-9]{4}$/',$telefone,$encontrados);
    }

    private function setTelefone(string $telefone):void
    {
        $this->telefone = $telefone;
    }

    public function telefone():string
    {
        return $this->telefone;
    }
}