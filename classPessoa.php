<?php

require_once 'classCrud.php';

abstract class Pessoa extends Crud {
    
    protected $nome;
    protected $dataNasc;
    protected $cpf;
    protected $rg;
    protected $sexo;
    protected $endereco;
    protected $foneCasa;
    protected $foneCelular;
    protected $estadoCivil;
    protected $profissao;
    protected $email;
    protected $ativoInativo;
    
    public function __construct($db) {
        parent::__construct($db);
    }
    
    function getNome() {
        return $this->nome;
    }
    
    function getDataNasc() {
        return $this->dataNasc;
    }
    
    function getCpf() {
        return $this->cpf;
    }
    
    function getRg() {
        return $this->rg;
    }
    
    function getSexo() {
        return $this->sexo;
    }
    
    function getEndereco() {
        return $this->endereco;
    }
    
    function getFoneCasa() {
        return $this->foneCasa;
    }
    
    function getFoneCelular() {
        return $this->foneCelular;
    }
    
    function getEstadoCivil() {
        return $this->estadoCivil;
    }
    
    function getProfissao() {
        return $this->profissao;
    }
    
    function getEmail() {
        return $this->email;
    }
    
    function getAtivoInativo() {
        return $this->ativoInativo;
    }
    
    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }
    
    function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    
    function setRg($rg) {
        $this->rg = $rg;
    }
    
    function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    
    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    
    function setFoneCasa($foneCasa) {
        $this->foneCasa = $foneCasa;
    }
    
    function setFoneCelular($foneCelular) {
        $this->foneCelular = $foneCelular;
    }
    
    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }
    
    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }
    
    function setEmail($email) {
        $this->email = $email;
    }
    
    function setAtivoInativo($ativoInativo) {
        $this->ativoInativo = $ativoInativo;
    }
    
}//Fecha classe Pessoa
