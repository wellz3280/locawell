<?php
    namespace Weliton\Locawell\Domain\Model;

class Diretor
{
    private ?int $idDiretor;
    private string $diretor;

    public function __construct(?int $idDiretor,string $diretor)
    {
        $this->idDiretor = $idDiretor;
        $this->diretor = $diretor;
    }

    public function idDiretor():?int
    {
        return $this->idDiretor;
    }

    public function diretor():string
    {
        return $this->diretor;
    }
}