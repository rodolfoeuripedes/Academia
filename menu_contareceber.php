<html>
    <head>
        <title>Menu Conta a Receber</title>
        <script type="text/javascript">
            function submeter() {
                with (document.contareceber) {
                    method = "POST";
                    action = "principal_contareceber.php";
                    target = 'mainFrame_contareceber';
                    submit();
                }
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="contareceber" onKeyUp="submeter()">
            <table>
                <tr>
                    <td>Nome Aluno</td>
                    <td>Ano Pagamento</td>
                    <td>Forma Pagamento</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" size="18" name="nomeAluno"></td>
                    <td><input type="text" size="18" name="anoPagamento"></td>
                    <td><input type="text" size="18" name="formaPagamento"></td>
                    <td><input name="reset" type="reset" value="Limpar" onclick="submeter()"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
