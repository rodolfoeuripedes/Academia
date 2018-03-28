<?php

require_once 'classCriadora.php';
require_once 'classFichaAvaliacao.php';

$id = $_POST['id'];

$FichaAvaliacao = Criadora::criaFichaAvaliacao();

$FichaAvaliacao->setId($id);
$FichaAvaliacao->delete($id);
?>

<script type='text/javascript'>
    alert('Ficha de Avaliação deletada com sucesso!!!');
    location = 'principal_fichaavaliacao.php';
</script>
