<?php

$escolha = $_POST['relatorios'];
//$escolha2 = $_POST['relatorios2'];

if ($escolha == 1) {
    header("Location: conjunto_aluno.php");
} else if ($escolha == 2) {
    header("Location: conjunto_funcionario.php");
} else if ($escolha == 3) {
    header("Location: conjunto_professor.php");
} else if ($escolha == 4) {
    header("Location: conjunto_contrato.php");
} else if ($escolha == 5) {
    header("Location: conjunto_exercicio.php");
} else if ($escolha == 6) {
    header("Location: conjunto_fichaavaliacao.php");
}
/*
  //menu edição
  if ($escolha2==1)
  { header("Location: xxxxxxx.php");
  }
 */
