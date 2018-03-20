<html>
    <head>
        <title>Menu Funcionario</title>
        <script type="text/javascript">
            function submeter() {
                with (document.funcionario) {
                    method = "POST";
                    action = "principal_funcionario.php";
                    target = 'mainFrame_funcionario';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="funcionario" onKeyUp="submeter()">
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
