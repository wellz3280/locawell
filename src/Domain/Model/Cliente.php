<?php

    namespace Weliton\Locawell\Domain\Model;

    use Weliton\Locawell\Domain\Model\Pessoa;
    
class Cliente
{
    private ?int $idCliente;
    private string $nome;
    private string $sobreNome;
     private string $cpf;
    private string $dataNasc;
    private string $genero;

    public function __construct(?int $idCliente, string $nome, 
    string $sobreNome,string $genero,string $cpf, string $dataNasc)
    {
       $this->idCliente = $idCliente;
       $this->nome = $nome;
       $this->sobreNome = $sobreNome;
       $this->dataNasc = $dataNasc;
       $this->cpf = $cpf;
       $this->genero = $genero;
       $this->aniversario($dataNasc);
    }


    public function idCliente():?int
    {
        return $this->idCliente;
    }

    public function nome():string
    {
        return $this->nome;
    }

    public function sobrenome():string
    {
        return $this->sobreNome;
    }

    public function retornaCpf():string
    {
        return $this->cpf;
    }

    public function dataNascimento():string
    {
        return $this->dataNasc;
    }

    public function generoCliente():string
    {
        return $this->genero;
    }

    private function aniversario(string $dataNasc):bool
    {
       
        $dia = date('d');
        $mes = date('m');

        $aniversario = explode('-',$dataNasc);
        
        if($dia == $aniversario[0] && $mes == $aniversario[1]){
                echo "feliz Aniversario";
                return true;    
        }else{
            return false;
        }
    }

}