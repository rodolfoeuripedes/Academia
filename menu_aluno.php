<html>
    <head>
        <title>Menu Aluno</title>
        <script type="text/javascript">
            function submeter() {
                with (document.aluno) {
                    method = "POST";
                    action = "principal_aluno.php";
                    target = 'mainFrame_aluno';
                    submit();
                }
            }
            function focusFunction1() {
                // Focus = Changes the background color of input to yellow
                document.getElementById("myInput1").style.background = "yellow";
            }
            function blurFunction1() {
                // No focus = Changes the background color of input to red
                document.getElementById("myInput1").style.background = "white";
            }
            function focusFunction2() {
                // Focus = Changes the background color of input to yellow
                document.getElementById("myInput2").style.background = "yellow";
            }
            function blurFunction2() {
                // No focus = Changes the background color of input to red
                document.getElementById("myInput2").style.background = "white";
            }
            function focusFunction3() {
                // Focus = Changes the background color of input to yellow
                document.getElementById("myInput3").style.background = "yellow";
            }
            function blurFunction3() {
                // No focus = Changes the background color of input to red
                document.getElementById("myInput3").style.background = "white";
            }
        </script>
    </head>
    <body>
        <p><b>Filtro de Pesquisa</b></p>
        <form name="aluno" onKeyUp="submeter()">
            <table>
                <tr>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>RG</td>
                    <td></td>
                </tr>
                <tr>
                    <td><input id="myInput1" onfocus="focusFunction1()" onblur="blurFunction1()" type="text" size="18" name="nome"></td>
                    <td><input id="myInput2" onfocus="focusFunction2()" onblur="blurFunction2()" type="text" size="18" name="cpf"></td>
                    <td><input id="myInput3" onfocus="focusFunction3()" onblur="blurFunction3()" type="text" size="18" name="rg"></td>
                    <td><input name="reset" type="reset" value="Limpar" onclick="submeter()"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
