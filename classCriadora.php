<?php

require_once 'classSingleton.php';
require_once 'classLogin.php';
require_once 'classAluno.php';
require_once 'classFuncionario.php';
require_once 'classProfessor.php';
require_once 'classContrato.php';
require_once 'classExercicio.php';

class Criadora {
    
    public static function criaLogin() {
        return new Login(ConexaoSingleton::getInstance());
    }
    
    public static function criaAluno() {
        return new Aluno(ConexaoSingleton::getInstance());
    }
    
    public static function criaFuncionario() {
        return new Funcionario(ConexaoSingleton::getInstance());
    }
    
    public static function criaProfessor() {
        return new Professor(ConexaoSingleton::getInstance());
    }
    
    public static function criaContrato() {
        return new Contrato(ConexaoSingleton::getInstance());
    }
    
    public static function criaExercicio() {
        return new Exercicio(ConexaoSingleton::getInstance());
    }
    
}//Fecha classe Criadora
