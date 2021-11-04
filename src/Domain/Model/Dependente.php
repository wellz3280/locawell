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
        return preg_match('/[0-9]{2}-[0-9]{2}-[0-9]{4}$/',$dataNascDependente,$escolhidos);
   }

   private function setvalidaDataNasc(string $dataNascDependente):void
   {
        $this->dataNascDependente = $dataNascDependente;
   }

   private function permisaoPorIdade(string $idade):bool
   {
        var_dump($idade);
       $dataNascimento = explode('-',$idade);
       $anoAtual = date('Y');
        //var_dump($dataNascimento);
       $idadeAtal =  $anoAtual - $dataNascimento[2];

       if($idadeAtal < 12){
           echo "Você tem {$idadeAtal} anos, não tem permisão para aluagar filmes sem a presença do Responsavel Legal";
       }else{
            echo "Você tem {$idadeAtal} anos , tem permisão para alugar.";
       }
        return $idadeAtal;
   }

}