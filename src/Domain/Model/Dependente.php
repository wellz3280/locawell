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
       $this->dataNascDependente = $dataNascDependente;

       $result = $this->aniversario($dataNascDependente);
       $this->permisoes($result);
   }

   private function aniversario(string $dataNascDependente):string
   {
        $data = date('Y');
        $aniversario = $data - $dataNascDependente;
        
        return $aniversario;
    }

   private function permisoes(string $idade):bool
   {    
       if($idade < 12){
            echo "Não pode alugar os filmes sem a presença dos Pais";
            return false;
        }else{
            
        }
   }


}