<?php

require_once 'classCriadora.php';

$db = Criadora::criaDB();

if (isset($_POST['nomeAluno'])){
$nomeAluno = $_POST['nomeAluno'];
}
if (isset($_POST['anoPagamento'])){
$anoPagamento = $_POST['anoPagamento'];
}
if (isset($_POST['formaPagamento'])){
$formaPagamento = $_POST['formaPagamento'];
}

?>

<html>
    <head>
        <title>Principal Conta a Receber</title>
        <style type="text/css">
            table#alter tr.dif td {
                background: #D0FFD0;
            }
            table#alter tr td {
                background: #FFF68F;
            }
        </style>
    </head>
    <body>

<!-- ===================Inserir nova conta a receber=================== -->
<?php
$todosAlunos = $db->prepare("select * from aluno where ativoInativo like '1' order by nome");
$todosAlunos->execute();
?>
    <b>Inserir Conta a Receber</b>
    <br>
    <table border='1'>
        <thead>
        <tr>
            <th width='250'>Nome do Aluno</th>
            <th width='80'>Valor Final</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Pagamento</th>
            <th width='80'>Forma Pagamento</th>
            <th width='60'>Descrição</th>
            <th width='60'>Inserir</th>
        </tr>
        </thead>
        <tbody>
        <form name='inserir' method='post' action='inserir_contareceber.php' target='mainFrame_contareceber'>
            <tr>
                <td width='250'>
                    <select name='Aluno_id' required>
                        <option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>
                        <?php
                        while ($row = $todosAlunos->fetch()) {
                            echo "<option value='".$row['0']."'>".$row['1']."</option>";
                        }
                        ?>
                    </select></td>
                <td><input type='text' size='10' name='valorFinal' value='' required></td>
                <td><input type='date' size='10' name='dataPagamento' value='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='text' size='15' name='formaPagam' value='' required></td>
                <td><input type='text' size='40' name='descricao' value=''></td>
                <td><input type='submit' name='Submit' value='Inserir'></td>
            </tr>
        </form>
        </tbody>
    </table>

<!-- ===================Listar contas a receber=================== -->
<?php
if (isset($_POST['nomeAluno'])){
$stmt = $db->prepare("select c.id, a.nome, c.Contrato_id, c.valor, c.desconto, c.juros, c.valorFinal, c.diaVencimento, c.dataPagamento, c.formaPagam, c.descricao  from contareceber c, aluno a where c.Aluno_id=a.id and a.nome like '%$nomeAluno%' and YEAR(c.dataPagamento) like '$anoPagamento%' and c.formaPagam like '$formaPagamento%' order by a.nome ASC, c.dataPagamento DESC");
}
else {
$stmt = $db->prepare("select c.id, a.nome, c.Contrato_id, c.valor, c.desconto, c.juros, c.valorFinal, c.diaVencimento, c.dataPagamento, c.formaPagam, c.descricao  from contareceber c, aluno a where c.Aluno_id=a.id order by a.nome ASC, c.dataPagamento DESC");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<br>
<BR>
<b>Lista de Contas a Receber. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
    <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Aluno</th>
            <th width='80'>Contrato</th>
            <th width='80'>Valor</th>
            <th width='80'>Desconto</th>
            <th width='80'>Juros</th>
            <th width='80'>Valor Final</th>
            <th width='80'>Dia Vencimento</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Pagamento</th>
            <th width='80'>Forma Pagamento</th>
            <th width='80'>Descrição</th>
	</tr>
    </thead>
    <tbody>
<?php
$num = 0;
while ($row = $stmt->fetch()) {
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_contareceber.php' target='mainFrame_contareceber'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td nowrap='nowrap' width='275'>".$row['1']."</td>
            <td nowrap='nowrap' width='80'>".$row['2']."</td>
            <td nowrap='nowrap' width='80'>".$row['3']."</td>
            <td nowrap='nowrap' width='80'>".$row['4']."</td>
            <td nowrap='nowrap' width='80'>".$row['5']."</td>
            <td nowrap='nowrap' width='80'>".$row['6']."</td>
            <td nowrap='nowrap' width='80'>".$row['7']."</td>
            <td><input type='date' size='10' name='dataAvaliacao' value='".$row['8']."' style='$style' required></td>
            <td nowrap='nowrap' width='100'>".$row['9']."</td>
            <td nowrap='nowrap' width='250'>".$row['10']."</td>
            </form>
        </tr>";
        $num++;
} //Fecha while
echo "</tbody>
      </table>
      <br>";

?>
           </tbody>
        </table>
        <br>
    </body>
</html>
