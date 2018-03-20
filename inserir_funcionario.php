<?php

require_once 'classCriadora.php';
require_once 'classFuncionario.php';


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


$Funcionario = Criadora::criaFuncionario();


$Funcionario->setNome($nome);
$Funcionario->setDataNasc($dataNasc);
$Funcionario->setCpf($cpf);
$Funcionario->setRg($rg);
$Funcionario->setSexo($sexo);
$Funcionario->setEndereco($endereco);
$Funcionario->setFoneCasa($foneCasa);
$Funcionario->setFoneCelular($foneCelular);
$Funcionario->setEstadoCivil($estadoCivil);
$Funcionario->setProfissao($profissao);
$Funcionario->setEmail($email);
$Funcionario->setSalario($salario);
$Funcionario->setCargo($cargo);
$Funcionario->setSenha($senha);
$Funcionario->setAtivoInativo(1);
$Funcionario->insert();

echo "<h1 align='center' />Funcionario inserido com sucesso!!!";
