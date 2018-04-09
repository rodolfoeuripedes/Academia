<html>
    <head>
        <title>Menu Turma</title>
        <script type="text/javascript">
            function submeter() {
                with (document.turma) {
                    method = "POST";
                    action = "principal_turma.php";
                    target = 'mainFrame_turma';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="turma" onKeyUp="submeter()">
            <table>
                <tr>
                    <td>Nome Professor</td>
                    <td>Nome Turma</td>
                    <td>Turno</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" size="18" name="nomeProfessor"></td>
                    <td><input type="text" size="18" name="nomeTurma"></td>
                    <td><input type="text" size="18" name="turno"></td>
                    <td><input name="reset" type="reset" value="Limpar" onclick="submeter()"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
