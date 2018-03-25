<?php

require_once 'classCriadora.php';
require_once 'classExercicio.php';


$nome = $_POST['nome'];
$localMusculo = $_POST['localMusculo'];
$membro = $_POST['membro'];
$descricao = $_POST['descricao'];
$beneficio = $_POST['beneficio'];
$contraIndicacao = $_POST['contraIndicacao'];
$indicacaoMedica = $_POST['indicacaoMedica'];
$dificuldade = $_POST['dificuldade'];
$importancia = $_POST['importancia'];
$dataInserido = $_POST['dataInserido'];


$Exercicio = Criadora::criaExercicio();


$Exercicio->setNome($nome);
$Exercicio->setLocalMusculo($localMusculo);
$Exercicio->setMembro($membro);
$Exercicio->setDescricao($descricao);
$Exercicio->setBeneficio($beneficio);
$Exercicio->setContraIndicacao($contraIndicacao);
$Exercicio->setIndicacaoMedica($indicacaoMedica);
$Exercicio->setDificuldade($dificuldade);
$Exercicio->setImportancia($importancia);
$Exercicio->setDataInserido($dataInserido);
$Exercicio->setAtivoInativo(1);
$Exercicio->insert();
?>

<script type='text/javascript'>
    alert('Exercicio inserido com sucesso!!!');
    location = 'principal_exercicio.php';
</script>
