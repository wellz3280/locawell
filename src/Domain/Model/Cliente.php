<?php

    namespace Weliton\Locawell\Domain\Model;

    use Weliton\Locawell\Domain\Model\Pessoa;
    
class Cliente extends Pessoa
{
    private ?int $idCliente;

    public function __construct(?int $idCliente,string $nome, string $sobrenome,
    Cpf $cpf, string $dataNasc, Dependente $dependente, 
    Endereco $endereco, Email $email, Telefone $telefone)
    {
        $this->idCliente = $idCliente;
        parent::__construct($nome,$sobrenome,$cpf,$dataNasc,$dependente,$endereco,$email,$telefone);
        $this->aniversario($dataNasc);
    }

    public function idCliente():?int
    {
        return $this->idCliente;
    }

    private function aniversario(string $dataNasc):bool
    {
       
        $dia = date('d');
        $mes = date('m');

        $aniversario = explode('-',$dataNasc);
        
        if($dia == $aniversario[0] && $mes == $aniversario[1]){
                echo "feliz Aniversario";
                return true;    
        }
        return false;
    }

}