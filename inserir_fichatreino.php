<?php

require_once 'classCriadora.php';
require_once 'classFichaTreino.php';

$Professor_id = $_POST['Professor_id'];
$Aluno_id = $_POST['Aluno_id'];
$dataInicio = $_POST['dataInicio'];
$dataTermino = $_POST['dataTermino'];
$descricao = $_POST['descricao'];
$dificuldade = $_POST['dificuldade'];

$Exercicio_id = $_POST['Exercicio_id'];
$treino = $_POST['treino'];
$serie = $_POST['serie'];
$repeticao = $_POST['repeticao'];
$carga = $_POST['carga'];

$FichaTreino = Criadora::criaFichaTreino();

$FichaTreino->setProfessor_id($Professor_id);
$FichaTreino->setAluno_id($Aluno_id);
$FichaTreino->setDataInicio($dataInicio);
$FichaTreino->setDataTermino($dataTermino);
$FichaTreino->setDescricao($descricao);
$FichaTreino->setDificuldade($dificuldade);
$FichaTreino->setExercicio_id($Exercicio_id);
$FichaTreino->setTreino($treino);
$FichaTreino->setSerie($serie);
$FichaTreino->setRepeticao($repeticao);
$FichaTreino->setCarga($carga);
$FichaTreino->insert();
?>

<script type='text/javascript'>
    alert('Ficha de Treino inserida com sucesso!!!');
    location = 'principal_fichatreino.php';
</script>
