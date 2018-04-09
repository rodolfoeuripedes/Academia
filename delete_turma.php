<?php

require_once 'classCriadora.php';
require_once 'classTurma.php';

$id = $_POST['id'];
$local = $_POST['local'];

$Turma = Criadora::criaTurma();

$Turma->setId($id);
$Turma->delete($id);
?>

<script type='text/javascript'>
    alert('Turma deletada com sucesso!!!');
    if ("<?php echo $local; ?>"=="visualizar_turma"){
        location = 'conjunto_turma.php';
    } else {
        location = 'principal_turma.php';
    }
</script>
