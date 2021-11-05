<?php
    namespace Weliton\Locawell\Domain\Model;

use stdClass;

class Pessoa 
{
    private string $nome;
    private string $sobrenome;
    private Cpf $cpf;
    private string $dataNasc;
    private  $dependente;
    private  $endereco;
    private  $email;
    private  $telefone;

    public function __construct(string $nome, string $sobrenome,
     Cpf $cpf, string $dataNasc, Dependente $dependente, Endereco $endereco, Email $email, Telefone $telefone )
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->dataNasc = $dataNasc;
        $this->dependente = $dependente; 
        $this->endereco = $endereco;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    public function getNome():string
    {   
        return $this->nome;
    }

    public function getSobrenome():string
    {   
        return $this->sobrenome;
    }


    public function getDataNasc():string
    {   
        return $this->dataNasc;
    }

    private function aniversario(string $dataNasc):string
    {
       
        $data = date('Y');
        $aniversario = $data - $dataNasc;
        
        return $aniversario;
    }

}