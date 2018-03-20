<?php
session_start();

if($_SESSION['logado']) {
?>
<html>
<head>
<title>Academia</title>
</head>
<frameset rows="80,*" framespacing="0" frameborder="no" border="0">
  <frame src="menu.php" name="topFrame" scrolling="NO" noresize >
  <frame src="principal.php" name="mainFrame">
        <noframes>
            <body>
            </body>
        </noframes>
    </frameset>
</html>
<?php
}
else{
    echo "Você não tem permissão de acessar.";
    echo "<html><body style='background-repeat:no-repeat;
            background-color:black;
            background-position:top;
            margin-left:\"0\";
            margin-top:\"0\";
            margin-right:\"0\";
            margin-bottom:\"0\"'>";
    echo "<div align=\"center\"><img src=\"images/cadeado.jpg\" width=\"1003\" height=\"768\" border=\"0\" usemap=\"#voltar\">";
    echo "<map name=\"voltar\" id=\"voltar\">";
    echo "<area shape=\"poly\" coords=\"654,485,710,452,699,443,643,472\" href=\"index.php\"></map></div>";
    echo "</body></html>";
}