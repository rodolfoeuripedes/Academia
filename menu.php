<?php
session_start();
?>
<html>
    <head>
        <title>Menu</title>
        <script type="text/javascript">
            function Home() {
                with (document.home) {
                    method = "POST";
                    action = "principal.php";
                    target = 'mainFrame';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <table>
            <tr>
                <td width="200"></td>
                <td>
                    <form name="menu" method="post" action="tratar_escolha_menu.php" target="mainFrame">
                        Módulos<br>
                        <select name="relatorios">
                            <?php
                            if ($_SESSION['cargo'] == "Proprietario" || $_SESSION['cargo'] == "Professor" || $_SESSION['cargo'] == "Recepcionista")
                                echo "<option value=\"1\">Alunos</option>";

                            if ($_SESSION['cargo'] == "Proprietario")
                                echo "<option value=\"2\">Funcionários</option>";

                            if ($_SESSION['cargo'] == "Proprietario")
                                echo "<option value=\"3\">Professores</option>";

                            if ($_SESSION['cargo'] == "Proprietario" || $_SESSION['cargo'] == "Recepcionista")
                                echo "<option value=\"4\">Contratos</option>";
                            ?>
                        </select>
                        <input type="submit" name="Submit" value="Enviar">&nbsp;&nbsp;&nbsp;
                    </form>
                </td>
                <td>
                    <form name="home" >
                        <br>
                        <input type="button" value="Home" onclick="Home()" />
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
