<?php

require_once 'classCrud.php';

class ContaReceber extends Crud {
    
    private $id;
    private $Aluno_id;
    private $Contrato_id;
    private $valor;
    private $desconto;
    private $juros;
    private $valorFinal;
    private $diaVencimento;
    private $dataPagamento;
    private $formaPagam;
    private $descricao;
    protected $table = "contareceber";
    
    public function __construct(PDO $db) {
        parent::__construct($db);
    }
    
    function getId() {
        return $this->id;
    }
    
    function getAluno_id() {
        return $this->Aluno_id;
    }
    
    function getContrato_id() {
        return $this->Contrato_id;
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
    
    function getValorFinal() {
        return $this->valorFinal;
    }
    
    function getDiaVencimento() {
        return $this->diaVencimento;
    }
    
    function getDataPagamento() {
        return $this->dataPagamento;
    }
    
    function getFormaPagam() {
        return $this->formaPagam;
    }
    
    function getDescricao() {
        return $this->descricao;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setAluno_id($Aluno_id) {
        $this->Aluno_id = $Aluno_id;
    }
    
    function setContrato_id($Contrato_id) {
        $this->Contrato_id = $Contrato_id;
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
    
    function setValorFinal($valorFinal) {
        $this->valorFinal = $valorFinal;
    }
    
    function setDiaVencimento($diaVencimento) {
        $this->diaVencimento = $diaVencimento;
    }
    
    function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }
    
    function setFormaPagam($formaPagam) {
        $this->formaPagam = $formaPagam;
    }
    
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    public function insert() {
        $stmt = $this->db->prepare("insert into $this->table(Aluno_id, Contrato_id, valor, desconto, juros, valorFinal, diaVencimento, dataPagamento, formaPagam, descricao) values(:Aluno_id, :Contrato_id, :valor, :desconto, :juros, :valorFinal, :diaVencimento, :dataPagamento, :formaPagam, :descricao)");
        $stmt->bindParam(":Aluno_id", $this->Aluno_id);
        $stmt->bindParam(":Contrato_id", $this->Contrato_id);
        $stmt->bindParam(":valor", $this->valor);
        $stmt->bindParam(":desconto", $this->desconto);
        $stmt->bindParam(":juros", $this->juros);
        $stmt->bindParam(":valorFinal", $this->valorFinal);
        $stmt->bindParam(":diaVencimento", $this->diaVencimento);
        $stmt->bindParam(":dataPagamento", $this->dataPagamento);
        $stmt->bindParam(":formaPagam", $this->formaPagam);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->execute();
    }
    
    public function update() {
        
    }
    
}//Fecha classe ContaReceber
