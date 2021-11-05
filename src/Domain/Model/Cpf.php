<?php

    namespace Weliton\Locawell\Domain\Model;

class Cpf extends Pessoa
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        
        if($this->validaCpf($cpf)){
            $this->setCpf($cpf);
        }else{
            $this->setCpf('Cpf Invalido tente xxx.xxx.xxx-xx');
        }
    }

    private function validaCpf(string $cpf):int
    {
        return preg_match('/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/',$cpf,$encontrados);
    }

    private function setCpf(string $cpf):void
    {
        $this->cpf = $cpf;
    }
}