<?php

require_once 'classSingleton.php';
require_once 'classCriadora.php';
require_once 'classProfessor.php';

$db = ConexaoSingleton::getInstance();

if (isset($_POST['nome'])){
$nome = $_POST['nome'];
}
if (isset($_POST['cpf'])){
$cpf = $_POST['cpf'];
}
if (isset($_POST['rg'])){
$rg = $_POST['rg'];
}

?>

<html>
    <head>
        <title>Principal Professor</title>
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

<!-- ===================Inserir novo professor=================== -->
    <b>Inserir Professor</b>
    <br>
    <table border='1'>
        <thead>
        <tr>
            <th width='200'>Nome do Professor</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data de Nascimento</th>
            <th width='120'>CPF</th>
            <th width='120'>RG</th>
            <th width='80'>Sexo</th>
            <th width='300'>Endereço</th>
            <th width='60'>Fone Casa</th>
            <th width='60'>Fone Celular.</th>
            <th width='60'>Estado Civil</th>
            <th width='60'>Profissão</th>
            <th width='60'>E-mail</th>
            <th width='60'>Salário</th>
            <th width='60'>Cargo</th>
            <th width='60'>Senha</th>
            <th width='60'>Especialidade</th>
            <th width='60'>Inserir</th>
        </tr>
        </thead>
        <tbody>
        <form name='inserir' method='post' action='inserir_professor.php' target='mainFrame_professor'>
            <tr>
                <td><input type='text' size='30' name='nome' value='' required></td>
                <td><input type='date' size='10' name='dataNasc' value='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='text' size='13' name='cpf' value='' required></td>
                <td><input type='text' size='18' name='rg' value='' required></td>
                <td><select name='sexo' required>
                        <option value=''></option>
                        <option value='Masculino' >Masculino &#8195;&#8195;</option>
                        <option value='Feminino' >Feminino &#8195;&#8195;</option>
                    </select></td>
                <td><input type='text' size='18' name='endereco' value='' required></td>
                <td><input type='text' size='18' name='foneCasa' value='' required></td>
                <td><input type='text' size='18' name='foneCelular' value='' required></td>
                <td><input type='text' size='10' name='estadoCivil' value='' required></td>
                <td><input type='text' size='18' name='profissao' required></td>
                <td><input type='email' size='18' name='email' value='' required></td>
                <td><input type='number' size='18' name='salario' value='' step='0.01' placeholder='2000,50' required></td>
                <td><select name='cargo' style='$style' required>
                        <option value='Professor' >Professor &#8195;&#8195;</option>
                    </select></td>
                <td><input type='password' size='18' name='senha' value='' required></td>
                <td><input type='text' size='18' name='especialidade' required></td>
                <td><input type='submit' name='Submit' value='Inserir'></td>
            </tr>
        </form>
        </tbody>
    </table>

<!-- ===================Listar professores ativos=================== -->
<?php
if (isset($_POST['nome'])){
$stmt = $db->prepare("select * from professor where nome like '%$nome%' and cpf like '$cpf%' and rg like '$rg%' and ativoInativo like '1'");
}
else {
$stmt = $db->prepare("select * from professor where ativoInativo like '1'");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<br>
<BR>
<b>Lista de Professores Ativos. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
    <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Professor</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data de Nascimento</th>
            <th width='60'>CPF</th>
            <th width='80'>RG</th>
            <th width='80'>Sexo</th>
            <th width='40'>Endereço</th>
            <th width='80'>Fone Casa</th>
            <th width='60'>Fone Celular</th>
            <th width='60'>Estado Civil</th>
            <th width='60'>Profissão</th>
            <th width='60'>E-mail</th>
            <th width='60'>Salário</th>
            <th width='60'>Cargo</th>
            <th width='60'>Senha</th>
            <th width='60'>Especialidade</th>
            <th width='60'>Ativo/Inativo</th>
            <th width='60'>Atualizar Dados</th>
	</tr>
    </thead>
    <tbody>
<?php
$num = 0;
while ($row = $stmt->fetch()) {
    if ($row['16']==1){
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_professor.php' target='mainFrame_professor'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td><input type='text' size='18' name='nome' value='".$row['1']."' style='$style' required></td>
            <td><input type='date' size='10' name='dataNasc' value='".$row['2']."' style='$style' required></td>
            <td><input type='text' size='13' name='cpf' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='18' name='rg' value='".$row['4']."' style='$style' required></td>
            <td><select name='sexo' style='$style'>"; ?>
                <option value='Masculino' <?php echo $row['5'] == 'Masculino' ? 'selected':'' ?> >Masculino &#8195;&#8195;</option>
                <option value='Feminino' <?php echo $row['5'] == 'Feminino' ? 'selected':'' ?> >Feminino &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td><input type='text' size='18' name='endereco' value='".$row['6']."' style='$style'></td>
            <td><input type='text' size='18' name='foneCasa' value='".$row['7']."' style='$style' required></td>
            <td><input type='text' size='18' name='foneCelular' value='".$row['8']."' style='$style' required></td>
            <td><input type='text' size='10' name='estadoCivil' value='".$row['9']."' style='$style'></td>
            <td><input type='text' size='18' name='profissao' value='".$row['10']."' style='$style'></td>
            <td><input type='email' size='18' name='email' value='".$row['11']."' style='$style'></td>
            <td><input type='number' size='18' name='salario' value='".$row['12']."' step='0.01' style='$style'></td>
            <td><select name='cargo' style='$style'>"; ?>
                <option value='Professor' <?php echo $row['13'] == 'Professor' ? 'selected':'' ?> >Professor &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td><input type='password' size='18' name='senha' value='".$row['14']."' style='$style'></td>
            <td><input type='text' size='18' name='especialidade' value='".$row['15']."' style='$style'></td>
            <td><select name='ativoInativo' style='$style'>"; ?>
                <option value='1' <?php echo $row['16'] == 1 ? 'selected':'' ?> >Ativo &#8195;&#8195;</option>
                <option value='0' <?php echo $row['16'] == 0 ? 'selected':'' ?> >Inativo &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td><input type='submit' name='Submit' value='Atualizar'></td>
            </form>
        </tr>";
        $num++;
    } //Fecha if
} //Fecha while
echo "</tbody>
      </table>
      <br>";

//===================Listar professores inativos===================

if (isset($_POST['nome'])){
$stmt = $db->prepare("select * from professor where nome like '%$nome%' and cpf like '$cpf%' and rg like '$rg%' and ativoInativo like '0'");
}
else {
$stmt = $db->prepare("select * from professor where ativoInativo like '0'");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<BR>
<b>Lista de Professores Inativos. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
      <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Professor</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data de Nascimento</th>
            <th width='60'>CPF</th>
            <th width='80'>RG</th>
            <th width='80'>Sexo</th>
            <th width='40'>Endereço</th>
            <th width='80'>Fone Casa</th>
            <th width='60'>Fone Celular</th>
            <th width='60'>Estado Civil</th>
            <th width='60'>Profissão</th>
            <th width='60'>E-mail</th>
            <th width='60'>Salário</th>
            <th width='60'>Cargo</th>
            <th width='60'>Senha</th>
            <th width='60'>Especialidade</th>
            <th width='60'>Ativo/Inativo</th>
            <th width='60'>Atualizar Dados</th>
	</tr>
</thead>
<tbody>

<?php
$num = 0;
while ($row = $stmt->fetch()) {
    if ($row['16']==0){
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_professor.php' target='mainFrame_professor'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td><input type='text' size='18' name='nome' value='".$row['1']."' style='$style' required></td>
            <td><input type='date' size='10' name='dataNasc' value='".$row['2']."' style='$style' required></td>
            <td><input type='text' size='13' name='cpf' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='18' name='rg' value='".$row['4']."' style='$style' required></td>
            <td><select name='sexo' style='$style'>"; ?>
                <option value='Masculino' <?php echo $row['5'] == 'Masculino' ? 'selected':'' ?> >Masculino &#8195;&#8195;</option>
                <option value='Feminino' <?php echo $row['5'] == 'Feminino' ? 'selected':'' ?> >Feminino &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td><input type='text' size='18' name='endereco' value='".$row['6']."' style='$style'></td>
            <td><input type='text' size='18' name='foneCasa' value='".$row['7']."' style='$style' required></td>
            <td><input type='text' size='18' name='foneCelular' value='".$row['8']."' style='$style' required></td>
            <td><input type='text' size='10' name='estadoCivil' value='".$row['9']."' style='$style'></td>
            <td><input type='text' size='18' name='profissao' value='".$row['10']."' style='$style'></td>
            <td><input type='email' size='18' name='email' value='".$row['11']."' style='$style'></td>
            <td><input type='number' size='18' name='salario' value='".$row['12']."' step='0.01' style='$style'></td>
            <td><select name='cargo' style='$style'>"; ?>
                <option value='Professor' <?php echo $row['13'] == 'Professor' ? 'selected':'' ?> >Professor &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td><input type='password' size='18' name='senha' value='".$row['14']."' style='$style'></td>
            <td><input type='text' size='18' name='especialidade' value='".$row['15']."' style='$style'></td>
            <td><select name='ativoInativo' style='$style'>"; ?>
                <option value='1' <?php echo $row['16'] == 1 ? 'selected':'' ?> >Ativo &#8195;&#8195;</option>
                <option value='0' <?php echo $row['16'] == 0 ? 'selected':'' ?> >Inativo &#8195;&#8195;</option>
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
