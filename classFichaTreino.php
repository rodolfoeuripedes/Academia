<?php

require_once 'classCrud.php';

class FichaTreino extends Crud {
    
    private $id;
    private $Professor_id;
    private $Aluno_id;
    private $dataInicio;
    private $dataTermino;
    private $descricao;
    private $dificuldade;
    protected $table = "fichatreino";
    
    private $Exercicio_id;
    private $treino;
    private $serie;
    private $repeticao;
    private $carga;
    private $tablehas = "fichatreino_has_exercicio";
    
    public function __construct(PDO $db) {
        parent::__construct($db);
    }
    
    function getId() {
        return $this->id;
    }
    
    function getProfessor_id() {
        return $this->Professor_id;
    }
    
    function getAluno_id() {
        return $this->Aluno_id;
    }
    
    function getDataInicio() {
        return $this->dataInicio;
    }
    
    function getDataTermino() {
        return $this->dataTermino;
    }
    
    function getDescricao() {
        return $this->descricao;
    }
    
    function getDificuldade() {
        return $this->dificuldade;
    }
    
    function getExercicio_id() {
        return $this->Exercicio_id;
    }
    
    function getTreino() {
        return $this->treino;
    }
    
    function getSerie() {
        return $this->serie;
    }
    
    function getRepeticao() {
        return $this->repeticao;
    }
    
    function getCarga() {
        return $this->carga;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setProfessor_id($Professor_id) {
        $this->Professor_id = $Professor_id;
    }
    
    function setAluno_id($Aluno_id) {
        $this->Aluno_id = $Aluno_id;
    }
    
    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }
    
    function setDataTermino($dataTermino) {
        $this->dataTermino = $dataTermino;
    }
    
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function setDificuldade($dificuldade) {
        $this->dificuldade = $dificuldade;
    }
    
    function setExercicio_id($Exercicio_id) {
        $this->Exercicio_id = $Exercicio_id;
    }
    
    function setTreino($treino) {
        $this->treino = $treino;
    }
    
    function setSerie($serie) {
        $this->serie = $serie;
    }
    
    function setRepeticao($repeticao) {
        $this->repeticao = $repeticao;
    }
    
    function setCarga($carga) {
        $this->carga = $carga;
    }
    
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(Professor_id, Aluno_id, dataInicio, dataTermino, descricao, dificuldade) values(:Professor_id, :Aluno_id, :dataInicio, :dataTermino, :descricao, :dificuldade)");
        $stmt->bindParam(":Professor_id", $this->Professor_id);
        $stmt->bindParam(":Aluno_id", $this->Aluno_id);
        $stmt->bindParam(":dataInicio", $this->dataInicio);
        $stmt->bindParam(":dataTermino", $this->dataTermino);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":dificuldade", $this->dificuldade);
        $stmt->execute();
        $this->id = $this->db->lastInsertId();
        $row1 = $this->Exercicio_id;
        $row2 = $this->treino;
        $row3 = $this->serie;
        $row4 = $this->repeticao;
        $row5 = $this->carga;
        for ($i = 0, $x = count($row1); $i < $x; ++$i) {
            $stmt = $this->db->prepare("insert into $this->tablehas(FichaTreino_id, Exercicio_id, treino, serie, repeticao, carga) values(:FichaTreino_id, :Exercicio_id, :treino, :serie, :repeticao, :carga)");
            $stmt->bindParam(":FichaTreino_id", $this->id);
            $stmt->bindParam(":Exercicio_id", $row1[$i]);
            $stmt->bindParam(":treino", $row2[$i]);
            $stmt->bindParam(":serie", $row3[$i]);
            $stmt->bindParam(":repeticao", $row4[$i]);
            $stmt->bindParam(":carga", $row5[$i]);
            $stmt->execute();
        }
    }
    
    public function update() {
        $stmt = $this->db->prepare("update $this->table set dataInicio = :dataInicio, dataTermino = :dataTermino, descricao = :descricao, dificuldade = :dificuldade where id=:id");
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":dataInicio", $this->dataInicio);
        $stmt->bindParam(":dataTermino", $this->dataTermino);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":dificuldade", $this->dificuldade);
        $stmt->execute();
        $row1 = $this->Exercicio_id;
        $row2 = $this->treino;
        $row3 = $this->serie;
        $row4 = $this->repeticao;
        $row5 = $this->carga;
        if ($row1[0] != "") {
            $stmt = $this->db->prepare("delete from $this->tablehas where FichaTreino_id=:id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            for ($i = 0, $x = count($row1); $i < $x; ++$i) {
                $stmt = $this->db->prepare("insert into $this->tablehas(FichaTreino_id, Exercicio_id, treino, serie, repeticao, carga) values(:FichaTreino_id, :Exercicio_id, :treino, :serie, :repeticao, :carga)");
                $stmt->bindParam(":FichaTreino_id", $this->id);
                $stmt->bindParam(":Exercicio_id", $row1[$i]);
                $stmt->bindParam(":treino", $row2[$i]);
                $stmt->bindParam(":serie", $row3[$i]);
                $stmt->bindParam(":repeticao", $row4[$i]);
                $stmt->bindParam(":carga", $row5[$i]);
                $stmt->execute();
            }
        }
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("delete from $this->table where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        $stmt = $this->db->prepare("delete from $this->tablehas where FichaTreino_id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    
}//Fecha classe FichaTreino
