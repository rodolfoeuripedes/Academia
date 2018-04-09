<?php

require_once 'classCriadora.php';
require_once 'classTurma.php';

$id = $_POST['id'];
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
$local = $_POST['local'];
$Aluno_id = $_POST['Aluno_id'];

$Turma = Criadora::criaTurma();

$Turma->setId($id);
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
$Turma->update();
?>

<script type='text/javascript'>
    alert('Turma atualizada com sucesso!!!');
    if ("<?php echo $local; ?>"=="visualizar_turma"){
        location = 'conjunto_turma.php';
    } else {
        location = 'principal_turma.php';
    }
</script>
