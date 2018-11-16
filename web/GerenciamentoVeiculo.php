<?php
   include "utils.php";
?>
<html>
    <head>
         <title>Gerenciamento de Veiculo</title>
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
                    <li class="modal-trigger" data-target="modalLogin"><a href="$">Gerenciamento de Veiculo</a></li>
                </ul>
            </div>
        </nav>
        <br><br><br> 
        
        <div class="container">
            <br><br>
            <a class="waves-effect waves-light btn" href="CadastroVeiculo.php">Cadastrar</a>
            <br><br>
            <div class="row">
                <div class="col s12">
                <table  class="bordered" class="responsive-table">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>PLACA</th>
                          <th>NOME</th>
                          <th>MODELO</th>
                          <th>VALORSEGURO</th>
                          <th>VALORLOCACAO</th>  
                          <th>COR</th>
                          <!--<th>VALORLOCACAO</th>    
                          <th>VALORLOCACAO</th> -->      
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                        $sql = "SELECT `carro`.`id`,`carro`.`placa`,`carro`.`nome`,`carro`.`modelo`,`carro`.`valorSeguro`,`carro`.`valorLocacao`, `carro`.`cor` FROM `carro` WHERE 1";
                        $result = $conn->query($sql);
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                echo "<tr data-id='".$row['id']."' class='linhas'>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['placa']."</td>";
                                echo "<td>".$row['nome']."</td>";
                                echo "<td>".$row['modelo']."</td>";
                                echo "<td>".$row['valorSeguro']."</td>";
                                echo "<td>".$row['valorLocacao']."</td>";
                                echo "<td>".$row['cor']."</td>";
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
