<?php

    namespace Weliton\Locawell\Domain\Model;

class Email
{
   
    private string $email;
    private int $idCliente; 

    public function __construct(string $email, int $idCliente)
    {
        $this->idCliente = $idCliente;
     
        $this->email = $email;
    }

    public function validaEmail(string $email):bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function email():string
    {
        return $this->email;
    }

    
    public function idCliente():int
    {
        return $this->idCliente;
    }
}