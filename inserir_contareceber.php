<?php

require_once 'classCriadora.php';
require_once 'classContaReceber.php';

$Aluno_id = $_POST['Aluno_id'];
$valorFinal = $_POST['valorFinal'];
$dataPagamento = $_POST['dataPagamento'];
$formaPagam = $_POST['formaPagam'];
$descricao = $_POST['descricao'];

$db = Criadora::criaDB();
$stmt = $db->prepare("select * from contrato where Aluno_id=:Aluno_id order by id DESC");
$stmt->bindParam(":Aluno_id", $Aluno_id);
$stmt->execute();
$result = $stmt->fetch();

if (isset($result['id'])) {

    $ContaReceber = Criadora::criaContaReceber();

    $ContaReceber->setAluno_id($Aluno_id);
    $ContaReceber->setContrato_id($result['id']);
    $ContaReceber->setValor($result['valor']);
    $ContaReceber->setDesconto($result['desconto']);
    $ContaReceber->setJuros($result['juros']);
    $ContaReceber->setValorFinal($valorFinal);
    $ContaReceber->setDiaVencimento($result['diaVencPagam']);
    $ContaReceber->setDataPagamento($dataPagamento);
    $ContaReceber->setFormaPagam($formaPagam);
    $ContaReceber->setDescricao($descricao);
    $ContaReceber->insert();
    ?>
    <script type='text/javascript'>
        alert('Conta recebida com sucesso!!!');
        location = 'principal_contareceber.php';
    </script>
    <?php

} else {
    ?>
    <script type='text/javascript'>
        alert('Não existe contrato cadastrado com este aluno.');
        location = 'principal_contareceber.php';
    </script>
    <?php

}
