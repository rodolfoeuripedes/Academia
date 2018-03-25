<?php

require_once 'classCriadora.php';
require_once 'classExercicio.php';

$id = $_POST['id'];
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
$ativoInativo = $_POST['ativoInativo'];

$Exercicio = Criadora::criaExercicio();

$Exercicio->setId($id);
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
$Exercicio->setAtivoInativo($ativoInativo);
$Exercicio->update();
?>

<script type='text/javascript'>
    alert('Exercicio atualizado com sucesso!!!');
    location = 'principal_exercicio.php';
</script>
