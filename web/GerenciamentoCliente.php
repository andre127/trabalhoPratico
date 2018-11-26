<?php
// André Luiz C. Pires 802.005
//conexão como o banco 
include "utils.php";
?>
<html>
    <head>
        <title>Gerenciamento de Cliente</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="light-blue" role="navigation" style="z-index: 1">         
            <div class=""><a id="logo-container" href="#" class="brand-logo"><img src="img/logoPequeno.png"></a>
                <a class="right hide-on-med-and-down">Gerenciamento de Cliente  </a>
            </div>
        </nav>
        <br><br><br> 
            <div class="container"> 
                <div class="row">

                    <div class="col s12" >
                        <br><br>
                        <a class="waves-effect waves-light btn" href="index.php">Home</a>
                        <a class="waves-effect waves-light btn" href="CadastroCliente.php">Cadastrar</a>
                        <br><br>
                        <!-- Tabela para listar Clientes   -->
                        <table  class="bordered striped "class="responsive-table">
                            <!-- Cabeçario da Tabela  -->
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOME</th>
                                    <th>RG</th>
                                    <th>CPF</th>
                                    <th>CNH</th>
                                    <th>ENDERECO</th>

                                </tr>
                            </thead>
                            <!-- Corpo da Tabela   -->
                            <tbody>
                                <!-- Puxa os clientes do banco  -->
                                <?php
                                $sql = "SELECT `pessoa`.`id_Pessoa`,`pessoa`.`nome_Pessoa`,`pessoa`.`rg`,`pessoa`.`cpf`,`pessoa`.`endereco`,`cliente`.`cnh` FROM `pessoa` INNER JOIN `cliente` ON `pessoa`.`id_Pessoa`=`cliente`.`idPessoa`";
                                $result = $conn->query($sql);
                                // verifica esta vazia   
                                if ($result->num_rows > 0) {
                                    // listando clientes 
                                    while ($row = $result->fetch_assoc()) {
                                        echo "</tr>";
                                        echo "<td >" . $row['id_Pessoa'] . "</td>";
                                        echo "<td >" . $row['nome_Pessoa'] . "</td>";
                                        echo "<td >" . $row['rg'] . "</td>";
                                        echo "<td >" . $row['cpf'] . "</td>";
                                        echo "<td >" . $row['cnh'] . "</td>";
                                        echo "<td >" . $row['endereco'] . "</td>";
                                        echo "<td ><a href='CadastroCliente.php?id=" . $row['id_Pessoa'] . "'><i class= material-icons prefix>edit</i></a> </td>";// link do id do Cliente com o icone
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        <!--  Scripts-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
    </body>
</html>
