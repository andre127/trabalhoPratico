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
        <nav class="light-blue lighten-1" role="navigation">         
            <div class=""><a id="logo-container" href="#" class="brand-logo"><img src="img/logoPequeno.png"></a>
                <ul class="right hide-on-med-and-down">
                    <li class="modal-trigger" data-target="modalLogin"><a href="$">Locaçoes</a></li>
                </ul>
            </div>
        </nav>
        <br><br><br> 

        <div class="container">
            <br><br>
            <a class="waves-effect waves-light btn" href="CadastroLocacao.php">Cadastrar</a>
            <a class="waves-effect waves-light btn">Editar</a>
            <br><br>
            <div class="row">
                <div class="col s12">
                    <table  class="bordered" class="responsive-table">
                        <thead>
                            <tr>
                                <th>Data de Locacao</th>
                                <th>Data de Devolucao</th>
                                <th>Km Inicial</th>
                                <th>Nome Cliente</th>
                                <th>CPF cliente</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT * FROM locacao INNER JOIN pessoa WHERE locacao.idCliente = pessoa.id AND tipo = 'cliente'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr data-id=".$row['nome']." class='tabelaLocacao'>";
                                    echo "<td>" . $row['dataLocacao'] . "</td>";
                                    echo "<td>" . $row['dataDevolucao'] . "</td>";
                                    echo "<td>" . $row['kmInicial'] . "</td>";
                                    echo "<td>" . $row['nome'] . "</td>";
                                    echo "<td>" . $row['cpf'] . "</td>";
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
        
        
        
        
        
        
        
<!--        <div class="container" id="insersao">
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
                                        <button  class="btn waves-effect waves-light cadastroLoc" type="submit">Salvar
                                            <i class="material-icons right"></i>                        
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="acao" value="salvar">
                            <input type="hidden" name="tipo" value="locacao">
                            </form>
                        </div>
                </div>
            </div>







          Scripts
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
    </body>-->
</html>
