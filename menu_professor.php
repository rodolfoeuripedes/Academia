<html>
    <head>
        <title>Menu Professor</title>
        <script type="text/javascript">
            function submeter() {
                with (document.professor) {
                    method = "POST";
                    action = "principal_professor.php";
                    target = 'mainFrame_professor';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="professor" onKeyUp="submeter()">
            <table>
                <tr>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>RG</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" size="18" name="nome"></td>
                    <td><input type="text" size="18" name="cpf"></td>
                    <td><input type="text" size="18" name="rg"></td>
                    <td><input name="reset" type="reset" value="Limpar" onclick="submeter()"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
