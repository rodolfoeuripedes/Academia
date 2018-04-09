<?php

require_once 'classCriadora.php';
require_once 'classTurma.php';

$id = $_POST['id'];
$Professor_nome = $_POST['Professor_nome'];
$nome = $_POST['nome'];
$turno = $_POST['turno'];
$qtdAluno = $_POST['qtdAluno'];
$carHorSem = $_POST['carHorSem'];
$diasSemana = $_POST['diasSemana'];
$dataInicio = $_POST['dataInicio'];
$dataTermino = $_POST['dataTermino'];
$horaInicio = $_POST['horaInicio'];
$horaTermino = $_POST['horaTermino'];
$avaliacao = $_POST['avaliacao'];
$situacao = $_POST['situacao'];


$db = ConexaoSingleton::getInstance();
$stmt1 = $db->prepare("select t.id, th.Aluno_id, a.nome from turma t, turma_has_aluno th, aluno a where th.Turma_id=t.id and th.Aluno_id=a.id and t.id=$id order by t.id");
$stmt1->execute();

$todosAlunos = $db->prepare("select * from aluno where ativoInativo like '1' order by nome");
$todosAlunos->execute();

?>


<html>
    <head>
        <title>Visualizar Turma</title>
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
                                <select id="Aluno_id' + x + '" name="Aluno_id[]" form="atualizar">\
                                </select>\
                            </td>\
                            <td><a href="#" class="remove_campo" id="remove' + x + '"><img class="delete" src="images/xVermelho.png" width="16" height="16" border="0"></a></td>\
                        </tr>\
                        ');
                        var y = x;
                        $.get('ListaAlunosAtivos.php', function(data){
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

<table border='1' id='alter'>
    <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Professor</th>
            <th width='80'>Nome da Turma</th>
            <th width='60'>Turno</th>
            <th width='80'>Qtd. de Aluno</th>
            <th width='80'>Carga Horária do Semestre</th>
            <th width='40' colspan='3'>Dias da Semana</th>
        </tr>
        <?php
        echo "
            <form id='atualizar' name='".$id."' method='post' action='update_turma.php' target='mainFrame'>
            <tr>
            <td align='center'><input type='hidden' name='id' value='".$id."'>".$id."</td>
            <td nowrap='nowrap' width='250'>".$Professor_nome."</td>
            <td><input type='text' size='10' name='nome' value='".$nome."' required></td>
            <td><input type='text' size='10' name='turno' value='".$turno."' required></td>
            <td><input type='text' size='10' name='qtdAluno' value='".$qtdAluno."' required></td>
            <td><input type='text' size='10' name='carHorSem' value='".$carHorSem."' required></td>
            <td colspan='3'><input type='text' size='10' name='diasSemana' value='".$diasSemana."' ></td>
            </tr>";
        ?>
        <tr height="40">
            <td colspan='9'></td>
        </tr>
        <tr>
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
        echo "
            <tr>
            <td><input type='date' size='10' name='dataInicio' value='".$dataInicio."' required></td>
            <td><input type='date' size='10' name='dataTermino' value='".$dataTermino."' required></td>
            <td><input type='text' size='18' name='horaInicio' value='".$horaInicio."' ></td>
            <td><input type='text' size='18' name='horaTermino' value='".$horaTermino."' ></td>
            <td><input type='text' size='10' name='avaliacao' value='".$avaliacao."' required></td>
            <td><select name='situacao'>"; ?>
                <option value='Aberta' <?php echo $situacao == 'Aberta' ? 'selected':'' ?> >Aberta &#8195;&#8195;</option>
                <option value='Fechada' <?php echo $situacao == 'Fechada' ? 'selected':'' ?> >Fechada &#8195;&#8195;</option>
     <?php echo"</select></td>"; ?>
                <td width='250'>
                    <input type="button" id="add_field" value="Adicionar">
                    <table id="listas" border="0">
                        <tr>
                            <td>
                                <?php
                                //$stmt1->execute();
                                while ($row1 = $stmt1->fetch()) {
                                ?>
                                    <select id='Aluno_id0' name='Aluno_id[]'>
                                    <option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>
                                    <?php
                                    $todosAlunos->execute();
                                    while ($row2 = $todosAlunos->fetch()) {
                                        echo "<option value='".$row2['0']."'  ";?> <?php  echo $row2['0'] == $row1['1'] ? 'selected':'' ?> <?php echo"  >".$row2['1']."</option>";
                                        }
                                    ?>
                                    </select>
                                <br>
                                <?php
                                }//Fecha while
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
<?php echo "<td><input type='hidden' name='local' value='visualizar_turma'>
                <input type='submit' name='Submit' value='Atualizar' form='atualizar'></td>
            </form>
            <form name='".$id."' method='post' action='delete_turma.php' target='mainFrame'>
            <td><input type='hidden' name='id' value='".$id."'>
                <input type='hidden' name='local' value='visualizar_turma'>
                <input type='submit' name='Submit' value='Deletar'></td>
            </form>
        </tr>";
echo "</tbody>
      </table>
      <br>";
?>
        <br>
    </body>
</html>
