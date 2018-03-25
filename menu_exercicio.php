<html>
    <head>
        <title>Menu Exercício</title>
        <script type="text/javascript">
            function submeter() {
                with (document.exercicio) {
                    method = "POST";
                    action = "principal_exercicio.php";
                    target = 'mainFrame_exercicio';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="exercicio" onKeyUp="submeter()">
            <table>
                <tr>
                    <td>Nome</td>
                    <td>Local do Musculo</td>
                    <td>Membro</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" size="18" name="nome"></td>
                    <td><input type="text" size="18" name="localMusculo"></td>
                    <td><input type="text" size="18" name="membro"></td>
                    <td><input name="reset" type="reset" value="Limpar" onclick="submeter()"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
