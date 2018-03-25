<?php

require_once 'classCrud.php';

class Exercicio extends Crud {
    
    private $id;
    private $nome;
    private $localMusculo;
    private $membro;
    private $descricao;
    private $beneficio;
    private $contraIndicacao;
    private $indicacaoMedica;
    private $dificuldade;
    private $importancia;
    private $dataInserido;
    private $ativoInativo;
    protected $table = "exercicio";
    
    public function __construct(PDO $db) {
        parent::__construct($db);
    }
    
    function getId() {
        return $this->id;
    }
    
    function getNome() {
        return $this->nome;
    }
    
    function getLocalMusculo() {
        return $this->localMusculo;
    }
    
    function getMembro() {
        return $this->membro;
    }
    
    function getDescricao() {
        return $this->descricao;
    }
    
    function getBeneficio() {
        return $this->beneficio;
    }
    
    function getContraIndicacao() {
        return $this->contraIndicacao;
    }
    
    function getIndicacaoMedica() {
        return $this->indicacaoMedica;
    }
    
    function getDificuldade() {
        return $this->dificuldade;
    }
    
    function getImportancia() {
        return $this->importancia;
    }
    
    function getDataInserido() {
        return $this->dataInserido;
    }
    
    function getAtivoInativo() {
        return $this->ativoInativo;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function setLocalMusculo($localMusculo) {
        $this->localMusculo = $localMusculo;
    }
    
    function setMembro($membro) {
        $this->membro = $membro;
    }
    
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function setBeneficio($beneficio) {
        $this->beneficio = $beneficio;
    }
    
    function setContraIndicacao($contraIndicacao) {
        $this->contraIndicacao = $contraIndicacao;
    }
    
    function setIndicacaoMedica($indicacaoMedica) {
        $this->indicacaoMedica = $indicacaoMedica;
    }
    
    function setDificuldade($dificuldade) {
        $this->dificuldade = $dificuldade;
    }
    
    function setImportancia($importancia) {
        $this->importancia = $importancia;
    }
    
    function setDataInserido($dataInserido) {
        $this->dataInserido = $dataInserido;
    }
    
    function setAtivoInativo($ativoInativo) {
        $this->ativoInativo = $ativoInativo;
    }
    
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(nome, localMusculo, membro, descricao, beneficio, contraIndicacao, indicacaoMedica, dificuldade, importancia, dataInserido, ativoInativo) values(:nome, :localMusculo, :membro, :descricao, :beneficio, :contraIndicacao, :indicacaoMedica, :dificuldade, :importancia, :dataInserido, :ativoInativo)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":localMusculo", $this->localMusculo);
        $stmt->bindParam(":membro", $this->membro);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":beneficio", $this->beneficio);
        $stmt->bindParam(":contraIndicacao", $this->contraIndicacao);
        $stmt->bindParam(":indicacaoMedica", $this->indicacaoMedica);
        $stmt->bindParam(":dificuldade", $this->dificuldade);
        $stmt->bindParam(":importancia", $this->importancia);
        $stmt->bindParam(":dataInserido", $this->dataInserido);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
    public function update() {
        $stmt = $this->db->prepare("update $this->table set nome = :nome, localMusculo = :localMusculo, membro = :membro, descricao = :descricao, beneficio = :beneficio, contraIndicacao = :contraIndicacao, indicacaoMedica = :indicacaoMedica, dificuldade = :dificuldade, importancia = :importancia, dataInserido = :dataInserido, ativoInativo = :ativoInativo where $this->table.id=:id");
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":localMusculo", $this->localMusculo);
        $stmt->bindParam(":membro", $this->membro);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":beneficio", $this->beneficio);
        $stmt->bindParam(":contraIndicacao", $this->contraIndicacao);
        $stmt->bindParam(":indicacaoMedica", $this->indicacaoMedica);
        $stmt->bindParam(":dificuldade", $this->dificuldade);
        $stmt->bindParam(":importancia", $this->importancia);
        $stmt->bindParam(":dataInserido", $this->dataInserido);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
}//Fecha classe Exercicio
