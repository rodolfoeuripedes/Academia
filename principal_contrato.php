<?php

require_once 'classSingleton.php';
require_once 'classCriadora.php';
require_once 'classContrato.php';

$db = ConexaoSingleton::getInstance();

if (isset($_POST['nome'])){
$nome = $_POST['nome'];
}
if (isset($_POST['anoInicio'])){
$anoInicio = $_POST['anoInicio'];
}
if (isset($_POST['anoTermino'])){
$anoTermino = $_POST['anoTermino'];
}

?>

<html>
    <head>
        <title>Principal Contrato</title>
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

<!-- ===================Inserir novo contrato=================== -->
<?php
$todosAlunos = $db->prepare("select * from aluno where ativoInativo like '1' order by nome");
$todosAlunos->execute();
?>
    <b>Inserir Contrato</b>
    <br>
    <table border='1'>
        <thead>
        <tr>
            <th width='250'>Nome do Aluno</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='60'>Data Termino</th>
            <th width='80'>Tipo</th>
            <th width='80'>Valor (R$)</th>
            <th width='40'>Desconto (R$)</th>
            <th width='80'>Juros Atraso Pagam. (%)</th>
            <th width='20'>Dia Venc. Pagam.</th>
            <th width='60'>Descrição</th>
            <th width='60'>Qtd. Renovação</th>
            <th width='60'>Avaliacao Médica</th>
            <th width='60'>Data Avaliação</th>
            <th width='60'>Inserir</th>
        </tr>
        </thead>
        <tbody>
        <form name='inserir' method='post' action='inserir_contrato.php' target='mainFrame_contrato'>
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
                <td><input type='date' size='10' name='dataInicio' value='<?php echo date("Y-m-d") ?>' min='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='date' size='10' name='dataTermino' value='' required></td>
                <td><input type='text' size='10' name='tipo' value='' required></td>
                <td><input type='text' size='10' name='valor' value='' required></td>
                <td><input type='text' size='10' name='desconto' value=''></td>
                <td><input type='text' size='10' name='juros' value='' placeholder='1.5' required></td>
                <td><input type='number' name='diaVencPagam' value='' style='width: 5em' min='1' max='31' required></td>
                <td><input type='text' size='18' name='descricao' value=''></td>
                <td><input type='number' name='qtdRenovacao' value='0' style='width: 6em' min='0' required></td>
                <td><select name='avaliacaoMedica' required>
                        <option value=''>&#8195;&#8195;&#8195;</option>
                        <option value='sim'>Sim</option>
                        <option value='nao'>Não</option>
                    </select></td>
                <td><input type='date' size='10' name='dataAvaliacao' value=''></td>
                <td><input type='submit' name='Submit' value='Inserir'></td>
            </tr>
        </form>
        </tbody>
    </table>

<!-- ===================Listar contratos ativos=================== -->
<?php
if (isset($_POST['nome'])){
$stmt = $db->prepare("select c.id, a.nome, c.dataInicio, c.dataTermino, c.tipo, c.valor, c.desconto, c.juros, c.diaVencPagam, c.descricao, c.qtdRenovacao, c.avaliacaoMedica, c.dataAvaliacao, c.ativoInativo, a.id from aluno a, contrato c where c.ativoInativo like '1' and c.Aluno_id=a.id and a.nome like '%$nome%' and YEAR(c.dataInicio) like '$anoInicio%' and YEAR(c.dataTermino) like '$anoTermino%' order by a.nome");
}
else {
$stmt = $db->prepare("select c.id, a.nome, c.dataInicio, c.dataTermino, c.tipo, c.valor, c.desconto, c.juros, c.diaVencPagam, c.descricao, c.qtdRenovacao, c.avaliacaoMedica, c.dataAvaliacao, c.ativoInativo, a.id from aluno a, contrato c where c.ativoInativo like '1' and c.Aluno_id=a.id order by a.nome");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<br>
<BR>
<b>Lista de Contratos Ativos. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
    <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Aluno</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='60'>Data Termino</th>
            <th width='80'>Tipo</th>
            <th width='80'>Valor (R$)</th>
            <th width='40'>Desconto (R$)</th>
            <th width='80'>Juros Atraso Pagam. (%)</th>
            <th width='60'>Dia Venc. Pagam.</th>
            <th width='60'>Descrição</th>
            <th width='60'>Qtd. Renovação</th>
            <th width='60'>Avaliacao Médica</th>
            <th width='60'>Data Avaliação</th>
            <th width='60'>Ativo/Inativo</th>
            <th width='60'>Atualizar Dados</th>
            <th width='60'>Visualizar Contrato</th>
            <th width='60'>Deletar Contrato</th>
	</tr>
    </thead>
    <tbody>
<?php
$num = 0;
while ($row = $stmt->fetch()) {
    if ($row['13']==1){
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_contrato.php' target='mainFrame_contrato'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td nowrap='nowrap' width='250'>".$row['1']."</td>
            <td><input type='date' size='10' name='dataInicio' value='".$row['2']."' style='$style' required></td>
            <td><input type='date' size='10' name='dataTermino' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='10' name='tipo' value='".$row['4']."' style='$style' required></td>
            <td><input type='text' size='10' name='valor' value='".$row['5']."' style='$style' required></td>
            <td><input type='text' size='10' name='desconto' value='".$row['6']."' style='$style'></td>
            <td><input type='text' size='10' name='juros' value='".$row['7']."' style='$style' required></td>
            <td><input type='number' name='diaVencPagam' value='".$row['8']."' style='$style; width: 5em' min='1' max='31' required></td>
            <td><input type='text' size='18' name='descricao' value='".$row['9']."' style='$style'></td>
            <td><input type='number' name='qtdRenovacao' value='".$row['10']."' style='$style; width: 6em' min='0' required></td>
            <td><select name='avaliacaoMedica' style='$style' required>"; ?>
                <option value=''>&#8195;&#8195;&#8195;</option>
                <option value='sim' <?php echo $row['11'] == 'sim' ? 'selected':'' ?> >Sim &#8195;</option>
                <option value='nao' <?php echo $row['11'] == 'nao' ? 'selected':'' ?> >Não &#8195;</option>
     <?php echo"</select></td>
            <td><input type='date' size='10' name='dataAvaliacao' value='".$row['12']."' style='$style'></td>
            <td><select name='ativoInativo' style='$style'>"; ?>
                <option value='1' <?php echo $row['13'] == 1 ? 'selected':'' ?> >Ativo &#8195;&#8195;</option>
                <option value='0' <?php echo $row['13'] == 0 ? 'selected':'' ?> >Inativo &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td><input type='submit' name='Submit' value='Atualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='imprimir_contrato.php' target='mainFrame'>
            <td><input type='hidden' name='id' value='".$row['0']."'>
                <input type='hidden' name='Aluno_id' value='".$row['14']."'>
                <input type='submit' name='Submit' value='Visualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='delete_contrato.php' target='mainFrame_contrato'>
            <td><input type='hidden' name='id' value='".$row['0']."'>
                <input type='submit' name='Submit' value='Deletar'></td>
            </form>
        </tr>";
        $num++;
    } //Fecha if
} //Fecha while
echo "</tbody>
      </table>
      <br>";

//===================Listar contratos inativos===================

if (isset($_POST['nome'])){
$stmt = $db->prepare("select c.id, a.nome, c.dataInicio, c.dataTermino, c.tipo, c.valor, c.desconto, c.juros, c.diaVencPagam, c.descricao, c.qtdRenovacao, c.avaliacaoMedica, c.dataAvaliacao, c.ativoInativo, a.id from aluno a, contrato c where c.ativoInativo like '0' and c.Aluno_id=a.id and nome like '%$nome%' and YEAR(c.dataInicio) like '$anoInicio%' and YEAR(c.dataTermino) like '$anoTermino%' order by a.nome");
}
else {
$stmt = $db->prepare("select c.id, a.nome, c.dataInicio, c.dataTermino, c.tipo, c.valor, c.desconto, c.juros, c.diaVencPagam, c.descricao, c.qtdRenovacao, c.avaliacaoMedica, c.dataAvaliacao, c.ativoInativo, a.id from aluno a, contrato c where c.ativoInativo like '0' and c.Aluno_id=a.id order by a.nome");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<BR>
<b>Lista de Contratos Inativos. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
      <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Aluno</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='60'>Data Termino</th>
            <th width='80'>Tipo</th>
            <th width='80'>Valor (R$)</th>
            <th width='40'>Desconto (R$)</th>
            <th width='80'>Juros Atraso Pagam. (%)</th>
            <th width='60'>Dia Venc. Pagam.</th>
            <th width='60'>Descrição</th>
            <th width='60'>Qtd. Renovação</th>
            <th width='60'>Avaliacao Médica</th>
            <th width='60'>Data Avaliação</th>
            <th width='60'>Ativo/Inativo</th>
            <th width='60'>Atualizar Dados</th>
	</tr>
</thead>
<tbody>

<?php
$num = 0;
while ($row = $stmt->fetch()) {
    if ($row['13']==0){
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_contrato.php' target='mainFrame_contrato'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td nowrap='nowrap' width='250'>".$row['1']."</td>
            <td><input type='date' size='10' name='dataInicio' value='".$row['2']."' style='$style' required></td>
            <td><input type='date' size='10' name='dataTermino' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='10' name='tipo' value='".$row['4']."' style='$style' required></td>
            <td><input type='text' size='10' name='valor' value='".$row['5']."' style='$style' required></td>
            <td><input type='text' size='10' name='desconto' value='".$row['6']."' style='$style'></td>
            <td><input type='text' size='10' name='juros' value='".$row['7']."' style='$style' required></td>
            <td><input type='number' name='diaVencPagam' value='".$row['8']."' style='$style; width: 5em'  min='1' max='31' required></td>
            <td><input type='text' size='18' name='descricao' value='".$row['9']."' style='$style'></td>
            <td><input type='number' name='qtdRenovacao' value='".$row['10']."' style='$style; width: 6em' min='0' required></td>
            <td><select name='avaliacaoMedica' style='$style' required>"; ?>
                <option value=''>&#8195;&#8195;&#8195;</option>
                <option value='sim' <?php echo $row['11'] == 'sim' ? 'selected':'' ?> >Sim &#8195;</option>
                <option value='nao' <?php echo $row['11'] == 'nao' ? 'selected':'' ?> >Não &#8195;</option>
     <?php echo"</select>
            </td>
            <td><input type='date' size='10' name='dataAvaliacao' value='".$row['12']."' style='$style'></td>
            <td><select name='ativoInativo' style='$style'>"; ?>
                    <option value='1' <?php echo $row['13'] == 1 ? 'selected':'' ?> >Ativo &#8195;&#8195;</option>
                    <option value='0' <?php echo $row['13'] == 0 ? 'selected':'' ?> >Inativo &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td><input type='submit' name='Submit' value='Atualizar'></td>
        </tr>
        </form>";
        $num++;
    } //Fecha if
} //Fecha while
?>
           </tbody>
        </table>
        <br>
    </body>
</html>
