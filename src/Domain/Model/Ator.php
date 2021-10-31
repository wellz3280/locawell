<?php
    namespace Weliton\Locawell\Domain\Model;

class Ator
{
    private ?int $idAtor;
    private string $ator;

    public function __construct(?int $idAtor,string $ator)
    {
        $this->idAtor = $idAtor;
        $this->ator = $ator;
    }

    public function idAtor():?int
    {
        return $this->idAtor;
    }

    public function ator():string
    {
        return $this->ator;
    }
}