<?php

require_once 'classCriadora.php';
require_once 'classContaReceber.php';


$ContaReceber = Criadora::criaFichaAvaliacao();

$ContaReceber->update();
?>

<script type='text/javascript'>
    alert('Conta a Receber atualizada com sucesso!!!');
    location = 'principal_fichaavaliacao.php';
</script>
