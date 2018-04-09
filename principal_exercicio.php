<?php

require_once 'classSingleton.php';
require_once 'classCriadora.php';
require_once 'classExercicio.php';

$db = ConexaoSingleton::getInstance();

if (isset($_POST['nome'])){
$nome = $_POST['nome'];
}
if (isset($_POST['localMusculo'])){
$anoInicio = $_POST['localMusculo'];
}
if (isset($_POST['membro'])){
$anoTermino = $_POST['membro'];
}

?>

<html>
    <head>
        <title>Principal Exercicio</title>
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

<!-- ===================Inserir novo exercicio=================== -->
<?php

?>
    <b>Inserir Exercício</b>
    <br>
    <table border='1'>
        <thead>
        <tr>
            <th width='100'>Nome do Exercício</th>
            <th width='80'>Local do Musculo</th>
            <th width='60'>Membro</th>
            <th width='80'>Descrição</th>
            <th width='80'>Benefício</th>
            <th width='40'>Contra Indicação</th>
            <th width='80'>Indicação Médica</th>
            <th width='20'>Dificuldade</th>
            <th width='60'>Importância</th>
            <th width='60' title='O valor inicia com a data do dia de hoje'>Data Inserido</th>
            <th width='60'>Inserir</th>
        </tr>
        </thead>
        <tbody>
        <form name='inserir' method='post' action='inserir_exercicio.php' target='mainFrame_exercicio'>
            <tr>
                <td><input type='text' size='18' name='nome' value='' required></td>
                <td><input type='text' size='10' name='localMusculo' value='' required></td>
                <td><input type='text' size='10' name='membro' value='' required></td>
                <td><input type='text' size='10' name='descricao' value=''></td>
                <td><input type='text' size='10' name='beneficio' value=''></td>
                <td><input type='text' size='10' name='contraIndicacao' value=''></td>
                <td><input type='text' size='10' name='indicacaoMedica' value=''></td>
                <td><input type='text' name='dificuldade' value='' placeholder='1.5'></td>
                <td><input type='text' size='18' name='importancia' value='' placeholder='1.5'></td>
                <td><input type='date' size='10' name='dataInserido' value='<?php echo date("Y-m-d") ?>' min='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='submit' name='Submit' value='Inserir'></td>
            </tr>
        </form>
        </tbody>
    </table>

<!-- ===================Listar exercicios ativos=================== -->
<?php
if (isset($_POST['nome'])){
$stmt = $db->prepare("select * from exercicio where ativoInativo like '1' and nome like '%$nome%' and localMusculo like '$localMusculo%' and membro like '$membro%' order by nome");
}
else {
$stmt = $db->prepare("select * from exercicio where ativoInativo like '1' order by nome");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<br>
<BR>
<b>Lista de Exercícios Ativos. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
    <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='100'>Nome do Exercício</th>
            <th width='80'>Local do Musculo</th>
            <th width='60'>Membro</th>
            <th width='80'>Descrição</th>
            <th width='80'>Benefício</th>
            <th width='40'>Contra Indicação</th>
            <th width='80'>Indicação Médica</th>
            <th width='20'>Dificuldade</th>
            <th width='60'>Importância</th>
            <th width='60' title='O valor inicia com a data do dia de hoje'>Data Inserido</th>
            <th width='60'>Ativo/Inativo</th>
            <th width='60'>Atualizar Dados</th>
            <th width='60'>Deletar Exercício</th>
	</tr>
    </thead>
    <tbody>
<?php
$num = 0;
while ($row = $stmt->fetch()) {
    if ($row['11']==1){
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_exercicio.php' target='mainFrame_exercicio'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td><input type='text' size='18' name='nome' value='".$row['1']."' style='$style' required></td>
            <td><input type='text' size='10' name='localMusculo' value='".$row['2']."' style='$style' required></td>
            <td><input type='text' size='10' name='membro' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='10' name='descricao' value='".$row['4']."' style='$style' required></td>
            <td><input type='text' size='10' name='beneficio' value='".$row['5']."' style='$style' required></td>
            <td><input type='text' size='10' name='contraIndicacao' value='".$row['6']."' style='$style'></td>
            <td><input type='text' size='10' name='indicacaoMedica' value='".$row['7']."' style='$style' required></td>
            <td><input type='text' name='dificuldade' value='".$row['8']."' style='$style' required></td>
            <td><input type='text' size='18' name='importancia' value='".$row['9']."' style='$style'></td>
            <td><input type='date' size='10' name='dataInserido' value='".$row['10']."' style='$style'></td>
            <td><select name='ativoInativo' style='$style'>"; ?>
                <option value='1' <?php echo $row['11'] == 1 ? 'selected':'' ?> >Ativo &#8195;&#8195;</option>
                <option value='0' <?php echo $row['11'] == 0 ? 'selected':'' ?> >Inativo &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td><input type='submit' name='Submit' value='Atualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='delete_exercicio.php' target='mainFrame_exercicio'>
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

//===================Listar exercicios inativos===================

if (isset($_POST['nome'])){
$stmt = $db->prepare("select * from exercicio where ativoInativo like '0' and nome like '%$nome%' and localMusculo like '$localMusculo%' and membro like '$membro%' order by nome");
}
else {
$stmt = $db->prepare("select * from exercicio where ativoInativo like '0' order by nome");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<BR>
<b>Lista de Exercícios Inativos. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
      <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='100'>Nome do Exercício</th>
            <th width='80'>Local do Musculo</th>
            <th width='60'>Membro</th>
            <th width='80'>Descrição</th>
            <th width='80'>Benefício</th>
            <th width='40'>Contra Indicação</th>
            <th width='80'>Indicação Médica</th>
            <th width='20'>Dificuldade</th>
            <th width='60'>Importância</th>
            <th width='60' title='O valor inicia com a data do dia de hoje'>Data Inserido</th>
            <th width='60'>Ativo/Inativo</th>
            <th width='60'>Atualizar Dados</th>
	</tr>
</thead>
<tbody>

<?php
$num = 0;
while ($row = $stmt->fetch()) {
    if ($row['11']==0){
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_exercicio.php' target='mainFrame_exercicio'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td><input type='text' size='18' name='nome' value='".$row['1']."' style='$style' required></td>
            <td><input type='text' size='10' name='localMusculo' value='".$row['2']."' style='$style' required></td>
            <td><input type='text' size='10' name='membro' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='10' name='descricao' value='".$row['4']."' style='$style' required></td>
            <td><input type='text' size='10' name='beneficio' value='".$row['5']."' style='$style' required></td>
            <td><input type='text' size='10' name='contraIndicacao' value='".$row['6']."' style='$style'></td>
            <td><input type='text' size='10' name='indicacaoMedica' value='".$row['7']."' style='$style' required></td>
            <td><input type='text' name='dificuldade' value='".$row['8']."' style='$style' required></td>
            <td><input type='text' size='18' name='importancia' value='".$row['9']."' style='$style'></td>
            <td><input type='date' size='10' name='dataInserido' value='".$row['10']."' style='$style'></td>
            <td><select name='ativoInativo' style='$style'>"; ?>
                <option value='1' <?php echo $row['11'] == 1 ? 'selected':'' ?> >Ativo &#8195;&#8195;</option>
                <option value='0' <?php echo $row['11'] == 0 ? 'selected':'' ?> >Inativo &#8195;&#8195;</option>
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
