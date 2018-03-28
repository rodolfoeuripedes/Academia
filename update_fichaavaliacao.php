<?php

require_once 'classCriadora.php';
require_once 'classFichaAvaliacao.php';

$id = $_POST['id'];


$dataAvaliacao = $_POST['dataAvaliacao'];
$objetivo = $_POST['objetivo'];
$obsObjetivo = $_POST['obsObjetivo'];
$medTorax = $_POST['medTorax'];
$medCinturaAlta = $_POST['medCinturaAlta'];
$medCinturaAbdomen = $_POST['medCinturaAbdomen'];
$medQuadril = $_POST['medQuadril'];
$medCoxaDir = $_POST['medCoxaDir'];
$medCoxaEsq = $_POST['medCoxaEsq'];
$medPanturrilhaDir = $_POST['medPanturrilhaDir'];
$medPanturrilhaEsq = $_POST['medPanturrilhaEsq'];
$medBracoDir = $_POST['medBracoDir'];
$medBracoEsq = $_POST['medBracoEsq'];
$medAntebracoDir = $_POST['medAntebracoDir'];
$medAntebracoEsq = $_POST['medAntebracoEsq'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$FichaAvaliacao = Criadora::criaFichaAvaliacao();

$FichaAvaliacao->setId($id);


$FichaAvaliacao->setDataAvaliacao($dataAvaliacao);
$FichaAvaliacao->setObjetivo($objetivo);
$FichaAvaliacao->setObsObjetivo($obsObjetivo);
$FichaAvaliacao->setMedTorax($medTorax);
$FichaAvaliacao->setMedCinturaAlta($medCinturaAlta);
$FichaAvaliacao->setMedCinturaAbdomen($medCinturaAbdomen);
$FichaAvaliacao->setMedQuadril($medQuadril);
$FichaAvaliacao->setMedCoxaDir($medCoxaDir);
$FichaAvaliacao->setMedCoxaEsq($medCoxaEsq);
$FichaAvaliacao->setMedPanturrilhaDir($medPanturrilhaDir);
$FichaAvaliacao->setMedPanturrilhaEsq($medPanturrilhaEsq);
$FichaAvaliacao->setMedBracoDir($medBracoDir);
$FichaAvaliacao->setMedBracoEsq($medBracoEsq);
$FichaAvaliacao->setMedAntebracoDir($medAntebracoDir);
$FichaAvaliacao->setMedAntebracoEsq($medAntebracoEsq);
$FichaAvaliacao->setPeso($peso);
$FichaAvaliacao->setAltura($altura);
$FichaAvaliacao->update();
?>

<script type='text/javascript'>
    alert('Ficha de Avaliação atualizada com sucesso!!!');
    location = 'principal_fichaavaliacao.php';
</script>
