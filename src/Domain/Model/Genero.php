<?php
    namespace Weliton\Locawell\Domain\Model;

class Genero
{
    private ?int $idGenero;
    private string $genero;

    public function __construct(?int $idGenero,string $genero)
    {
        $this->idGenero = $idGenero;
        $this->genero = $genero;
    }

    public function idGenero():?int
    {
        return $this->idGenero;
    }

    public function genero():string
    {
        return $this->genero;
    }
}