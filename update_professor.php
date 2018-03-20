<?php

require_once 'classCriadora.php';
require_once 'classProfessor.php';

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
$salario = $_POST['salario'];
$cargo = $_POST['cargo'];
$senha = $_POST['senha'];
$especialidade = $_POST['especialidade'];
$ativoInativo = $_POST['ativoInativo'];

$Professor = Criadora::criaProfessor();

$Professor->setId($id);
$Professor->setNome($nome);
$Professor->setDataNasc($dataNasc);
$Professor->setCpf($cpf);
$Professor->setRg($rg);
$Professor->setSexo($sexo);
$Professor->setEndereco($endereco);
$Professor->setFoneCasa($foneCasa);
$Professor->setFoneCelular($foneCelular);
$Professor->setEstadoCivil($estadoCivil);
$Professor->setProfissao($profissao);
$Professor->setEmail($email);
$Professor->setSalario($salario);
$Professor->setCargo($cargo);
$Professor->setSenha($senha);
$Professor->setEspecialidade($especialidade);
$profissao->setAtivoInativo($ativoInativo);
$Professor->update();

echo "<h1 align='center' />Professor atualizado com sucesso!!!";
