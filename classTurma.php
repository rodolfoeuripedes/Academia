<?php

require_once 'classCrud.php';

class Turma extends Crud {
    
    private $id;
    private $Professor_id;
    private $nome;
    private $turno;
    private $qtdAluno;
    private $carHorSem;
    private $diasSemana;
    private $dataInicio;
    private $dataTermino;
    private $horaInicio;
    private $horaTermino;
    private $avaliacao;
    private $situacao;
    protected $table = "turma";
    
    private $Aluno_id;
    private $tablehas = "turma_has_aluno";
    
    public function __construct(PDO $db) {
        parent::__construct($db);
    }
    
    function getId() {
        return $this->id;
    }
    
    function getProfessor_id() {
        return $this->Professor_id;
    }
    
    function getNome() {
        return $this->nome;
    }
    
    function getTurno() {
        return $this->turno;
    }
    
    function getQtdAluno() {
        return $this->qtdAluno;
    }
    
    function getCarHorSem() {
        return $this->carHorSem;
    }
    
    function getDiasSemana() {
        return $this->diasSemana;
    }
    
    function getDataInicio() {
        return $this->dataInicio;
    }
    
    function getDataTermino() {
        return $this->dataTermino;
    }
    
    function getHoraInicio() {
        return $this->horaInicio;
    }
    
    function getHoraTermino() {
        return $this->horaTermino;
    }
    
    function getAvaliacao() {
        return $this->avaliacao;
    }
    
    function getSituacao() {
        return $this->situacao;
    }
    
    function getAluno_id() {
        return $this->Aluno_id;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setProfessor_id($Professor_id) {
        $this->Professor_id = $Professor_id;
    }
    
    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function setTurno($turno) {
        $this->turno = $turno;
    }
    
    function setQtdAluno($qtdAluno) {
        $this->qtdAluno = $qtdAluno;
    }
    
    function setCarHorSem($carHorSem) {
        $this->carHorSem = $carHorSem;
    }
    
    function setDiasSemana($diasSemana) {
        $this->diasSemana = $diasSemana;
    }
    
    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }
    
    function setDataTermino($dataTermino) {
        $this->dataTermino = $dataTermino;
    }
    
    function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }
    
    function setHoraTermino($horaTermino) {
        $this->horaTermino = $horaTermino;
    }
    
    function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }
    
    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }
    
    function setAluno_id($Aluno_id) {
        $this->Aluno_id = $Aluno_id;
    }
    
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(Professor_id, nome, turno, qtdAluno, carHorSem, diasSemana, dataInicio, dataTermino, horaInicio, horaTermino, avaliacao, situacao) values(:Professor_id, :nome, :turno, :qtdAluno, :carHorSem, :diasSemana, :dataInicio, :dataTermino, :horaInicio, :horaTermino, :avaliacao, :situacao)");
        $stmt->bindParam(":Professor_id", $this->Professor_id);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":turno", $this->turno);
        $stmt->bindParam(":qtdAluno", $this->qtdAluno);
        $stmt->bindParam(":carHorSem", $this->carHorSem);
        $stmt->bindParam(":diasSemana", $this->diasSemana);
        $stmt->bindParam(":dataInicio", $this->dataInicio);
        $stmt->bindParam(":dataTermino", $this->dataTermino);
        $stmt->bindParam(":horaInicio", $this->horaInicio);
        $stmt->bindParam(":horaTermino", $this->horaTermino);
        $stmt->bindParam(":avaliacao", $this->avaliacao);
        $stmt->bindParam(":situacao", $this->situacao);
        $stmt->execute();
        $this->id = $this->db->lastInsertId();
        $row = $this->Aluno_id;
        for ($i = 0, $x = count($row); $i < $x; ++$i) {
            $stmt = $this->db->prepare("insert into $this->tablehas(Turma_id, Aluno_id) values(:Turma_id, :Aluno_id)");
            $stmt->bindParam(":Turma_id", $this->id);
            $stmt->bindParam(":Aluno_id", $row[$i]);
            $stmt->execute();
        }
    }
    
    public function update() {
        $stmt = $this->db->prepare("update $this->table set nome = :nome, turno = :turno, qtdAluno = :qtdAluno, carHorSem = :carHorSem, diasSemana = :diasSemana, dataInicio = :dataInicio, dataTermino = :dataTermino, horaInicio = :horaInicio, horaTermino = :horaTermino, avaliacao = :avaliacao, situacao = :situacao where id=:id");
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":turno", $this->turno);
        $stmt->bindParam(":qtdAluno", $this->qtdAluno);
        $stmt->bindParam(":carHorSem", $this->carHorSem);
        $stmt->bindParam(":diasSemana", $this->diasSemana);
        $stmt->bindParam(":dataInicio", $this->dataInicio);
        $stmt->bindParam(":dataTermino", $this->dataTermino);
        $stmt->bindParam(":horaInicio", $this->horaInicio);
        $stmt->bindParam(":horaTermino", $this->horaTermino);
        $stmt->bindParam(":avaliacao", $this->avaliacao);
        $stmt->bindParam(":situacao", $this->situacao);
        $stmt->execute();
        $row = $this->Aluno_id;
        if ($row[0] != ""){
            $stmt = $this->db->prepare("delete from $this->tablehas where Turma_id=:id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            for ($i = 0, $x = count($row); $i < $x; ++$i) {
                $stmt = $this->db->prepare("insert into $this->tablehas(Turma_id, Aluno_id) values(:Turma_id, :Aluno_id)");
                $stmt->bindParam(":Turma_id", $this->id);
                $stmt->bindParam(":Aluno_id", $row[$i]);
                $stmt->execute();
            }
        }
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("delete from $this->table where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        $stmt = $this->db->prepare("delete from $this->tablehas where Turma_id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    
}//Fecha classe Turma
