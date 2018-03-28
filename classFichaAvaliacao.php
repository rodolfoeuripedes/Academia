<?php

require_once 'classCrud.php';

class FichaAvaliacao extends Crud {
    
    private $id;
    private $Professor_id;
    private $Aluno_id;
    private $dataAvaliacao;
    private $objetivo;
    private $obsObjetivo;
    private $medTorax;
    private $medCinturaAlta;
    private $medCinturaAbdomen;
    private $medQuadril;
    private $medCoxaDir;
    private $medCoxaEsq;
    private $medPanturrilhaDir;
    private $medPanturrilhaEsq;
    private $medBracoDir;
    private $medBracoEsq;
    private $medAntebracoDir;
    private $medAntebracoEsq;
    private $peso;
    private $altura;
    private $ativoInativo;
    protected $table = "fichaavaliacao";
    
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
    
    function getDataAvaliacao() {
        return $this->dataAvaliacao;
    }
    
    function getObjetivo() {
        return $this->objetivo;
    }
    
    function getObsObjetivo() {
        return $this->obsObjetivo;
    }
    
    function getMedTorax() {
        return $this->medTorax;
    }
    
    function getMedCinturaAlta() {
        return $this->medCinturaAlta;
    }
    
    function getMedCinturaAbdomen() {
        return $this->medCinturaAbdomen;
    }
    
    function getMedQuadril() {
        return $this->medQuadril;
    }
    
    function getMedCoxaDir() {
        return $this->medCoxaDir;
    }
    
    function getMedCoxaEsq() {
        return $this->medCoxaEsq;
    }
    
    function getMedPanturrilhaDir() {
        return $this->medPanturrilhaDir;
    }
    
    function getMedPanturrilhaEsq() {
        return $this->medPanturrilhaEsq;
    }
    
    function getMedBracoDir() {
        return $this->medBracoDir;
    }
    
    function getMedBracoEsq() {
        return $this->medBracoEsq;
    }
    
    function getMedAntebracoDir() {
        return $this->medAntebracoDir;
    }
    
    function getMedAntebracoEsq() {
        return $this->medAntebracoEsq;
    }
    
    function getPeso() {
        return $this->peso;
    }
    
    function getAltura() {
        return $this->altura;
    }
    
    function getAtivoInativo() {
        return $this->ativoInativo;
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
    
    function setDataAvaliacao($dataAvaliacao) {
        $this->dataAvaliacao = $dataAvaliacao;
    }
    
    function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }
    
    function setObsObjetivo($obsObjetivo) {
        $this->obsObjetivo = $obsObjetivo;
    }
    
    function setMedTorax($medTorax) {
        $this->medTorax = $medTorax;
    }
    
    function setMedCinturaAlta($medCinturaAlta) {
        $this->medCinturaAlta = $medCinturaAlta;
    }
    
    function setMedCinturaAbdomen($medCinturaAbdomen) {
        $this->medCinturaAbdomen = $medCinturaAbdomen;
    }
    
    function setMedQuadril($medQuadril) {
        $this->medQuadril = $medQuadril;
    }
    
    function setMedCoxaDir($medCoxaDir) {
        $this->medCoxaDir = $medCoxaDir;
    }
    
    function setMedCoxaEsq($medCoxaEsq) {
        $this->medCoxaEsq = $medCoxaEsq;
    }
    
    function setMedPanturrilhaDir($medPanturrilhaDir) {
        $this->medPanturrilhaDir = $medPanturrilhaDir;
    }
    
    function setMedPanturrilhaEsq($medPanturrilhaEsq) {
        $this->medPanturrilhaEsq = $medPanturrilhaEsq;
    }
    
    function setMedBracoDir($medBracoDir) {
        $this->medBracoDir = $medBracoDir;
    }
    
    function setMedBracoEsq($medBracoEsq) {
        $this->medBracoEsq = $medBracoEsq;
    }
    
    function setMedAntebracoDir($medAntebracoDir) {
        $this->medAntebracoDir = $medAntebracoDir;
    }
    
    function setMedAntebracoEsq($medAntebracoEsq) {
        $this->medAntebracoEsq = $medAntebracoEsq;
    }
    
    function setPeso($peso) {
        $this->peso = $peso;
    }
    
    function setAltura($altura) {
        $this->altura = $altura;
    }
    
    function setAtivoInativo($ativoInativo) {
        $this->ativoInativo = $ativoInativo;
    }
    
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(Professor_id ,Aluno_id, dataAvaliacao, objetivo, obsObjetivo, medTorax, medCinturaAlta, medCinturaAbdomen, medQuadril, medCoxaDir, medCoxaEsq, medPanturrilhaDir, medPanturrilhaEsq, medBracoDir, medBracoEsq, medAntebracoDir, medAntebracoEsq, peso, altura) values(:Professor_id , :Aluno_id, :dataAvaliacao, :objetivo, :obsObjetivo, :medTorax, :medCinturaAlta, :medCinturaAbdomen, :medQuadril, :medCoxaDir, :medCoxaEsq, :medPanturrilhaDir, :medPanturrilhaEsq, :medBracoDir, :medBracoDir, :medAntebracoDir, :medAntebracoEsq, :peso, :altura)");
        $stmt->bindParam(":Professor_id", $this->Professor_id);
        $stmt->bindParam(":Aluno_id", $this->Aluno_id);
        $stmt->bindParam(":dataAvaliacao", $this->dataAvaliacao);
        $stmt->bindParam(":objetivo", $this->objetivo);
        $stmt->bindParam(":obsObjetivo", $this->obsObjetivo);
        $stmt->bindParam(":medTorax", $this->medTorax);
        $stmt->bindParam(":medCinturaAlta", $this->medCinturaAlta);
        $stmt->bindParam(":medCinturaAbdomen", $this->medCinturaAbdomen);
        $stmt->bindParam(":medQuadril", $this->medQuadril);
        $stmt->bindParam(":medCoxaDir", $this->medCoxaDir);
        $stmt->bindParam(":medCoxaEsq", $this->medCoxaEsq);
        $stmt->bindParam(":medPanturrilhaDir", $this->medPanturrilhaDir);
        $stmt->bindParam(":medPanturrilhaEsq", $this->medPanturrilhaEsq);
        $stmt->bindParam(":medBracoDir", $this->medBracoDir);
        $stmt->bindParam(":medBracoEsq", $this->medBracoEsq);
        $stmt->bindParam(":medAntebracoDir", $this->medAntebracoDir);
        $stmt->bindParam(":medAntebracoEsq", $this->medAntebracoEsq);
        $stmt->bindParam(":peso", $this->peso);
        $stmt->bindParam(":altura", $this->altura);
        $stmt->execute();
    }
    
    public function update() {
        $stmt = $this->db->prepare("update $this->table set dataAvaliacao = :dataAvaliacao, objetivo = :objetivo, obsObjetivo = :obsObjetivo, medTorax = :medTorax, medCinturaAlta = :medCinturaAlta, medCinturaAbdomen = :medCinturaAbdomen, medQuadril = :medQuadril, medCoxaDir = :medCoxaDir, medCoxaEsq = :medCoxaEsq, medPanturrilhaDir = :medPanturrilhaDir, medPanturrilhaEsq = :medPanturrilhaEsq, medBracoDir = :medBracoDir, medBracoEsq = :medBracoEsq, medAntebracoDir = :medAntebracoDir, medAntebracoEsq = :medAntebracoEsq, peso = :peso, altura = :altura where $this->table.id=:id");
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":dataAvaliacao", $this->dataAvaliacao);
        $stmt->bindParam(":objetivo", $this->objetivo);
        $stmt->bindParam(":obsObjetivo", $this->obsObjetivo);
        $stmt->bindParam(":medTorax", $this->medTorax);
        $stmt->bindParam(":medCinturaAlta", $this->medCinturaAlta);
        $stmt->bindParam(":medCinturaAbdomen", $this->medCinturaAbdomen);
        $stmt->bindParam(":medQuadril", $this->medQuadril);
        $stmt->bindParam(":medCoxaDir", $this->medCoxaDir);
        $stmt->bindParam(":medCoxaEsq", $this->medCoxaEsq);
        $stmt->bindParam(":medPanturrilhaDir", $this->medPanturrilhaDir);
        $stmt->bindParam(":medPanturrilhaEsq", $this->medPanturrilhaEsq);
        $stmt->bindParam(":medBracoDir", $this->medBracoDir);
        $stmt->bindParam(":medBracoEsq", $this->medBracoEsq);
        $stmt->bindParam(":medAntebracoDir", $this->medAntebracoDir);
        $stmt->bindParam(":medAntebracoEsq", $this->medAntebracoEsq);
        $stmt->bindParam(":peso", $this->peso);
        $stmt->bindParam(":altura", $this->altura);
        $stmt->execute();
    }
    
}//Fecha classe FichaAvaliacao
