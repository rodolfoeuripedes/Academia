<?php

require_once 'classCriadora.php';
require_once 'classContrato.php';

$id = $_POST['id'];

$Contrato = Criadora::criaContrato();

$Contrato->setId($id);
$Contrato->delete($id);
?>

<script type='text/javascript'>
    alert('Contrato deletado com sucesso!!!');
    location = 'principal_contrato.php';
</script>
