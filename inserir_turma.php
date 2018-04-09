<?php

require_once 'classCriadora.php';
require_once 'classTurma.php';

$Professor_id = $_POST['Professor_id'];
$nome = $_POST['nome'];
$turno = $_POST['turno'];
$qtdAluno = $_POST['qtdAluno'];
$carHorSem = $_POST['carHorSem'];
$diasSemana = $_POST['diasSemana'];
$dataInicio = $_POST['dataInicio'];
$dataTermino = $_POST['dataTermino'];
$horaInicio = $_POST['horaInicio'];
$horaTermino = $_POST['horaTermino'];
$avaliacao = $_POST['avaliacao'];
$situacao = $_POST['situacao'];
$Aluno_id = $_POST['Aluno_id'];

//$n = count($_POST['Aluno_id']);
$Turma = Criadora::criaTurma();

$Turma->setProfessor_id($Professor_id);
$Turma->setNome($nome);
$Turma->setTurno($turno);
$Turma->setQtdAluno($qtdAluno);
$Turma->setCarHorSem($carHorSem);
$Turma->setDiasSemana($diasSemana);
$Turma->setDataInicio($dataInicio);
$Turma->setDataTermino($dataTermino);
$Turma->setHoraInicio($horaInicio);
$Turma->setHoraTermino($horaTermino);
$Turma->setAvaliacao($avaliacao);
$Turma->setSituacao($situacao);
$Turma->setAluno_id($Aluno_id);
$Turma->insert();
?>

<script type='text/javascript'>
    alert('Turma inserida com sucesso!!!');
    location = 'principal_turma.php';
</script>
