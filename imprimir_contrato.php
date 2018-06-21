<?php

require_once 'classCriadora.php';
require_once 'classContrato.php';
require_once 'classAluno.php';

$id = $_POST['id'];
$Aluno_id = $_POST['Aluno_id'];

$Contrato = Criadora::criaContrato();
$stmt = $Contrato->find($id);
$row1 = $stmt->fetch();

$Aluno = Criadora::criaAluno();
$stmt = $Aluno->find($Aluno_id);
$row2 = $stmt->fetch();


echo "<script type='text/javascript'>window.print()</script>";

echo "<table border='0' align=center>
        <tr>
            <td width='800'>
            <br>
            <h2 align=center> CONTRATO DE PRESTAÇÃO DE SERVIÇOS
            <br>
            <h4 align=right>No. <u>".$row1['id']."</u> &#8195;
            <br>
            <h3 align=center>I - PARTES
            <br>
            <br>
            <font size='3' face='Times New Roman'>            
            <p align='justify'>
            CONTRATATADA (ACADEMIA) <u>Academia Body Perfect</u>, com sede 
            em <u>Recife</u>, na <u>Rua José Brandão da Silva</u>, nº <u>528</u>, bairro <u>Boa Viagem</u>, 
            CEP <u>51021-280</u>, no Estado de <u>PE</u>, inscrita no CNPJ sob o n° <u>11.280.691/0001-40</u>, 
            e no cadastro estadual sob o nº <u>454.295.633.112</u>, neste ato representado pelo seu diretor 
            <u>Pedro José Rui Marinho</u>, nacionalidade <u>Brasileiro</u>, estado civil <u>Casado</u>, profissão <u>Empresário</u>, 
            Carteira de Identidade nº <u>6487382 SDS-PE</u>, CPF n° <u>030.654.274-94</u>, residente e domicilciado na 
            <u>Rua Gustavo de Lima Peixoto</u>, nº <u>875</u>, bairro <u>Torre</u>, CEP <u>51020-986</u>, 
            Cidade <u>Recife</u>, no Estado de <u>PE</u>.
            <br>
            <br>
            CONTRATANTE (CLIENTE): <u>".$row2['nome']."</u>, estado civil <u>".$row2['estadoCivil']."</u>, profissão <u>".$row2['profissao']."</u>, Carteira de Identidade nº <u>".$row2['rg']."</u>, C.P.F. nº <u>".$row2['cpf']."</u>, 
            residente e domiciliado no endereço <u>".$row2['endereco']."</u>.
            <br>
            As partes identificadas acima têm, entre si, justo e acertado o presente Contrato de Prestação de Serviços, que 
            seregerá pelas cláusulas a seguir.
            <br>
            <br>
            <h3 align=center>II - OBJETO DO CONTRATO
            <br>
            <br>
            <font size='3' face='Times New Roman'>            
            <p align='justify'>
            Cláusula 1ª. O objeto do presente contrato é a prestação, pela ACADEMIA ao CLIENTE, dos serviços de sessões coletivas de atividades físicas, estando com sua proposta em conformidade com o CREF/CONFEF, através de seus profissionais e das aulas de atividade física. O CLIENTE, através do presente, está se matriculando na ACADEMIA para o período de <u>".$row1['dataInicio']."</u> à <u>".$row1['dataTermino']."</u>, cujos treinos ocorrerão no período “Livre”, em qualquer dia da semana das 06:00 às 22:00 horas.
            <blockquote><p align='justify'>
            Parágrafo único. A direção da ACADEMIA não se recusa a manter um diálogo construtivo com o CLIENTE ou seus RESPONSÁVEIS que demonstre um verdadeiro interesse na melhoria da qualidade das aulas e no seuprocesso evolutivo.
            <p></blockquote>
            <p align='justify'>
            Cláusula 2ª. O cliente se obriga a observar estrita e exclusivamente as orientações dos profissionais da ACADEMIA para a prática das atividades físicas. A academia não se responsabiliza por danos físicos de qualquer natureza resultantes da inobservância do cliente a estas orientações, pelo acatamento à orientação de estranhos ou ainda pelo uso inadequado dos aparelhos e equipamentos da ACADEMIA.
            <br><br>
            Cláusula 3ª. Somente nos planos semestral e anual será concedida uma licença de afastamento de respectivamente 15 e 30 dias, com direito a reposição do período não usufruído no final do contrato. Esta licençadeverá ser formalizada junto à recepção da ACADEMIA por escrito e com pelo menos 15 dias de antecedência. Somente no plano anual ela poderá ser concedida em duas etapas de 15 dias.
            <br><br>
            Cláusula 4ª. A ACADEMIA, livre de quaisquer ônus para com o CLIENTE, poderá utilizar-se da sua imagem para fins exclusivos de divulgação da ACADEMIA e suas atividades, podendo, para tanto, reproduzi-la ou divulgá-la junto a Internet, jornais e todos os demais meios de comunicação público ou privado.
            <br>
            <blockquote><p align='justify'>
            Parágrafo 1º. Em nenhuma hipótese poderá a imagem do CLIENTE ser utilizada de maneira contrária àmoral ou aos bons costumes ou à ordem pública.
            <br><br>
            Parágrafo 2º. O não comparecimento do CLIENTE às dependências da ACADEMIA, ora contratada, não exime o pagamento, tendo em vista a disponibilidade do serviço.
            <br><br>
            Parágrafo 3º. No caso de menores, após o término das sessões, deverá o RESPONSÁVEL retirá-lo imediatamente.
            <p></blockquote>
            <p align='justify'>
            Cláusula 5ª. Todo o regulamento interno da ACADEMIA é adendo deste instrumento, possuindo força contratual.
            <br>
            <br>
            <h3 align=center>III - REMUNERAÇÃO
            <br>
            <br>
            <font size='3' face='Times New Roman'>            
            <p align='justify'>
            Cláusula 6ª. Pela prestação dos serviços, referentes ao período contratado conforme previsto na cláusula “1”, o CLIENTE, pagará à ACADEMIA o valor de R$ <u>".$row1['valor']."</u> com R$ <u>".$row1['desconto']."</u> de desconto, que deverá ser pago a tempo e modo conforme opção feita pelo CLIENTE, entre as seguir:
            <br>
            <br>
            <blockquote><p align='justify'>
            ( ) À vista (no ato da matrícula) – com ___% de desconto = R$ __________.
            <br>
            ( ) Em 03 (três) – sendo a 1ª no ato da matrícula e as demais, sucessivamente, vencendo a 2ª em ___/___/___ e a 3ª em ___/___/___ com ___ % de desconto = R$ ________.
            <br>
            ( ) Em 06 (seis) – sendo a 1ª no ato da matrícula e as demais, sucessivamente, vencendo a 2ª em ___/___/___ com ___ % de desconto = R$ _______ e a última em ___/___/___.
            <br>
            ( ) Em 12 (doze) – sendo a 1ª no ato da matrícula e as demais, sucessivamente, vencendo a 2ª em ___/___/___ com ___ % de desconto = R$ _______ e a última em ___/___/___.
            <br><br>
            Parágrafo único. O Exame Médico, a Carteirinha (ambos obrigatórios para todos) e a Avaliação Física (obrigatória para os maiores de 14 anos) serão cobrados antecipadamente, junto com a 1ªmensalidade, no valor de R$ ____________________.
            </p></blockquote>
            <p align='justify'>
            Cláusula 7ª. O CLIENTE/RESPONSÁVEL se obriga a ressarcir a ACADEMIA por qualquer dano causado por ele, por dolo ou culpa, até 48 horas após a constatação do evento e sua consequente comunicação formal ao CLIENTE.
            <br><br>
            Cláusula 8ª. Após 30 dias de inadimplência, a matrícula será trancada e o cliente considerado desistente.
            <br>
            <blockquote><p align='justify'>
            Parágrafo 1º. Se algum recesso na oferta de sessões de treinos ocorrer por iniciativa da ACADEMIA, esta implementará formas de ressarcir o CLIENTE os serviços pagos e não prestados.
            <br><br>
            Parágrafo 2º. Caso o CLIENTE venha solicitar trancamento de sua matrícula, durante a vigência deste  contrato, por qualquer motivo, terá o mesmo que fazê-lo por escrito de próprio punho, justificando o motivo esó, após esta data terá direito aos dias que faltam para o término do seu contrato, retirando na recepção o contra-recibo dos dias restantes.
            </p></blockquote>
            <br>
            <h3 align=center>IV - RENOVAÇÃO
            <br>
            <br>
            <font size='3' face='Times New Roman'>            
            <p align='justify'>
            Cláusula 9ª. Após o período discriminado na Cláusula 1ª., este contrato poderá ser renovado automaticamente, bastando para tanto que o (a) CLIENTE efetue o (s) pagamento (s) referentes aos meses seguintes, como descrito na cláusula 6ª. e assim sucessivamente.
            <br>
            <br>
            <h3 align=center>V - RESCISÃO
            <br>
            <br>
            <font size='3' face='Times New Roman'>            
            <p align='justify'>
            Cláusula 10ª. O presente instrumento NÃO poderá ser rescindido a qualquer momento por qualquer das partes, visto tratar-se de CURSO LIVRE.
            <br><br>
            <blockquote><p align='justify'>
            PARÁGRAFO ÚNICO – CASO O CLIENTE DESISTA EXPRESSAMENTE DO CONTRATO EM QUALQUER ÉPOCA, A ACADEMIA COBRARÁ, A DIFERENÇA OBTIDA ATRAVÉS DA PROMOÇÃO DOS DESCONTOS DADOS PARA PLANOS PARCELADOS, CARACTERIZANDO POR PARTE DO CLIENTE QUEBRA DE CONTRATO. O NÃO PAGAMENTO DAS PARCELAS ASSUMIDAS NESTE CONTRATO É PASSÍVEL DAS MEDIDAS LEGAIS CABÍVEIS.
            </p></blockquote>
            <br>
            <h3 align=center>VI - FORO
            <br>
            <br>
            <font size='3' face='Times New Roman'>
            <p align='justify'>
            Cláusula 11ª. As partes atribuem ao presente Contrato plena eficácia e força executiva e extrajudicial.
            <br><br>
            Cláusula 12ª. Para dirimir quaisquer controvérsias originadas por este contrato, fica eleito o Fórum da Comarca em cuja jurisdição o CLIENTE/RESPONSAVÉL tiver domicílio, arcando a parte vencida em demanda judicial com as custas processuais a que der causa e com os honorários advocatícios arbitrados do patrono da parte vencedora.
            <font size='2' face='arial'>
            <p align='justify'><b>Estou ciente de todas as propostas deste Contrato de Prestação de Serviços para o curso e assumo a validade e veracidade das cláusulas nele descritas. Declaro ainda estar em perfeitas condições de saúde, conhecendo e assumindo todos os riscos advindos da atividade física à minha pessoa ou àquele por quem me responsabilizo, não portando também nenhuma moléstia que possa prejudicar os demais freqüentadores da Academia.</b></p>
            <p align='justify'>
            Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor, juntamente com 2 (duas) testemunhas idôneas, rubricando todas as suas páginas.</b>
            </p>
            <br><br><br><br>
            <p align='center'>
            _____________________________, ______ de ______________________ de ________.
            <br><br><br><br><br>
            ________<u>".$row2['nome']."</u>________ &#8195;&#8195; _______<u>Pedro José Rui Marinho</u>_______
            <br>
            &#8195;&#8195;&#8195;Nome do Contratante &#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195; Nome do Contratado
            <br><br><br><br><br>
            ____________________________________ &#8195;&#8195; ___________________________________
            <br>
            Assinatura do Contratante &#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195;&#8195; Assinatura do Contratado
            <br><br>
            </td>
        </tr>
      </table>";
