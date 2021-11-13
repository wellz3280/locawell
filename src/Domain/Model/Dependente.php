<?php
    namespace Weliton\Locawell\Domain\Model;

class Dependente extends Pessoa
{
   private string $nomeDependente;
   private string $sobreNomeDependente;
   private string $dataNascDependente;
   private string $generoDependente;
   private string $url;
   private int $idCliente;

   public function __construct(string $nomeDependente,string $sobreNomeDependente, string $generoDependente,
    string $dataNascDependente,int $idCliente)
   {
       $this->nomeDependente = $nomeDependente;
       $this->sobreNomeDependente = $sobreNomeDependente;
       $this->dataNascDependente = $dataNascDependente;
       $this->idCliente = $idCliente;
        $this->generoDependente = $generoDependente;
    }

   public function validaDataNasc(string $dataNascDependente):bool
   {
        return preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/',$dataNascDependente,$escolhidos);
   }

   private static function permisaoPorIdade(string $idade):bool
   {
      
       $dataNascimento = explode('-',$idade);
       $anoAtual = date('Y');
       
       $idadeAtal =  $anoAtual - $dataNascimento[2];

       if($idadeAtal < 12){
          return true;
       }else{
            return false;
       }
        return $idadeAtal;
   }

   public function nomeDependente():string
   {
       return $this->nomeDependente;
   }

   public function sobreNomeDependente():string
   {
       return $this->sobreNomeDependente;
   }

   public function generoDependente():string
   {
       return $this->generoDependente;
   }

   public function dataNascDependente():string
   {
       return $this->dataNascDependente;
   }

   public function idCliente():int
   {
       return $this->idCliente;
   }

}