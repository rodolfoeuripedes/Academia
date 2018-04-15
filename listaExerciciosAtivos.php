<?php

require_once 'classCriadora.php';

$db = Criadora::criaDB();
$todosExercicios = $db->prepare("select * from exercicio where ativoInativo like '1' order by nome");
$todosExercicios->execute();

echo "<option value=''>&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;</option>";
while ($row = $todosExercicios->fetch()) {
    echo "<option value='" . $row['0'] . "'>" . $row['1'] . "</option>";
}
