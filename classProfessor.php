<?php

require_once 'classFuncionario.php';

class Professor extends Funcionario {
    
    protected $especialidade;
    protected $table = "professor";
    
    public function __construct(PDO $db) {
        parent::__construct($db);
    }
    
    function getEspecialidade() {
        return $this->especialidade;
    }
    
    function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }
          
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(nome, dataNasc, cpf, rg, sexo, endereco, foneCasa, foneCelular, estadoCivil, profissao, email, salario, cargo, senha, especialidade, ativoInativo) values(:nome, :dataNasc, :cpf, :rg, :sexo, :endereco, :foneCasa, :foneCelular, :estadoCivil, :profissao, :email, :salario, :cargo, :senha, :especialidade, :ativoInativo)");
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
        $stmt->bindParam(":especialidade", $this->especialidade);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
    public function update() {
        $stmt = $this->db->prepare("update professor set nome = :nome, dataNasc = :dataNasc, cpf = :cpf, rg = :rg, sexo = :sexo, endereco = :endereco, foneCasa = :foneCasa, foneCelular = :foneCelular, estadoCivil = :estadoCivil, profissao = :profissao, email = :email, salario = :salario, cargo = :cargo, senha = :senha, especialidade = :especialidade, ativoInativo = :ativoInativo where professor.id=:id");
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
        $stmt->bindParam(":especialidade", $this->especialidade);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
}//Fecha classe Professor
