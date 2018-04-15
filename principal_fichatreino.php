<?php

require_once 'classSingleton.php';
require_once 'classCriadora.php';
require_once 'classFichaTreino.php';

$db = ConexaoSingleton::getInstance();

if (isset($_POST['nomeProfessor'])){
$nomeProfessor = $_POST['nomeProfessor'];
}
if (isset($_POST['nomeAluno'])){
$nomeAluno = $_POST['nomeAluno'];
}
if (isset($_POST['dataTermino'])){
$dataTermino = $_POST['dataTermino'];
}

?>

<html>
    <head>
        <title>Principal Ficha de Treino</title>
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
                                <select id="Exercicio_id' + x + '" name="Exercicio_id[]" form="inserir">\
                                </select>\
                            </td>\
                            <td><input type="text" size="10" name="treino[]" value="" placeholder="A ou B ou C" form="inserir"></td>\
                            <td><input type="text" size="10" name="serie[]" value="" form="inserir"></td>\
                            <td><input type="text" size="10" name="repeticao[]" value="" form="inserir"></td>\
                            <td><input type="text" size="10" name="carga[]" value="" form="inserir"></td>\
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

<!-- ===================Inserir nova ficha de treino=================== -->
<?php
$todosProfessores = $db->prepare("select * from professor where ativoInativo like '1' order by nome");
$todosProfessores->execute();

$todosAlunos = $db->prepare("select * from aluno where ativoInativo like '1' order by nome");
$todosAlunos->execute();

$todosExercicios = $db->prepare("select * from exercicio where ativoInativo like '1' order by nome");
$todosExercicios->execute();
?>
    <b>Inserir Ficha de Treino</b>
    <br>
    
    <table border='1'>
        <thead>
        <tr>
            <th width='250'>Nome do Professor</th>
            <th width='250'>Nome do Aluno</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Término</th>            
            <th width='60'>Descrição</th>
            <th width='80'>Dificuldade</th>
            <th width='60'>Nome dos Exercícios</th>
            <th width='60'>Inserir</th>
        </tr>
        </thead>
        <tbody>
            <form id='inserir' name='inserir' method='post' action='inserir_fichatreino.php' target='mainFrame_fichatreino'>
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
                <td><input type='date' size='10' name='dataInicio' value='<?php echo date("Y-m-d") ?>' min='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='date' size='10' name='dataTermino' value='<?php echo date("Y-m-d") ?>' min='<?php echo date("Y-m-d") ?>' required></td>
                <td><input type='text' size='10' name='descricao' value='' required></td>
                <td><input type='text' size='10' name='dificuldade' value='' placeholder='9.5' required></td>
                <td width='250'>
                    <input type="button" id="add_field" value="Adicionar">
                    <table id="listas" border="0">
                        <tr>
                            <th>Exercício</th>
                            <th>Treino</th>
                            <th>Série</th>
                            <th>Repetição</th>
                            <th>Carga (Kg)</th>
                        </tr>
                        <tr>
                            <td>
                                <select id='Exercicio_id0' name='Exercicio_id[]' required>
                                    <option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>
                                    <?php
                                    while ($row = $todosExercicios->fetch()) {
                                    echo "<option value='".$row['0']."'>".$row['1']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input type='text' size='10' name='treino[]' value='' placeholder='A ou B ou C' required></td>
                            <td><input type='text' size='10' name='serie[]' value='' required></td>
                            <td><input type='text' size='10' name='repeticao[]' value='' required></td>
                            <td><input type='text' size='10' name='carga[]' value='' required></td>
                        </tr>
                    </table>
                </td>
                <td><input type='submit' name='Submit' value='Inserir' form='inserir'></td>
            </tr>
            </form>
        </tbody>
    </table>

<!-- ===================Listar fichas de treino ativas=================== -->
<?php
if (isset($_POST['nomeProfessor'])){
$stmt = $db->prepare("select f.id, p.nome, a.nome, f.dataInicio, f.dataTermino, f.descricao, f.dificuldade from fichatreino f, professor p, aluno a where f.Professor_id=p.id and f.Aluno_id=a.id and p.nome like '%$nomeProfessor%' and a.nome like '$nomeAluno%' and YEAR(f.dataTermino) like '$dataTermino%' order by f.id");
$stmt1 = $db->prepare("select f.id, th.Exercicio_id, e.nome, th.treino, th.serie, th.repeticao, th.carga from fichatreino f, fichatreino_has_exercicio th, exercicio e where th.FichaTreino_id=f.id and th.Exercicio_id=e.id order by f.id, th.treino");
}
else {
$stmt = $db->prepare("select f.id, p.nome, a.nome, f.dataInicio, f.dataTermino, f.descricao, f.dificuldade from fichatreino f, professor p, aluno a where f.Professor_id=p.id and f.Aluno_id=a.id order by f.id");
$stmt1 = $db->prepare("select f.id, th.Exercicio_id, e.nome, th.treino, th.serie, th.repeticao, th.carga from fichatreino f, fichatreino_has_exercicio th, exercicio e where th.FichaTreino_id=f.id and th.Exercicio_id=e.id order by f.id, th.treino, e.nome");
}
$stmt->execute();
$stmt1->execute();

$select = $stmt->fetchAll();
$count = count($select);
$stmt->execute();
?>

<br>
<BR>
<b>Lista de Fichas de Treino Ativas. <?php echo $count ?> registros encontrados</b>
<br>
<table border='1' id='alter'>
    <thead>
	<tr>
            <th width='20'>ID</th>
            <th width='250'>Nome do Professor</th>
            <th width='80'>Nome do Aluno</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Inicio</th>
            <th width='80' title='O valor inicia com a data do dia de hoje'>Data Término</th>            
            <th width='60'>Descrição</th>
            <th width='80'>Dificuldade</th>
            <th width='60'>Nome dos Exercícios</th>
            <th width='60'>Treino</th>
            <th width='60'>Série</th>
            <th width='60'>Repetição</th>
            <th width='60'>Carga (Kg)</th>
            <th width='60'>Atualizar Dados</th>
            <th width='60'>Visualizar Ficha de Treino</th>
            <th width='60'>Deletar Ficha de Treino</th>
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
        echo "<form name='".$row['0']."' method='post' action='update_fichatreino.php' target='mainFrame_fichatreino'>
        <tr $class>
            <td align='center'><input type='hidden' name='id' value='".$row['0']."'>".$row['0']."</td>
            <td nowrap='nowrap' width='250'>".$row['1']."</td>
            <td nowrap='nowrap' width='250'>".$row['2']."</td>
            <td><input type='date' size='10' name='dataInicio' value='".$row['3']."' style='$style' required></td>
            <td><input type='date' size='10' name='dataTermino' value='".$row['4']."' style='$style' required></td>
            <td><input type='text' size='10' name='descricao' value='".$row['5']."' style='$style' required></td>
            <td><input type='text' size='10' name='dificuldade' value='".$row['6']."' style='$style' placeholder='9.5' required></td>
            <td nowrap='nowrap' width='250'>";
                $stmt1->execute();
                while ($row1 = $stmt1->fetch()) {
                    if ($row1['0']==$row['0']){
                    echo $row1['2']."<br>";
                    }
                }
      echo "</td>
            <td nowrap='nowrap' width='60'>";
                $stmt1->execute();
                while ($row1 = $stmt1->fetch()) {
                    if ($row1['0']==$row['0']){
                    echo $row1['3']."<br>";
                    }
                }
      echo "</td>
            <td nowrap='nowrap' width='60'>";
                $stmt1->execute();
                while ($row1 = $stmt1->fetch()) {
                    if ($row1['0']==$row['0']){
                    echo $row1['4']."<br>";
                    }
                }
      echo "</td>
            <td nowrap='nowrap' width='60'>";
                $stmt1->execute();
                while ($row1 = $stmt1->fetch()) {
                    if ($row1['0']==$row['0']){
                    echo $row1['5']."<br>";
                    }
                }
      echo "</td>
            <td nowrap='nowrap' width='60'>";
                $stmt1->execute();
                while ($row1 = $stmt1->fetch()) {
                    if ($row1['0']==$row['0']){
                    echo $row1['6']."<br>";
                    }
                }
      echo "</td>
            <td><input type='hidden' name='local' value='principal_fichatreino'>
                <input type='hidden' name='Exercicio_id[]' value=''>
                <input type='hidden' name='treino[]' value=''>
                <input type='hidden' name='serie[]' value=''>
                <input type='hidden' name='repeticao[]' value=''>
                <input type='hidden' name='carga[]' value=''>
                <input type='submit' name='Submit' value='Atualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='visualizar_fichatreino.php' target='mainFrame'>
            <td><input type='hidden' name='id' value='".$row['0']."'>
                <input type='hidden' name='Professor_nome' value='".$row['1']."'>
                <input type='hidden' name='Aluno_nome' value='".$row['2']."'>
                <input type='hidden' name='dataInicio' value='".$row['3']."'>
                <input type='hidden' name='dataTermino' value='".$row['4']."'>
                <input type='hidden' name='descricao' value='".$row['5']."'>
                <input type='hidden' name='dificuldade' value='".$row['6']."'>
                <input type='submit' name='Submit' value='Visualizar'></td>
            </form>
            <form name='".$row['0']."' method='post' action='delete_fichatreino.php' target='mainFrame_fichatreino'>
            <td><input type='hidden' name='id' value='".$row['0']."'>
                <input type='hidden' name='local' value='principal_fichatreino'>
                <input type='submit' name='Submit' value='Deletar'></td>
            </form>
        </tr>";
        $num++;
} //Fecha while
echo "</tbody>
      </table>
      <br>";



?>
        
        
        
        
        <br>
    </body>
</html>