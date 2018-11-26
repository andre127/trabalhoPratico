<?php
include "utils.php";
?>
<html>
    <head>
        <title>Locaçoes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body> 
        <div id="listar"class="container">
            <br><br>
            <a id="btnCadastro" class="waves-effect waves-light btn" href="CadastroLocacao.php">Cadastrar</a>
            <button id="asd" class="btn waves-effect waves-light cadastroLoc" >editar
                <i class="material-icons right"></i>                        
            </button>
            <br><br>
            <div class="row">
                <div class="col s12">
                    <!--Tabela para listagem das locações-->
                    <table  class="bordered" class="responsive-table">
                        <thead>
                            <tr>

                                <th>Nome Cliente</th>
                                <th>CPF cliente</th>
                                <th>Carro</th>
                                <th>Placa Carro</th>
                                <th>Data de Locacao</th>
                                <th>Data de Devolucao</th>
                                <th>Km</th>
                                <th>Situacao</th>
                                <th>Editar</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            //comando sql para selecionar somente as informaçoes necessarias na listagem de locação
                            $sql = "SELECT * FROM locacao INNER JOIN pessoa inner join cliente on locacao.idCliente = cliente.id_Cliente "
                                    . "AND cliente.idPessoa = pessoa.id_Pessoa AND pessoa.tipo='cliente' inner JOIN carro on carro.id = locacao.idCarro";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<td>" . $row['nome_Pessoa'] . "</td>";
                                    echo "<td>" . $row['cpf'] . "</td>";
                                    echo "<td>" . $row['nome'] . " | " . $row['modelo'] . "</td>";
                                    echo "<td>" . $row['placa'] . "</td>";
                                    echo "<td>" . $row['dataLocacao'] . "</td>";
                                    echo "<td>" . $row['dataDevolucao'] . "</td>";
                                    echo "<td>" . $row['km'] . "</td>";
                                    echo "<td>" . $row['situacao'] . "</td>";
                                    //criado compo para ediçao para para a tela de cadastro passadno as informaçoes da locação selecionada na lista
                                    echo "<td><a href='CadastroLocacao.php?idLocEdit=" . $row['id_Locacao'] . "'><i class= material-icons prefix>edit</i></a> </td>";

                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> 

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
    </body>
</html>
