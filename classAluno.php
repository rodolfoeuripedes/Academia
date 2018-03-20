<?php

require_once 'classPessoa.php';

class Aluno extends Pessoa {
    
    protected $id;
    protected $table = "aluno";
    
    public function __construct(PDO $db) {
        parent::__construct($db);
    }
    
    function getId() {
        return $this->id;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(nome, dataNasc, cpf, rg, sexo, endereco, foneCasa, foneCelular, estadoCivil, profissao, email, ativoInativo) values(:nome, :dataNasc, :cpf, :rg, :sexo, :endereco, :foneCasa, :foneCelular, :estadoCivil, :profissao, :email, :ativoInativo)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":dataNasc", $this->dataNasc);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":rg", $this->rg);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":foneCasa", $this->foneCasa);
        $stmt->bindParam(":foneCelular", $this->foneCelular);
        $stmt->bindParam(":estadoCivil", $this->estadoCivil);
        $stmt->bindParam(":profissao", $this->profissao);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
    public function update() {
        $stmt = $this->db->prepare("update aluno set nome = :nome, dataNasc = :dataNasc, cpf = :cpf, rg = :rg, sexo = :sexo, endereco = :endereco, foneCasa = :foneCasa, foneCelular = :foneCelular, estadoCivil = :estadoCivil, profissao = :profissao, email = :email, ativoInativo = :ativoInativo where aluno.id=:id");
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":dataNasc", $this->dataNasc);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":rg", $this->rg);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":foneCasa", $this->foneCasa);
        $stmt->bindParam(":foneCelular", $this->foneCelular);
        $stmt->bindParam(":estadoCivil", $this->estadoCivil);
        $stmt->bindParam(":profissao", $this->profissao);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
}//Fecha classe Aluno
