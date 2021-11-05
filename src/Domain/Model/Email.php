<?php

    namespace Weliton\Locawell\Domain\Model;

class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if($this->validaEmail($email)=== false)
        {
            $this->setEmail('email invalido');
        }else{
            $this->setEmail($email);
        }
    }

    private function validaEmail(string $email):bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function email():string
    {
        return $this->email;
    }
}