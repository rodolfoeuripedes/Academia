<?php

require_once 'classCriadora.php';
require_once 'classFichaTreino.php';

$id = $_POST['id'];
$dataInicio = $_POST['dataInicio'];
$dataTermino = $_POST['dataTermino'];
$descricao = $_POST['descricao'];
$dificuldade = $_POST['dificuldade'];

$Exercicio_id = $_POST['Exercicio_id'];
$treino = $_POST['treino'];
$serie = $_POST['serie'];
$repeticao = $_POST['repeticao'];
$carga = $_POST['carga'];
$local = $_POST['local'];

$FichaTreino = Criadora::criaFichaTreino();

$FichaTreino->setId($id);
$FichaTreino->setDataInicio($dataInicio);
$FichaTreino->setDataTermino($dataTermino);
$FichaTreino->setDescricao($descricao);
$FichaTreino->setDificuldade($dificuldade);
$FichaTreino->setExercicio_id($Exercicio_id);
$FichaTreino->setTreino($treino);
$FichaTreino->setSerie($serie);
$FichaTreino->setRepeticao($repeticao);
$FichaTreino->setCarga($carga);
$FichaTreino->update();
?>

<script type='text/javascript'>
    alert('Ficha de Treino atualizada com sucesso!!!');
    if ("<?php echo $local; ?>"=="visualizar_fichatreino"){
        location = 'conjunto_fichatreino.php';
    } else {
        location = 'principal_fichatreino.php';
    }
</script>
