<?php

require_once 'classSingleton.php';
require_once 'classFuncionario.php';

$db = ConexaoSingleton::getInstance();

if (isset($_POST['nome'])){
$nome = $_POST['nome'];
//echo $nome;
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
<title>Lista de Colaboradores</title>
</head>
<body>

<?php

if (isset($_POST['nome'])){
$stmt = $db->prepare("select * from funcionario where nome like '%$nome%' and cpf like '$cpf%' and rg like '$rg%' and ativoInativo like '1'");
}
else {
$stmt = $db->prepare("select * from funcionario where ativoInativo like '1'");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();

echo "<b>Inserir Funcionário</b>";
echo "<br>";
echo "<table border='1'>
        <tr>
			<td width='200'>Nome</td>
			<td width='80'>Data de Nascimento</td>
                        <td width='120'>CPF</td>
                        <td width='120'>RG</td>
                        <td width='80'>Sexo</td>
                        <td width='300'>Endereço</td>
                        <td width='60'>Fone Casa</td>
                        <td width='60'>Fone Celular</td>
                        <td width='60'>Estado Civil</td>
                        <td width='60'>Profissão</td>
                        <td width='60'>E-mail</td>
                        <td width='60'>Salário</td>
                        <td width='60'>Cargo</td>
                        <td width='60'>Senha</td>
                        <td width='60'>Inserir</td>
        </tr>";
  echo "<form name='inserir' method='post' action='inserir_funcionario.php' target='mainFrame_funcionario'>";
  echo "<tr>
            <td><input type='text' size='30' name='nome' value=''></td>
            <td><input type='text' size='10' name='dataNasc' value=''></td>
            <td><input type='text' size='13' name='cpf' value=''></td>
            <td><input type='text' size='18' name='rg' value=''></td>
            <td><input type='text' size='10' name='sexo' value=''></td>
            <td><input type='text' size='18' name='endereco' value=''></td>
            <td><input type='text' size='18' name='foneCasa' value=''></td>
            <td><input type='text' size='18' name='foneCelular' value=''></td>
            <td><input type='text' size='10' name='estadoCivil' value=''></td>
            <td><input type='text' size='18' name='profissao' value=''></td>
            <td><input type='text' size='18' name='email' value=''></td>
            <td><input type='text' size='18' name='salario' value=''></td>
            <td><input type='text' size='18' name='cargo' value=''></td>
            <td><input type='password' size='18' name='senha' value=''></td>
            <td><input type='submit' name='Submit' value='Inserir'></td>
        </tr>
        </form>
    </table>";
echo "<br>";



echo "<b>Lista de Funcionarios Ativos. ".$count." registros encontrados</b>";
echo "<br>";
echo "<table border='1'>
	<tr>
            <td width='20'>ID</td>
            <td width='200'>Nome</td>
            <td width='80'>Data de Nascimento</td>
            <td width='120'>CPF</td>
            <td width='120'>RG</td>
            <td width='80'>Sexo</td>
            <td width='300'>Endereço</td>
            <td width='60'>Fone Casa</td>
            <td width='60'>Fone Celular</td>
            <td width='60'>Estado Civil</td>
            <td width='60'>Profissão</td>
            <td width='60'>E-mail</td>
            <td width='60'>Salário</td>
            <td width='60'>Cargo</td>
            <td width='60'>Senha</td>
            <td width='60'>Ativo/Inativo</td>
            <td width='60'>Atualizar Dados</td>
	</tr>";
while ($row = $stmt->fetch()) {
    if ($row['15']==1){
    
    echo "<form name='".$row['0']."' method='post' action='update_funcionario.php' target='mainFrame_funcionario'>
        <tr>
            <td><input type='text' size='1' name='id' value='".$row['0']."'></td>
            <td><input type='text' size='18' name='nome' value='".$row['1']."'></td>
            <td><input type='text' size='10' name='dataNasc' value='".$row['2']."'></td>
            <td><input type='text' size='13' name='cpf' value='".$row['3']."'></td>
            <td><input type='text' size='18' name='rg' value='".$row['4']."'></td>
            <td><input type='text' size='10' name='sexo' value='".$row['5']."'></td>
            <td><input type='text' size='18' name='endereco' value='".$row['6']."'></td>
            <td><input type='text' size='18' name='foneCasa' value='".$row['7']."'></td>
            <td><input type='text' size='18' name='foneCelular' value='".$row['8']."'></td>
            <td><input type='text' size='10' name='estadoCivil' value='".$row['9']."'></td>
            <td><input type='text' size='18' name='profissao' value='".$row['10']."'></td>
            <td><input type='text' size='18' name='email' value='".$row['11']."'></td>
            <td><input type='text' size='18' name='salario' value='".$row['12']."'></td>
            <td><input type='text' size='18' name='cargo' value='".$row['13']."'></td>
            <td><input type='password' size='18' name='senha' value='".$row['14']."'></td>
            <td><select name='ativoInativo'><option value='1'>Ativo</option><option value='0'>Inativo</option></select></td>
            <td><input type='submit' name='Submit' value='Atualizar'></td>
        </tr>
        </form>";
    } //Fecha if
} //Fecha while
echo "</table>";
echo "<br>";


if (isset($_POST['nome'])){
$stmt = $db->prepare("select * from funcionario where nome like '%$nome%' and cpf like '$cpf%' and rg like '$rg%' and ativoInativo like '0'");
}
else {
$stmt = $db->prepare("select * from funcionario where ativoInativo like '0'");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();

echo "<b>Lista de Funcionarios Inativos. ".$count." registros encontrados</b>";
echo "<br>";
echo "<table border='1'>
	<tr>
            <td width='20'>ID</td>
            <td width='200'>Nome</td>
            <td width='80'>Data de Nascimento</td>
            <td width='120'>CPF</td>
            <td width='120'>RG</td>
            <td width='80'>Sexo</td>
            <td width='300'>Endereço</td>
            <td width='60'>Fone Casa</td>
            <td width='60'>Fone Celular</td>
            <td width='60'>Estado Civil</td>
            <td width='60'>Profissão</td>
            <td width='60'>E-mail</td>
            <td width='60'>Salário</td>
            <td width='60'>Cargo</td>
            <td width='60'>Senha</td>
            <td width='60'>Ativo/Inativo</td>
            <td width='60'>Atualizar Dados</td>
	</tr>";
while ($row = $stmt->fetch()) {
    if ($row['15']==0){
    echo "<form name='".$row['0']."' method='post' action='update_funcionario.php' target='mainFrame_funcionario'>
        <tr>
            <td><input type='text' size='1' name='id' value='".$row['0']."'></td>
            <td><input type='text' size='18' name='nome' value='".$row['1']."'></td>
            <td><input type='text' size='10' name='dataNasc' value='".$row['2']."'></td>
            <td><input type='text' size='13' name='cpf' value='".$row['3']."'></td>
            <td><input type='text' size='18' name='rg' value='".$row['4']."'></td>
            <td><input type='text' size='10' name='sexo' value='".$row['5']."'></td>
            <td><input type='text' size='18' name='endereco' value='".$row['6']."'></td>
            <td><input type='text' size='18' name='foneCasa' value='".$row['7']."'></td>
            <td><input type='text' size='18' name='foneCelular' value='".$row['8']."'></td>
            <td><input type='text' size='10' name='estadoCivil' value='".$row['9']."'></td>
            <td><input type='text' size='18' name='profissao' value='".$row['10']."'></td>
            <td><input type='text' size='18' name='email' value='".$row['11']."'></td>
            <td><input type='text' size='18' name='salario' value='".$row['12']."'></td>
            <td><input type='text' size='18' name='cargo' value='".$row['13']."'></td>
            <td><input type='password' size='18' name='senha' value='".$row['14']."'></td>
            <td><select name='ativoInativo'><option value='0'>Inativo</option><option value='1'>Ativo</option></select></td>
            <td><input type='submit' name='Submit' value='Atualizar'></td>
        </tr>
        </form>";
    } //Fecha if
} //Fecha while
echo "</table>";




//<td>".$row['0']."</td>
/*
$resultado = mysql_query("select nome_musica, nome_genero, nome_cd_dvd
from musicas, generos, cds_dvds
where cod_genero=generos_cod_genero and cod_cd_dvd=cds_dvds_cod_cd_dvd and nome_musica like '$musica%' and nome_musica like '%$parte_musica%' and nome_genero like '$genero%'
order by nome_musica asc, nome_genero asc");
$num_rows = mysql_num_rows($resultado);

	echo "Total de ".$num_rows." músicas.<br><br>";
	echo "<table border='1'>
		<tr>
			<td width='600'>M�sica</td>
			<td width='100'>Genero</td>
			<td width='60'>CD/DVD</td>
		</tr>";
	while ($exercicio = mysql_fetch_array($resultado))
	{	
		echo "<tr>
				<td>".$exercicio['0']."</td>
				<td>".$exercicio['1']."</td>
				<td>".$exercicio['2']."</td>
			  </tr>";
	}
	echo "</table>";
mysql_close($con);
*/
?>

</body>
</html>

