<?php

require_once 'classCriadora.php';
require_once 'classExercicio.php';

$id = $_POST['id'];

$Exercicio = Criadora::criaExercicio();

$Exercicio->setId($id);
$Exercicio->delete($id);
?>

<script type='text/javascript'>
    alert('Exercicio deletado com sucesso!!!');
    location = 'principal_exercicio.php';
</script>
