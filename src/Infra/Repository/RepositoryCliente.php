<?php

    namespace Weliton\Locawell\Infra\Repository;

use PDO;
use Weliton\Locawell\Domain\Model\{Cliente,Endereco,Cpf,Email,Dependente,Telefone};
use Weliton\Locawell\Domain\Repository\ClienteRepository;

class RepositoryCliente 
{
   
    private PDO $conn;
    private Cliente $cliente;
    private Cpf $cpf;
    private Email $email;
    private Endereco $endereco;
    private Telefone $telefone;
    private Dependente $dependente;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function exibirConteudoBanco(string $tabela):array
    {
        $sql = "SELECT * FROM {$tabela}";

        $query = $this->conn->query($sql);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public function insereEmail(Email $email):bool
    {
        if($email->validaEmail($email->email())){    
            $sql = "INSERT INTO emails (email,idCliente) VALUES (?,?)";

            $insere = $this->conn->prepare($sql);

            $insere->bindValue(1,$email->email(),PDO::PARAM_STR);
            $insere->bindValue(2,(int)$email->idCliente(),PDO::PARAM_INT);

            if($insere->execute()){
                return true;
            }
        
        }else{
            echo "Email invalido: ". $email->email();
            return false;
        }
    }

    public function insereEndereco(Endereco $endereco):bool
    {
        if($endereco->validaCep($endereco->cep())){
            $sql = "INSERT INTO enderecos (endereco,cep,bairro,numero,cidade,estado,idCliente) 
            VALUES (?,?,?,?,?,?,?)";

            $insere = $this->conn->prepare($sql);
            
            $insere->bindValue(1,$endereco->rua(),PDO::PARAM_STR);
            $insere->bindValue(2,$endereco->cep(),PDO::PARAM_STR);
            $insere->bindValue(3,$endereco->bairro(),PDO::PARAM_STR);
            $insere->bindValue(4,$endereco->numero(),PDO::PARAM_STR);
            $insere->bindValue(5,$endereco->cidade(),PDO::PARAM_STR);
            $insere->bindValue(6,$endereco->estado(),PDO::PARAM_STR);
            $insere->bindValue(7,(int)$endereco->idCliente(),PDO::PARAM_INT);

            if($insere->execute()){
                return true;
            }

        }else{
            echo "Cep Invalido: {$endereco->cep()}";
            return false;
        }
    }

    public function insereTelefone(Telefone $telefone):bool
    {
        if($telefone->validaTelefone($telefone->telefone())){
            $sql ="INSERT INTO telefones (telefone,idCliente) VALUES (?,?)";
            
            $insereTelefone = $this->conn->prepare($sql);
            $insereTelefone->bindValue(1,$telefone->telefone(),PDO::PARAM_STR);
            $insereTelefone->bindValue(2,(int)$telefone->idCliente(),PDO::PARAM_INT);

            if($insereTelefone->execute()){
                return true;
            }
        }else{
            echo "Telefone Invalido: {$telefone->telefone()}";
            return false;
        }
    }

    public function insereDependente(Dependente $dependente):bool
    {
        if($dependente->validaDataNasc($dependente->dataNascDependente())){
            $sql = "INSERT INTO dependentes (nomeDependente,sobreNomeDependente,dataNascDependente,idCliente) VALUES 
                (?,?,?,?)
            ";

            $insereDependente = $this->conn->prepare($sql);
            $insereDependente->bindValue(1,$dependente->nomeDependente(),PDO::PARAM_STR);
            $insereDependente->bindValue(2,$dependente->sobreNomeDependente(),PDO::PARAM_STR);
            $insereDependente->bindValue(3,$dependente->dataNascDependente(),PDO::PARAM_STR);
            $insereDependente->bindValue(4,(int)$dependente->idCliente(),PDO::PARAM_INT);

            if($insereDependente->execute()){
                return true;
            }


        }else{
            echo "Data De Nascimento Invalida Invalida: {$dependente->dataNascDependente()}";
            return false;
        }
    }

    public function insereCliente(Cliente $cliente):bool
    {   
        if($valida = Cpf::validaCpf($cliente->retornaCpf())){

            $sql = "INSERT INTO clientes (nome,sobrenome,cpf,dataNascimento) VALUES (?,?,?,?)";

            $insereCliente  = $this->conn->prepare($sql);

            $insereCliente->bindValue(1,$cliente->nome(),PDO::PARAM_STR);
            $insereCliente->bindValue(2,$cliente->sobrenome(),PDO::PARAM_STR);
            $insereCliente->bindValue(3,$cliente->retornaCpf(),PDO::PARAM_STR);
            $insereCliente->bindValue(4,$cliente->dataNascimento(),PDO::PARAM_STR);

            if($insereCliente->execute()){
                return true;
            }
        }else{
            echo "Cpf Invalido: {$cliente->retornaCpf()}";
            return false;
        }

    }

}