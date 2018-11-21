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
            <a class="waves-effect waves-light btn">Editar</a>
            <br><br>
            <div class="row">
                <div class="col s12">
                    <table  class="bordered" class="responsive-table">
                        <thead>
                            <tr>
                                <th>Nome Cliente</th>
                                <th>CPF cliente</th>
                                <th>Carro</th>
                                <th>Data de Locacao</th>
                                <th>Data de Devolucao</th>
                                <th>Km Inicial</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT * FROM locacao INNER JOIN pessoa on locacao.id_fk_Cliente = pessoa.id and pessoa.tipo = 'cliente' "
                                    . "INNER JOIN carro on carro.id = '1'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr data-id=" . $row['idlocacao'] . " class='tabelaLocacao'>";
                                    echo "<td>" . $row['nomePessoa'] . "</td>";
                                    echo "<td>" . $row['cpf'] . "</td>";
                                    echo "<td>" . $row['nome'] . " | " . $row['modelo'] . "</td>";
                                    echo "<td>" . $row['dataLocacao'] . "</td>";
                                    echo "<td>" . $row['dataDevolucao'] . "</td>";
                                    echo "<td>" . $row['kmInicial'] . "</td>";

                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> 


        <br><br><br><br><br><br><br><br>




        <div style="visibility: hidden" class="container" id="insercao">
            <div class="section">
                <div class="row">
                    <form id="Formulario"  method="POST" action="acoes.php">
                        <div class="col s6 offset-s3">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="CPF_Cliente" name="CPF_Cliente" type="number" class="form validate" data-target="modalClientes">
                                    <label for="numero">CPF Cliente</label>

                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="placa" name="placa" type="text" class="form validate">
                                    <label for="placa">Placa do carro</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="dataLoc" name="dataLoc" type="date" class="datepicker form">
                                    <label for="dataLoc">Data Locação </label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="KmRetirada" name="KmRetirada" type="number" class="form validate">
                                    <label for="KmRetirada">Km na Locação</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="dataDevolucao" name="dataDevolucao" type="date" class="datepicker form">
                                    <label for="dataDevolucao">Data Devolução </label>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col s2">
                                    <div class="row">
                                        <button  id="btnSalvar" class="btn waves-effect waves-light cadastroLoc" type="submit">Salvar
                                            <i class="material-icons right"></i>                        
                                        </button>
                                        <button style="visibility: hidden" id="btnEditar" class="btn waves-effect waves-light cadastroLoc" type="submit">Editar
                                            <i class="material-icons right"></i>                        
                                        </button>
                                        <a id="btncancelar" class="waves-effect waves-light btn">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="acao" value="salvar">
                            <input type="hidden" name="tipo" value="locacao">
                            </form>
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
