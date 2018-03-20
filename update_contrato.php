<?php

require_once 'classCriadora.php';
require_once 'classContrato.php';

$id = $_POST['id'];
$dataInicio = $_POST['dataInicio'];
$dataTermino = $_POST['dataTermino'];
$tipo = $_POST['tipo'];
$valor = $_POST['valor'];
$desconto = $_POST['desconto'];
$juros = $_POST['juros'];
$diaVencPagam = $_POST['diaVencPagam'];
$descricao = $_POST['descricao'];
$qtdRenovacao = $_POST['qtdRenovacao'];
$avaliacaoMedica = $_POST['avaliacaoMedica'];
$dataAvaliacao = $_POST['dataAvaliacao'];
$ativoInativo = $_POST['ativoInativo'];

$Contrato = Criadora::criaContrato();

$Contrato->setId($id);
$Contrato->setDataInicio($dataInicio);
$Contrato->setDataTermino($dataTermino);
$Contrato->setTipo($tipo);
$Contrato->setValor($valor);
$Contrato->setDesconto($desconto);
$Contrato->setJuros($juros);
$Contrato->setDiaVencPagam($diaVencPagam);
$Contrato->setDescricao($descricao);
$Contrato->setQtdRenovacao($qtdRenovacao);
$Contrato->setAvaliacaoMedica($avaliacaoMedica);
$Contrato->setDataAvaliacao($dataAvaliacao);
$Contrato->setAtivoInativo($ativoInativo);
$Contrato->update();
?>

<script type='text/javascript'>
    alert('Contrato atualizado com sucesso!!!');
    location = 'principal_contrato.php';
</script>
