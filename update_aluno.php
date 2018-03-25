<?php

require_once 'classCriadora.php';
require_once 'classAluno.php';

$id = $_POST['id'];
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
$avaliacao = $_POST['avaliacao'];
$ativoInativo = $_POST['ativoInativo'];

$Aluno = Criadora::criaAluno();

$Aluno->setId($id);
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
$Aluno->setAvaliacao($avaliacao);
$Aluno->setAtivoInativo($ativoInativo);
$Aluno->update();

echo "<h1 align='center' />Aluno atualizado com sucesso!!!";
