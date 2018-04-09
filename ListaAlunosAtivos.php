<?php

require_once 'classCriadora.php';

$db = Criadora::criaDB();
$todosAlunos = $db->prepare("select * from aluno where ativoInativo like '1' order by nome");
$todosAlunos->execute();

echo "<option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>";
while ($row = $todosAlunos->fetch()) {
    echo "<option value='" . $row['0'] . "'>" . $row['1'] . "</option>";
}
