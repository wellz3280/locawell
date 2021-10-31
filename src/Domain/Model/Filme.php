<?php
    namespace Weliton\Locawell\Domain\Model;

class Filme
{
    private ?int $idFilme;
    private string $titulo;
    private ?string $subtitulo;
    private string $ano;
    private string $duracao;

    public function __construct(?int $idFilme, string $titulo, ?string $subtitulo, string $ano,string $duracao)
    {
        $this->idFilme = $idFilme;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->ano = $ano;
        $this->duracao = $duracao;
    }

    public function idFilme():?int
    {
        return $this->idFilme;
    }

    public function titulo():string
    {
        return $this->titulo;
    }
    
    public function subtitulo():?string
    {
        return $this->subtitulo;
    }

    public function ano():string
    {
        return $this->ano;
    }

    public function duracao():string
    {
        return $this->duracao;
    }
    
}