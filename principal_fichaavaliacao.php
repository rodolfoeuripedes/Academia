<?php

//require_once 'classSingleton.php';
require_once 'classCriadora.php';
//require_once 'classFichaAvaliacao.php';

//$db = ConexaoSingleton::getInstance();
$db = Criadora::criaDB();

if (isset($_POST['nomeAluno'])){
$nomeAluno = $_POST['nomeAluno'];
}
if (isset($_POST['nomeProfessor'])){
$nomeProfessor = $_POST['nomeProfessor'];
}
if (isset($_POST['anoAvaliacao'])){
$anoAvaliacao = $_POST['anoAvaliacao'];
}

?>

<html>
    <head>
        <title>Principal Ficha de Avaliação</title>
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

<!-- ===================Inserir nova ficha de avaliacao=================== -->
<?php
$todosProfessores = $db->prepare("select * from professor where ativoInativo like '1' order by nome");
$todosProfessores->execute();

$todosAlunos = $db->prepare("select * from aluno where ativoInativo like '1' order by nome");
$todosAlunos->execute();
?>
    <b>Inserir Ficha de Avaliação</b>
    <br>
    <table border='1'>
        <thead>
        <tr>
            <th width='250'>Nome do Professor</th>
            <th width='250'>Nome do Aluno</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Avaliação</th>
            <th width='80'>Objetivo</th>
            <th width='80'>Obs. Objetibo</th>
            <th width='60'>Med. Torax</th>
            <th width='60'>Med. Cintura Alta</th>
            <th width='60'>Med. Cintura Abdomem</th>
            <th width='60'>Med. Quadril</th>
            <th width='60'>Med. Coxa Dir.</th>
            <th width='60'>Med. Coxa Esq.</th>
            <th width='60'>Med. Panturrilha Dir.</th>
            <th width='60'>Med. Panturrilha Esq.</th>
            <th width='60'>Med. Braço Dir.</th>
            <th width='60'>Med. Braço Esq.</th>
            <th width='60'>Med. Antebraço Dir.</th>
            <th width='60'>Med. Antebraço Esq.</th>
            <th width='60'>Peso</th>
            <th width='60'>Altura</th>
            <th width='60'>Inserir</th>
        </tr>
        </thead>
        <tbody>
        <form name='inserir' method='post' action='inserir_fichaavaliacao.php' target='mainFrame_fichaavaliacao'>
            <tr>
                <td width='250'>
                    <select name='Professor_id' required>
                        <option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>
                        <?php
                        while ($row = $todosProfessores->fetch()) {
                            echo "<option value='".$row['0']."'>".$row['1']."</option>";
                        }
                        ?>
                    </select></td>
                <td width='250'>
                    <select name='Aluno_id' required>
                        <option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>
                        <?php
                        while ($row = $todosAlunos->fetch()) {
                            echo "<option value='".$row['0']."'>".$row['1']."</option>";
                        }
                        ?>
                    </select></td>
                <td><input type='date' size='10' name='dataAvaliacao' value='<?php echo date("Y-m-d") ?>' min='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='text' size='10' name='objetivo' value='' required></td>
                <td><input type='text' size='10' name='obsObjetivo' value='' required></td>
                <td><input type='text' size='10' name='medTorax' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medCinturaAlta' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medCinturaAbdomen' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medQuadril' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medCoxaDir' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medCoxaEsq' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medPanturrilhaDir' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medPanturrilhaEsq' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medBracoDir' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medBracoEsq' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medAntebracoDir' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='medAntebracoEsq' value='' placeholder='1.5' required></td>
                <td><input type='text' size='10' name='peso' value='' placeholder='70.5' required></td>
                <td><input type='text' size='10' name='altura' value='' placeholder='1.75' required></td>
                <td><input type='submit' name='Submit' value='Inserir'></td>
            </tr>
        </form>
        </tbody>
    </table>

<!-- ===================Listar fichas de avaliacoes=================== -->
<?php
if (isset($_POST['nomeAluno'])){
$stmt = $db->prepare("select f.id, p.nome, a.nome, f.dataAvaliacao, f.objetivo, f.obsObjetivo, f.medTorax, f.medCinturaAlta, f.medCinturaAbdomen, f.medQuadril, f.medCoxaDir, f.medCoxaEsq, f.medPanturrilhaDir, f.medPanturrilhaEsq, f.medBracoDir, f.medBracoEsq, f.medAntebracoDir, f.medAntebracoEsq, f.peso, f.altura from fichaavaliacao f, aluno a, professor p where f.Aluno_id=a.id and f.Professor_id=p.id and a.nome like '%$nomeAluno%' and p.nome like '$nomeProfessor%' and YEAR(f.dataAvaliacao) like '$anoAvaliacao%' order by a.nome ASC, f.dataAvaliacao DESC");
}
else {
$stmt = $db->prepare("select f.id, p.nome, a.nome, f.dataAvaliacao, f.objetivo, f.obsObjetivo, f.medTorax, f.medCinturaAlta, f.medCinturaAbdomen, f.medQuadril, f.medCoxaDir, f.medCoxaEsq, f.medPanturrilhaDir, f.medPanturrilhaEsq, f.medBracoDir, f.medBracoEsq, f.medAntebracoDir, f.medAntebracoEsq, f.peso, f.altura from fichaavaliacao f, aluno a, professor p where f.Aluno_id=a.id and f.Professor_id=p.id order by a.nome ASC, f.dataAvaliacao DESC");
}
$stmt->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<br>
<BR>
<b>Lista de Fichas de Avaliações. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
    <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Professor</th>
            <th width='250'>Nome do Aluno</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Avaliação</th>
            <th width='80'>Objetivo</th>
            <th width='80'>Obs. Objetibo</th>
            <th width='60'>Med. Torax</th>
            <th width='60'>Med. Cintura Alta</th>
            <th width='60'>Med. Cintura Abdomem</th>
            <th width='60'>Med. Quadril</th>
            <th width='60'>Med. Coxa Dir.</th>
            <th width='60'>Med. Coxa Esq.</th>
            <th width='60'>Med. Panturrilha Dir.</th>
            <th width='60'>Med. Panturrilha Esq.</th>
            <th width='60'>Med. Braço Dir.</th>
            <th width='60'>Med. Braço Esq.</th>
            <th width='60'>Med. Antebraço Dir.</th>
            <th width='60'>Med. Antebraço Esq.</th>
            <th width='60'>Peso</th>
            <th width='60'>Altura</th>
            <th width='60'>Atualizar Dados</th>
            <th width='60'>Deletar Fihca</th>
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
        echo "<form name='".$row['0']."' method='post' action='update_fichaavaliacao.php' target='mainFrame_fichaavaliacao'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td nowrap='nowrap' width='250'>".$row['1']."</td>
            <td nowrap='nowrap' width='275'>".$row['2']."</td>
            <td><input type='date' size='10' name='dataAvaliacao' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='10' name='objetivo' value='".$row['4']."' style='$style' required></td>
            <td><input type='text' size='10' name='obsObjetivo' value='".$row['5']."' style='$style' required></td>
            <td><input type='text' size='10' name='medTorax' value='".$row['6']."' style='$style' required></td>
            <td><input type='text' size='10' name='medCinturaAlta' value='".$row['7']."' style='$style'></td>
            <td><input type='text' size='10' name='medCinturaAbdomen' value='".$row['8']."' style='$style' required></td>
            <td><input type='text' size='10' name='medQuadril' value='".$row['9']."' style='$style' required></td>
            <td><input type='text' size='10' name='medCoxaDir' value='".$row['10']."' style='$style'></td>
            <td><input type='text' size='10' name='medCoxaEsq' value='".$row['11']."' style='$style' required></td>
            <td><input type='text' size='10' name='medPanturrilhaDir' value='".$row['12']."' style='$style' required></td>
            <td><input type='text' size='10' name='medPanturrilhaEsq' value='".$row['13']."' style='$style'></td>
            <td><input type='text' size='10' name='medBracoDir' value='".$row['14']."' style='$style' required></td>
            <td><input type='text' size='10' name='medBracoEsq' value='".$row['15']."' style='$style' required></td>
            <td><input type='text' size='10' name='medAntebracoDir' value='".$row['16']."' style='$style' required></td>
            <td><input type='text' size='10' name='medAntebracoEsq' value='".$row['17']."' style='$style' required></td>
            <td><input type='text' size='10' name='peso' value='".$row['18']."' style='$style' required></td>
            <td><input type='text' size='10' name='altura' value='".$row['19']."' style='$style' required></td>
            <td><input type='submit' name='Submit' value='Atualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='delete_fichaavaliacao.php' target='mainFrame'>
            <td><input type='hidden' name='id' value='".$row['0']."'>
                <input type='submit' name='Submit' value='Deletar'></td>
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
