<?php

require_once 'classCrud.php';

class Contrato extends Crud {
    
    private $id;
    private $Aluno_id;
    private $dataInicio;
    private $dataTermino;
    private $tipo;
    private $valor;
    private $desconto;
    private $juros;
    private $diaVencPagam;
    private $descricao;
    private $qtdRenovacao;
    private $avaliacaoMedica;
    private $dataAvaliacao;
    private $ativoInativo;
    protected $table = "contrato";
    
    public function __construct(PDO $db) {
        parent::__construct($db);
    }
    
    function getId() {
        return $this->id;
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
    
    function getTipo() {
        return $this->tipo;
    }
    
    function getValor() {
        return $this->valor;
    }
    
    function getDesconto() {
        return $this->desconto;
    }
    
    function getJuros() {
        return $this->juros;
    }
    
    function getDiaVencPagam() {
        return $this->diaVencPagam;
    }
    
    function getDescricao() {
        return $this->descricao;
    }
    
    function getQtdRenovacao() {
        return $this->qtdRenovacao;
    }
    
    function getAvaliacaoMedica() {
        return $this->avaliacaoMedica;
    }
    
    function getDataAvaliacao() {
        return $this->dataAvaliacao;
    }
    
    function getAtivoInativo() {
        return $this->ativoInativo;
    }
    
    function setId($id) {
        $this->id = $id;
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
    
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    function setValor($valor) {
        $this->valor = $valor;
    }
    
    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }
    
    function setJuros($juros) {
        $this->juros = $juros;
    }
    
    function setDiaVencPagam($diaVencPagam) {
        $this->diaVencPagam = $diaVencPagam;
    }
    
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function setQtdRenovacao($qtdRenovacao) {
        $this->qtdRenovacao = $qtdRenovacao;
    }
    
    function setAvaliacaoMedica($avaliacaoMedica) {
        $this->avaliacaoMedica = $avaliacaoMedica;
    }
    
    function setDataAvaliacao($dataAvaliacao) {
        $this->dataAvaliacao = $dataAvaliacao;
    }
    
    function setAtivoInativo($ativoInativo) {
        $this->ativoInativo = $ativoInativo;
    }
    
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(Aluno_id, dataInicio, dataTermino, tipo, valor, desconto, juros, diaVencPagam, descricao, qtdRenovacao, avaliacaoMedica, dataAvaliacao, ativoInativo) values(:Aluno_id, :dataInicio, :dataTermino, :tipo, :valor, :desconto, :juros, :diaVencPagam, :descricao, :qtdRenovacao, :avaliacaoMedica, :dataAvaliacao, :ativoInativo)");
        $stmt->bindParam(":Aluno_id", $this->Aluno_id);
        $stmt->bindParam(":dataInicio", $this->dataInicio);
        $stmt->bindParam(":dataTermino", $this->dataTermino);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":valor", $this->valor);
        $stmt->bindParam(":desconto", $this->desconto);
        $stmt->bindParam(":juros", $this->juros);
        $stmt->bindParam(":diaVencPagam", $this->diaVencPagam);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":qtdRenovacao", $this->qtdRenovacao);
        $stmt->bindParam(":avaliacaoMedica", $this->avaliacaoMedica);
        $stmt->bindParam(":dataAvaliacao", $this->dataAvaliacao);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
    public function update() {
        $stmt = $this->db->prepare("update $this->table set dataInicio = :dataInicio, dataTermino = :dataTermino, tipo = :tipo, valor = :valor, desconto = :desconto, juros = :juros, diaVencPagam = :diaVencPagam, descricao = :descricao, qtdRenovacao = :qtdRenovacao, avaliacaoMedica = :avaliacaoMedica, dataAvaliacao = :dataAvaliacao, ativoInativo = :ativoInativo where id=:id");
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":dataInicio", $this->dataInicio);
        $stmt->bindParam(":dataTermino", $this->dataTermino);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":valor", $this->valor);
        $stmt->bindParam(":desconto", $this->desconto);
        $stmt->bindParam(":juros", $this->juros);
        $stmt->bindParam(":diaVencPagam", $this->diaVencPagam);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":qtdRenovacao", $this->qtdRenovacao);
        $stmt->bindParam(":avaliacaoMedica", $this->avaliacaoMedica);
        $stmt->bindParam(":dataAvaliacao", $this->dataAvaliacao);
        $stmt->bindParam(":ativoInativo", $this->ativoInativo);
        $stmt->execute();
    }
    
}//Fecha classe Contrato
