<?php

require_once 'classPessoa.php';

class Funcionario extends Pessoa {
    
    protected $id;
    protected $salario;
    protected $cargo;
    protected $senha;
    protected $table = "funcionario";
    
    public function __construct(PDO $db) {
        parent::__construct($db);
    }
    
    function getId() {
        return $this->id;
    }
    
    function getSalario() {
        return $this->salario;
    }
    
    function getCargo() {
        return $this->cargo;
    }
    
    function getSenha() {
        return $this->senha;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setSalario($salario) {
        $this->salario = $salario;
    }
    
    function setCargo($cargo) {
        $this->cargo = $cargo;
    }
    
    function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(nome, dataNasc, cpf, rg, sexo, endereco, foneCasa, foneCelular, estadoCivil, profissao, email, salario, cargo, senha, ativoInativo) values(:nome, :dataNasc, :cpf, :rg, :sexo, :endereco, :foneCasa, :foneCelular, :estadoCivil, :profissao, :email, :salario, :cargo, :senha, :ativoInativo)");
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
        $stmt->bindParam(":salario", $this->salario);
        $stmt->bindParam(":cargo", $this->cargo);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
    public function update() {
        $stmt = $this->db->prepare("update funcionario set nome = :nome, dataNasc = :dataNasc, cpf = :cpf, rg = :rg, sexo = :sexo, endereco = :endereco, foneCasa = :foneCasa, foneCelular = :foneCelular, estadoCivil = :estadoCivil, profissao = :profissao, email = :email, salario = :salario, cargo = :cargo, senha = :senha, ativoInativo = :ativoInativo where funcionario.id=:id");
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
        $stmt->bindParam(":salario", $this->salario);
        $stmt->bindParam(":cargo", $this->cargo);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
}//Fecha classe Funcionario
