<html>
    <head>
        <title>Principal</title>
    </head>
    <body>
        <h1 align="center" />&nbsp;&nbsp;&nbsp;Principal&nbsp;&nbsp;&nbsp;
        <font size="3" face="Times New Roman">
        <br>
        
        <?php
        require_once 'classAluno.php';
        require_once 'classFuncionario.php';
        require_once 'classProfessor.php';
        require_once 'classCriadora.php';
        
//=========================================================
//Testes com Alunos

//Estancia um novo Aluno
        //$Aluno = Criadora::criaAluno();

//Insert
        /*
          $Aluno->setNome("Isis Brasil");
          $Aluno->setDataNasc("1987/05/11");
          $Aluno->setCpf("082.040.854-94");
          $Aluno->setRg("2090295 SDS-PE");
          $Aluno->setSexo("Feminino");
          $Aluno->setEndereco("Rua");
          $Aluno->setFoneCasa("81 3327-3335");
          $Aluno->setFoneCelular("81 98829-6869");
          $Aluno->setEstadoCivil("Casado");
          $Aluno->setProfissao("Analista");
          $Aluno->setEmail("isinha.brasil@gmail.com");
          $Aluno->setAtivoInativo(1);
          $Aluno->insert();
         */

//Delete
        //$Aluno->delete(1);
        
//Lista todos os registros
        /*$stmt = $Aluno->fetchAll();
        while ($ro = $stmt->fetch()) {
            echo "<p>ID: " . $ro['0'] . "<br>";
            echo "Nome: " . $ro['1'] . "<br>";
            echo "Data Nascimento: " . $ro['2'] . "<br>";
            echo "CPF: " . $ro['3'] . "<br>";
        }*/
        
//Lista apenas um registro
        /*$stmt = $Aluno->find(1);
        while ($ro = $stmt->fetch()) {
            echo "<p>ID: " . $ro['0'] . "<br>";
            echo "Nome: " . $ro['1'] . "<br>";
            echo "Data Nascimento: " . $ro['2'] . "<br>";
            echo "CPF: " . $ro['3'] . "<br>";
        }*/

//=========================================================
//Testes com Funcionários

//Estancia um novo funcionario
        //$Funcionario = Criadora::criaFuncionario();

//Lista todos os registros
        /*$stmt = $Funcionario->fetchAll();
        while ($ro = $stmt->fetch()) {
            echo "<p>ID: ".$ro['0']."<br>";
            echo "Nome: ".$ro['1']."<br>";
            echo "Data Nascimento: ".$ro['2']."<br>";
            echo "CPF: ".$ro['3']."<br>";
            echo "Cargo: ".$ro['cargo']."<br>";
        }*/
        
//Lista apenas um registro
        /*$stmt = $Funcionario->find(1);
        while ($ro = $stmt->fetch()) {
            echo "<p>ID: ".$ro['0']."<br>";
            echo "Nome: ".$ro['1']."<br>";
            echo "Data Nascimento: ".$ro['2']."<br>";
            echo "CPF: ".$ro['3']."<br>";
            echo "Cargo: ".$ro['cargo']."<br>";
        }*/
        
//Delete
        //$Funcionario->delete(26);

//=========================================================
/*print_r($stmt->fetchAll());
echo "<br><br><br>";
$stmt->execute();
print_r($stmt->fetch());*/

        ?>

</body>
</html>
