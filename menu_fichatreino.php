<html>
    <head>
        <title>Menu Ficha de Treino</title>
        <script type="text/javascript">
            function submeter() {
                with (document.fichatreino) {
                    method = "POST";
                    action = "principal_fichatreino.php";
                    target = 'mainFrame_fichatreino';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="fichatreino" onKeyUp="submeter()">
            <table>
                <tr>
                    <td>Nome Professor</td>
                    <td>Nome Aluno</td>
                    <td>Ano Término</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" size="18" name="nomeProfessor"></td>
                    <td><input type="text" size="18" name="nomeAluno"></td>
                    <td><input type="text" size="18" name="dataTermino"></td>
                    <td><input name="reset" type="reset" value="Limpar" onclick="submeter()"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
