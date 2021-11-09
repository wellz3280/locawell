<?php
    namespace Weliton\Locawell\Domain\Model;

class Endereco
{
    private string $rua;
    private string $cep;
    private string $bairro;
    private string $numero;
    private string $cidade;
    private string $estado;
    private int $idCliente;

    public function __construct(string $rua, string $cep, string $bairro,
     string $numero, string $cidade, string $estado, int $idCliente)
    {
        $this->rua = $rua;
        $this->cep = $cep;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->idCLiente = $idCliente;
    }

    public function validaCep(string $cep):bool
    {
        return preg_match('/^[0-9]{5}-[0-9]{3}$/',$cep,$escolhidos);
    }

    public function cep():string
    {
        return $this->cep;
    }

    public function rua():string
    {
        return $this->rua;
    }

    public function bairro():string
    {
        return $this->bairro;
    }

    public function numero():string
    {
        return $this->numero;
    }

    public function cidade():string
    {
        return $this->cidade;
    }

    public function estado():string
    {
        return $this->estado;
    }


    public function idCLiente():int
    {
        return $this->idCLiente;
    }
}