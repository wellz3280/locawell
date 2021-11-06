<?php
    namespace Weliton\Locawell\Domain\Model;

class Dependente extends Pessoa
{
   private string $nomeDependente;
   private string $sobreNomeDependente;
   private string $dataNascDependente;

   public function __construct(string $nomeDependente,string $sobreNomeDependente, string $dataNascDependente)
   {
       $this->nomeDependente = $nomeDependente;
       $this->sobreNomeDependente = $sobreNomeDependente;
       

      if($this->validaDataNasc($dataNascDependente)){
           $this->setvalidaDataNasc($dataNascDependente);   
       }  
      else{
          $this->setvalidaDataNasc('Data de nascimento inválida, tente dd-mm-aaaa');
      }

      $this->permisaoPorIdade($this->dataNascDependente); 
      
    }

   private function validaDataNasc(string $dataNascDependente):bool
   {
        return preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/',$dataNascDependente,$escolhidos);
   }

   private function setvalidaDataNasc(string $dataNascDependente):void
   {
        $this->dataNascDependente = $dataNascDependente;
   }

   private function permisaoPorIdade(string $idade):bool
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

   public function dataNascDependente():string
   {
       return $this->dataNascDependente;
   }

}