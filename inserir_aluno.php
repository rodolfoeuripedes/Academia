<?php

require_once 'classCriadora.php';
require_once 'classAluno.php';


$nome = $_POST['nome'];
$dataNasc = $_POST['dataNasc'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$sexo = $_POST['sexo'];
$endereco = $_POST['endereco'];
$foneCasa = $_POST['foneCasa'];
$foneCelular = $_POST['foneCelular'];
$estadoCivil = $_POST['estadoCivil'];
$profissao = $_POST['profissao'];
$email = $_POST['email'];


$Aluno = Criadora::criaAluno();


$Aluno->setNome($nome);
$Aluno->setDataNasc($dataNasc);
$Aluno->setCpf($cpf);
$Aluno->setRg($rg);
$Aluno->setSexo($sexo);
$Aluno->setEndereco($endereco);
$Aluno->setFoneCasa($foneCasa);
$Aluno->setFoneCelular($foneCelular);
$Aluno->setEstadoCivil($estadoCivil);
$Aluno->setProfissao($profissao);
$Aluno->setEmail($email);
$Aluno->setAtivoInativo(1);
$Aluno->insert();

echo "<h1 align='center' />Aluno inserido com sucesso!!!";
