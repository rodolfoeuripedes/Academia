<?php

require_once 'classCriadora.php';
require_once 'classFuncionario.php';

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
$ativoInativo = $_POST['ativoInativo'];

$Funcionario = Criadora::criaFuncionario();

$Funcionario->setId($id);
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
$Funcionario->setAtivoInativo($ativoInativo);
$Funcionario->update();
?>

<script type='text/javascript'>
    alert('Funcionario atualizado com sucesso!!!');
    location = 'principal_funcionario.php';
</script>
