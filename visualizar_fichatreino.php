<?php

require_once 'classCriadora.php';
require_once 'classFichaTreino.php';

$id = $_POST['id'];
$Professor_nome = $_POST['Professor_nome'];
$Aluno_nome = $_POST['Aluno_nome'];
$dataInicio = $_POST['dataInicio'];
$dataTermino = $_POST['dataTermino'];
$descricao = $_POST['descricao'];
$dificuldade = $_POST['dificuldade'];


$db = ConexaoSingleton::getInstance();
$stmt1 = $db->prepare("select f.id, th.Exercicio_id, e.nome, th.treino, th.serie, th.repeticao, th.carga from fichatreino f, fichatreino_has_exercicio th, exercicio e where th.FichaTreino_id=f.id and th.Exercicio_id=e.id and f.id=$id order by f.id, th.treino, e.nome");
$stmt1->execute();

//$todosAlunos = $db->prepare("select * from aluno where ativoInativo like '1' order by nome");
//$todosAlunos->execute();

$todosExercicios = $db->prepare("select * from exercicio where ativoInativo like '1' order by nome");
$todosExercicios->execute();

?>


<html>
    <head>
        <title>Visualizar Ficha de Treino</title>
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
                                <select id="Exercicio_id' + x + '" name="Exercicio_id[]" form="atualizar">\
                                </select>\
                            </td>\
                            <td><input type="text" size="10" name="treino[]" value="" placeholder="A ou B ou C" form="atualizar"></td>\
                            <td><input type="text" size="10" name="serie[]" value="" form="atualizar"></td>\
                            <td><input type="text" size="10" name="repeticao[]" value="" form="atualizar"></td>\
                            <td><input type="text" size="10" name="carga[]" value="" form="atualizar"></td>\
                            <td><a href="#" class="remove_campo" id="remove' + x + '"><img class="delete" src="images/xVermelho.png" width="16" height="16" border="0"></a></td>\
                        </tr>\
                        ');
                        var y = x;
                        $.get('listaExerciciosAtivos.php', function(data){
                            $("#Exercicio_id" + y).html(data);
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
            <th width='250'>Nome do Aluno</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Término</th>
            <th width='60'>Descrição</th>
            <th width='80' colspan='3'>Dificuldade</th>
        </tr>
        <?php
        echo "
            <form id='atualizar' name='".$id."' method='post' action='update_fichatreino.php' target='mainFrame'>
                <tr>
                    <td align='center'><input type='hidden' name='id' value='".$id."'>".$id."</td>
                    <td nowrap='nowrap' width='250'>".$Professor_nome."</td>
                    <td nowrap='nowrap' width='250'>".$Aluno_nome."</td>
                    <td><input type='date' size='10' name='dataInicio' value='".$dataInicio."' required></td>
                    <td><input type='date' size='10' name='dataTermino' value='".$dataTermino."' required></td>
                    <td><input type='text' size='10' name='descricao' value='".$descricao."' required></td>
                    <td colspan='3'><input type='text' size='10' name='dificuldade' value='".$dificuldade."' ></td>
            </tr>";
        ?>
        <tr height="40">
            <td colspan='7'></td>
        </tr>
        <tr>
            <th width='250'>Nome dos Exercícios</th>
            <th width='60'>Atualizar Dados</th>
            <th width='60'>Deletar Ficha de Treino</th>
	</tr>
    </thead>
    <tbody>
        <tr>
            <td width='250'>
                <input type="button" id="add_field" value="Adicionar">
                <table id="listas" border="1">
                    <tr>
                        <th>Exercício</th>
                        <th>Treino</th>
                        <th>Série</th>
                        <th>Repetição</th>
                        <th>Carga (Kg)</th>
                    </tr>
                    <?php
                    //$stmt1->execute();
                    while ($row1 = $stmt1->fetch()) {
                    ?>
                    <tr>
                        <td>
                            <select id='Exercicio_id0' name='Exercicio_id[]'>
                                <option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>
                                <?php
                                $todosExercicios->execute();
                                while ($row2 = $todosExercicios->fetch()) {
                                    echo "<option value='".$row2['0']."'  ";?> <?php  echo $row2['0'] == $row1['1'] ? 'selected':'' ?> <?php echo"  >".$row2['1']."</option>";
                                }
                            ?>
                            </select>
                            <br>
                            
                        </td>
                        <td><input type='text' size='10' name='treino[]' value='<?php  echo $row1['3'] ?>' placeholder='A ou B ou C' required></td>
                        <td><input type='text' size='10' name='serie[]' value='<?php  echo $row1['4'] ?>' required></td>
                        <td><input type='text' size='10' name='repeticao[]' value='<?php  echo $row1['5'] ?>' required></td>
                        <td><input type='text' size='10' name='carga[]' value='<?php  echo $row1['6'] ?>' required></td>
                    </tr>
                    <?php
                    }//Fecha while
                    ?>
                </table>
            </td>
<?php echo "<td><input type='hidden' name='local' value='visualizar_fichatreino'>
                <input type='submit' name='Submit' value='Atualizar' form='atualizar'></td>
            </form>
            <form name='".$id."' method='post' action='delete_fichatreino.php' target='mainFrame'>
            <td><input type='hidden' name='id' value='".$id."'>
                <input type='hidden' name='local' value='visualizar_fichatreino'>
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
