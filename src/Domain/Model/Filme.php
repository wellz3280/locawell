<?php
    namespace Weliton\Locawell\Domain\Model;

class Filme
{
    private ?int $idFilme;
    private string $titulo;
    private ?string $subtitulo;
    private string $ano;
    private string $duracao;
    private int $idGenero;
    private int $idAtor;
    private int $idDiretor;

    public function __construct(?int $idFilme, string $titulo, ?string $subtitulo, 
    string $ano,string $duracao, int $idGenero, int $idAtor,int $idDiretor)
    {
        $this->idFilme = $idFilme;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->ano = $ano;
        $this->duracao = $duracao;
        $this->idGenero = $idGenero;
        $this->idAtor = $idAtor;
        $this->idDiretor = $idDiretor;

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

    public function generoFilme():int
    {
        return $this->idGenero;
    }
    
    public function atorFilme():int
    {
        return $this->idAtor;
    }

    public function diretorFilme():int
    {
        return $this->idDiretor;
    }
}