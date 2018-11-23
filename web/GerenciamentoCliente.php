<?php
   include "utils.php";
 
?>
<html>
    <head>
         <title>Gerenciamento de Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        
        <!-- CSS  -->
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
              <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation" style="z-index: 1">         
            <div class=""><a id="logo-container" href="#" class="brand-logo"><img src="img/logoPequeno.png"></a>
                <ul class="right hide-on-med-and-down">
                    <li><a>Gerenciamento de Cliente</a></li>
                </ul>
            </div>
        </nav>
        <br><br><br> 
        
        <div class="container">
            <br><br>
            <a class="waves-effect waves-light btn" href="CadastroCliente.php">Cadastrar</a>
            <br><br>
            <div class="row">
                <div class="col s12">
                <table  class="bordered striped "class="responsive-table">
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

                    <tbody>
                    <?php
                        $sql = "SELECT `pessoa`.`id`,`pessoa`.`nome`,`pessoa`.`rg`,`pessoa`.`cpf`,`pessoa`.`endereco`,`cliente`.`cnh` FROM `pessoa` INNER JOIN `cliente` ON `pessoa`.`id`=`cliente`.`idPessoa`";
                        $result = $conn->query($sql);

                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){ 
                               echo "</tr>";
                                  echo "<td ><a href='CadastroCliente.php?id=".$row['id']."'>".$row['id']."</a></td>";
                                  echo "<td ><a href='CadastroCliente.php?id=".$row['id']."'>".$row['nome']."</a></td>";
                                  echo "<td ><a href='CadastroCliente.php?id=".$row['id']."'>".$row['rg']."</a></td>";
                                  echo "<td ><a href='CadastroCliente.php?id=".$row['id']."'>".$row['cpf']."</a></td>";
                                  echo "<td ><a href='CadastroCliente.php?id=".$row['id']."'>".$row['cnh']."</a></td>";
                                  echo "<td ><a href='CadastroCliente.php?id=".$row['id']."'>".$row['endereco']."</a></td>";
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
                <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
                <script src="js/materialize.js"></script>
                <script src="js/init.js"></script>
    </body>
</html>
