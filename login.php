<?php

require_once 'classCriadora.php';
require_once 'classLogin.php';

//Obtém os valores digitados no formulário de index.php
$email = $_POST["email"];
$senha = $_POST["senha"];

$login = Criadora::criaLogin();
$resultado = $login->autenticar($_POST['email'], $_POST['senha']);

if ($resultado) {
    header("Location: index2.php");
} else {
    echo "<html><body>";
    echo "<p align=\"center\">Usuário não encontrado ou senha incorreta</p>";
    echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
    echo "</body></html>";
}
