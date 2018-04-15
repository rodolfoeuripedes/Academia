<?php

require_once 'classSingleton.php';
require_once 'classCriadora.php';
require_once 'classTurma.php';

$db = ConexaoSingleton::getInstance();

if (isset($_POST['nomeProfessor'])){
$nomeProfessor = $_POST['nomeProfessor'];
}
if (isset($_POST['nomeTurma'])){
$nomeTurma = $_POST['nomeTurma'];
}
if (isset($_POST['turno'])){
$turno = $_POST['turno'];
}

?>

<html>
    <head>
        <title>Principal Turma</title>
        <style type="text/css">
            table#alter tr.dif td {
                background: #D0FFD0;
            }
            table#alter tr td {
                background: #FFF68F;
            }
        </style>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script>
            $(document).ready(function () {
                var max_fields = 10; //max de 10 inscricoes de cada vez
                var x = 1;
                $('#add_field').click(function (e) {
                    e.preventDefault();	//prevenir novos clicks
                    if (x < max_fields) {
                        $('#listas').append('\
                        <tr class="remove' + x + '">\
                            <td>\
                                <select id="Aluno_id' + x + '" name="Aluno_id[]" form="inserir">\
                                </select>\
                            </td>\
                            <td><a href="#" class="remove_campo" id="remove' + x + '"><img class="delete" src="images/xVermelho.png" width="16" height="16" border="0"></a></td>\
                        </tr>\
                        ');
                        var y = x;
                        $.get('listaAlunosAtivos.php', function(data){
                            $("#Aluno_id" + y).html(data);
                            }
                        );
                        x++;
                    }
                });

                //this is not the best move, because will create overhead...
                //but is for simplicity
                //damn users
                $('#listas').on("click", ".remove_campo", function (e) {
                    e.preventDefault();
                    //tr id will be the same as the image
                    var tr = $(this).attr('id');
                    //alert ('remove: ' + tr);
                    $('#listas tr.' + tr).remove();
                    x--;
                });
            });
        </script>
    </head>
    <body>

<!-- ===================Inserir nova turma=================== -->
<?php
$todosProfessores = $db->prepare("select * from professor where ativoInativo like '1' order by nome");
$todosProfessores->execute();

$todosAlunos = $db->prepare("select * from aluno where ativoInativo like '1' order by nome");
$todosAlunos->execute();
?>
    <b>Inserir Turma</b>
    <br>
    
    <table border='1'>
        <thead>
        <tr>
            <th width='250'>Nome do Professor</th>
            <th width='80'>Nome da Turma</th>
            <th width='60'>Turno</th>
            <th width='80'>Qtd. de Aluno</th>
            <th width='80'>Carga Horária do Semestre</th>
            <th width='40'>Dias da Semana</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Término</th>
            <th width='60'>Hora Inicio</th>
            <th width='60'>Hora Término</th>
            <th width='60'>Avaliação</th>
            <th width='60'>Situação</th>
            <th width='60'>Nome dos Alunos</th>
            <th width='60'>Inserir</th>
        </tr>
        </thead>
        <tbody>
            <form id='inserir' name='inserir' method='post' action='inserir_turma.php' target='mainFrame_turma'>
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
                <td><input type='text' size='10' name='nome' value='' required></td>
                <td><input type='text' size='10' name='turno' value='' required></td>
                <td><input type='text' size='10' name='qtdAluno' value='' required></td>
                <td><input type='text' size='10' name='carHorSem' value='' required></td>
                <td><input type='text' size='10' name='diasSemana' value='' required></td>
                <td><input type='date' size='10' name='dataInicio' value='<?php echo date("Y-m-d") ?>' min='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='date' size='10' name='dataTermino' value='<?php echo date("Y-m-d") ?>' min='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='text' size='18' name='horaInicio' value='' required></td>
                <td><input type='text' size='10' name='horaTermino' value='' required></td>
                <td><input type='text' size='10' name='avaliacao' value='' required></td>
                <td><select name='situacao' style='$style' required>
                        <option value=''></option>
                        <option value='Aberta' <?php echo $row['12'] == 'Aberta' ? 'selected':'' ?> >Aberta &#8195;&#8195;</option>
                        <option value='Fechada' <?php echo $row['12'] == 'Fechada' ? 'selected':'' ?> >Fechada &#8195;&#8195;</option>
                    </select></td>
                <td width='250'>
                    <input type="button" id="add_field" value="Adicionar">
                    <table id="listas" border="0">
                        <tr>
                            <td>
                                <select id='Aluno_id0' name='Aluno_id[]' required>
                                    <option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>
                                    <?php
                                    while ($row = $todosAlunos->fetch()) {
                                    echo "<option value='".$row['0']."'>".$row['1']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
                <td><input type='submit' name='Submit' value='Inserir' form='inserir'></td>
            </tr>
            </form>
        </tbody>
    </table>

<!-- ===================Listar turmas ativas=================== -->
<?php
if (isset($_POST['nomeProfessor'])){
$stmt = $db->prepare("select t.id, p.nome, t.nome, t.turno, t.qtdAluno, t.carHorSem, t.diasSemana, t.dataInicio, t.dataTermino, t.horaInicio, t.horaTermino, t.avaliacao, t.situacao from turma t, professor p where t.situacao like 'Aberta' and t.Professor_id=p.id and p.nome like '%$nomeProfessor%' and t.nome like '$nomeTurma%' and t.turno like '$turno%' order by t.id");
$stmt1 = $db->prepare("select t.id, th.Aluno_id, a.nome from turma t, turma_has_aluno th, aluno a where th.Turma_id=t.id and th.Aluno_id=a.id order by t.id");
}
else {
$stmt = $db->prepare("select t.id, p.nome, t.nome, t.turno, t.qtdAluno, t.carHorSem, t.diasSemana, t.dataInicio, t.dataTermino, t.horaInicio, t.horaTermino, t.avaliacao, t.situacao from turma t, professor p where t.situacao like 'Aberta' and t.Professor_id=p.id order by t.id");
$stmt1 = $db->prepare("select t.id, th.Aluno_id, a.nome from turma t, turma_has_aluno th, aluno a where th.Turma_id=t.id and th.Aluno_id=a.id order by t.id");
}
$stmt->execute();
$stmt1->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<br>
<BR>
<b>Lista de Turmas Ativas. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
    <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Professor</th>
            <th width='80'>Nome da Turma</th>
            <th width='60'>Turno</th>
            <th width='80'>Qtd. de Aluno</th>
            <th width='80'>Carga Horária do Semestre</th>
            <th width='40'>Dias da Semana</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Término</th>
            <th width='60'>Hora Inicio</th>
            <th width='60'>Hora Término</th>
            <th width='60'>Avaliação</th>
            <th width='60'>Situação</th>
            <th width='250'>Nome dos Alunos</th>
            <th width='60'>Atualizar Dados</th>
            <th width='60'>Visualizar Turma</th>
            <th width='60'>Deletar Turma</th>
	</tr>
    </thead>
    <tbody>
<?php
$num = 0;
while ($row = $stmt->fetch()) {
    if ($row['12']=='Aberta'){
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_turma.php' target='mainFrame_turma'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td nowrap='nowrap' width='250'>".$row['1']."</td>
            <td><input type='text' size='10' name='nome' value='".$row['2']."' style='$style' required></td>
            <td><input type='text' size='10' name='turno' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='10' name='qtdAluno' value='".$row['4']."' style='$style' required></td>
            <td><input type='text' size='10' name='carHorSem' value='".$row['5']."' style='$style' required></td>
            <td><input type='text' size='10' name='diasSemana' value='".$row['6']."' style='$style'></td>
            <td><input type='date' size='10' name='dataInicio' value='".$row['7']."' style='$style' required></td>
            <td><input type='date' size='10' name='dataTermino' value='".$row['8']."' style='$style' required></td>
            <td><input type='text' size='18' name='horaInicio' value='".$row['9']."' style='$style'></td>
            <td><input type='text' size='18' name='horaTermino' value='".$row['10']."' style='$style'></td>
            <td><input type='text' size='10' name='avaliacao' value='".$row['11']."' style='$style' required></td>
            <td><select name='situacao' style='$style'>"; ?>
                <option value='Aberta' <?php echo $row['12'] == 'Aberta' ? 'selected':'' ?> >Aberta &#8195;&#8195;</option>
                <option value='Fechada' <?php echo $row['12'] == 'Fechada' ? 'selected':'' ?> >Fechada &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td nowrap='nowrap' width='250'>";
                $stmt1->execute();
                while ($row1 = $stmt1->fetch()) {
                    if ($row1['0']==$row['0']){
                    echo $row1['2']."<br>";
                    }
                }
            echo "
            </td>
            <td><input type='hidden' name='local' value='principal_turma'>
                <input type='hidden' name='Aluno_id[]' value=''>
                <input type='submit' name='Submit' value='Atualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='visualizar_turma.php' target='mainFrame'>
            <td><input type='hidden' name='id' value='".$row['0']."'>
                <input type='hidden' name='Professor_nome' value='".$row['1']."'>
                <input type='hidden' name='nome' value='".$row['2']."'>
                <input type='hidden' name='turno' value='".$row['3']."'>
                <input type='hidden' name='qtdAluno' value='".$row['4']."'>
                <input type='hidden' name='carHorSem' value='".$row['5']."'>
                <input type='hidden' name='diasSemana' value='".$row['6']."'>
                <input type='hidden' name='dataInicio' value='".$row['7']."'>
                <input type='hidden' name='dataTermino' value='".$row['8']."'>
                <input type='hidden' name='horaInicio' value='".$row['9']."'>
                <input type='hidden' name='horaTermino' value='".$row['10']."'>
                <input type='hidden' name='avaliacao' value='".$row['11']."'>
                <input type='hidden' name='situacao' value='".$row['12']."'>
                <input type='submit' name='Submit' value='Visualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='delete_turma.php' target='mainFrame_turma'>
            <td><input type='hidden' name='id' value='".$row['0']."'>
                <input type='hidden' name='local' value='principal_turma'>
                <input type='submit' name='Submit' value='Deletar'></td>
            </form>
        </tr>";
        $num++;
    } //Fecha if
} //Fecha while
echo "</tbody>
      </table>
      <br>";

//===================Listar turmas inativas===================

if (isset($_POST['nomeProfessor'])){
$stmt = $db->prepare("select t.id, p.nome, t.nome, t.turno, t.qtdAluno, t.carHorSem, t.diasSemana, t.dataInicio, t.dataTermino, t.horaInicio, t.horaTermino, t.avaliacao, t.situacao from turma t, professor p where t.situacao like 'Fechada' and t.Professor_id=p.id and p.nome like '%$nomeProfessor%' and t.nome like '$nomeTurma%' and t.turno like '$turno%' order by t.id");
$stmt1 = $db->prepare("select t.id, th.Aluno_id, a.nome from turma t, turma_has_aluno th, aluno a where th.Turma_id=t.id and th.Aluno_id=a.id order by t.id");
}
else {
$stmt = $db->prepare("select t.id, p.nome, t.nome, t.turno, t.qtdAluno, t.carHorSem, t.diasSemana, t.dataInicio, t.dataTermino, t.horaInicio, t.horaTermino, t.avaliacao, t.situacao from turma t, professor p where t.situacao like 'Fechada' and t.Professor_id=p.id order by t.id");
$stmt1 = $db->prepare("select t.id, th.Aluno_id, a.nome from turma t, turma_has_aluno th, aluno a where th.Turma_id=t.id and th.Aluno_id=a.id order by t.id");
}
$stmt->execute();
$stmt1->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<BR>
<b>Lista de Turmas Inativas. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
      <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Professor</th>
            <th width='80'>Nome da Turma</th>
            <th width='60'>Turno</th>
            <th width='80'>Qtd. de Aluno</th>
            <th width='80'>Carga Horária do Semestre</th>
            <th width='40'>Dias da Semana</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Término</th>
            <th width='60'>Hora Inicio</th>
            <th width='60'>Hora Término</th>
            <th width='60'>Avaliação</th>
            <th width='60'>Situação</th>
            <th width='250'>Nome dos Alunos</th>
            <th width='60'>Atualizar Dados</th>
            <th width='60'>Deletar Turma</th>
	</tr>
</thead>
<tbody>

<?php
$num = 0;
while ($row = $stmt->fetch()) {
    if ($row['12']=='Fechada'){
        if($num % 2 == 0){
            $class="class='dif'";//Número par
            $style="background:#D0FFD0";
        } else {
            $class="";//Número impar
            $style="background:#FFF68F";
        }
        echo "<form name='".$row['0']."' method='post' action='update_turma.php' target='mainFrame_turma'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td nowrap='nowrap' width='250'>".$row['1']."</td>
            <td><input type='text' size='10' name='nome' value='".$row['2']."' style='$style' required></td>
            <td><input type='text' size='10' name='turno' value='".$row['3']."' style='$style' required></td>
            <td><input type='text' size='10' name='qtdAluno' value='".$row['4']."' style='$style' required></td>
            <td><input type='text' size='10' name='carHorSem' value='".$row['5']."' style='$style' required></td>
            <td><input type='text' size='10' name='diasSemana' value='".$row['6']."' style='$style'></td>
            <td><input type='date' size='10' name='dataInicio' value='".$row['7']."' style='$style' required></td>
            <td><input type='date' size='10' name='dataTermino' value='".$row['8']."' style='$style' required></td>
            <td><input type='text' size='18' name='horaInicio' value='".$row['9']."' style='$style'></td>
            <td><input type='text' size='18' name='horaTermino' value='".$row['10']."' style='$style'></td>
            <td><input type='text' size='10' name='avaliacao' value='".$row['11']."' style='$style' required></td>
            <td><select name='situacao' style='$style'>"; ?>
                <option value='Aberta' <?php echo $row['12'] == 'Aberta' ? 'selected':'' ?> >Aberta &#8195;&#8195;</option>
                <option value='Fechada' <?php echo $row['12'] == 'Fechada' ? 'selected':'' ?> >Fechada &#8195;&#8195;</option>
     <?php echo"</select></td>
            <td nowrap='nowrap' width='250'>";
                $stmt1->execute();
                while ($row1 = $stmt1->fetch()) {
                    if ($row1['0']==$row['0']){
                    echo $row1['2']."<br>";
                    }
                }
            echo "
            </td>
            <td><input type='hidden' name='local' value='principal_turma'>
                <input type='hidden' name='Aluno_id[]' value=''>
                <input type='submit' name='Submit' value='Atualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='delete_turma.php' target='mainFrame_turma'>
            <td><input type='hidden' name='id' value='".$row['0']."'>
                <input type='hidden' name='local' value='principal_turma'>
                <input type='submit' name='Submit' value='Deletar'></td>
            </form>
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