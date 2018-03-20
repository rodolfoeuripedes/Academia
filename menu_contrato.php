<html>
    <head>
        <title>Menu Contrato</title>
        <script type="text/javascript">
            function submeter() {
                with (document.contrato) {
                    method = "POST";
                    action = "principal_contrato.php";
                    target = 'mainFrame_contrato';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="contrato" onKeyUp="submeter()">
            <table>
                <tr>
                    <td>Nome</td>
                    <td>Ano Inicio</td>
                    <td>Ano Termino</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" size="18" name="nome"></td>
                    <td><input type="text" size="18" name="anoInicio"></td>
                    <td><input type="text" size="18" name="anoTermino"></td>
                    <td><input name="reset" type="reset" value="Limpar" onclick="submeter()"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
