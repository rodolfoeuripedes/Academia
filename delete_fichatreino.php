<?php

require_once 'classCriadora.php';
require_once 'classFichaTreino.php';

$id = $_POST['id'];
$local = $_POST['local'];

$FichaTreino = Criadora::criaFichaTreino();

$FichaTreino->setId($id);
$FichaTreino->delete($id);
?>

<script type='text/javascript'>
    alert('Ficha de Treino deletada com sucesso!!!');
    if ("<?php echo $local; ?>"=="visualizar_fichatreino"){
        location = 'conjunto_fichatreino.php';
    } else {
        location = 'principal_fichatreino.php';
    }
</script>
