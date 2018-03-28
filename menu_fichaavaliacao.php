<html>
    <head>
        <title>Menu Ficha de Avaliação</title>
        <script type="text/javascript">
            function submeter() {
                with (document.fichaavaliacao) {
                    method = "POST";
                    action = "principal_fichaavaliacao.php";
                    target = 'mainFrame_fichaavaliacao';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="fichaavaliacao" onKeyUp="submeter()">
            <table>
                <tr>
                    <td>Nome Professor</td>
                    <td>Nome Aluno</td>
                    <td>Ano Avaliação</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" size="18" name="nomeProfessor"></td>
                    <td><input type="text" size="18" name="nomeAluno"></td>
                    <td><input type="text" size="18" name="anoAvaliacao"></td>
                    <td><input name="reset" type="reset" value="Limpar" onclick="submeter()"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
