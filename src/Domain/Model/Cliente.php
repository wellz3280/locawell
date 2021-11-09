<?php

    namespace Weliton\Locawell\Domain\Model;

    use Weliton\Locawell\Domain\Model\Pessoa;
    
class Cliente 
{
    private ?int $idCliente;
    private string $nome;
    private string $sobreNome;
    private Cpf $cpf;
    private string $dataNasc;

    public function __construct(?int $idCliente, string $nome, string $sobreNome, Cpf $cpf, string $dataNasc)
    {
       $this->idCliente = $idCliente;
       $this->nome = $nome;
       $this->sobreNome = $sobreNome;
      
       $this->cpfValidate($cpf);
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

    private function cpfValidate(Cpf $cpf):void
    {
        if($cpf->validaCpf($cpf->cpf())){
            $this->cpf = $cpf;
        }else{
            echo "cpf Invalido";
        }
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