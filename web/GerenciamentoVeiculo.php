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
        <?php
            $parametro = filter_input(INPUT_GET, "parametro");  
            
            if($parametro){
                $sql = "SELECT * FROM carro WHERE placa LIKE '$parametro%' ORDER BY placa";
            }else{
                $sql = "SELECT * FROM carro ORDER BY placa";
            }
            
            $dados = $conn->query($sql);
            $linha = mysqli_fetch_assoc($dados);
            $total = mysqli_num_rows($dados);
            
        ?>
        
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
            <p>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
			    <div class="input-field col s6">
                                <input type="text" name="parametro"/>
				<label for="parametro">Informe a placa do carro</label>
                                <button class="btn waves-effect waves-light" type="submit"  value="Buscar">Buscar</button>  
                                <a class="waves-effect waves-light btn" href="CadastroVeiculo.php">Novo Cadastro</a>
			    </div>          
		    </div>
                </form>
            </p>
       
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
                          <th>ATIVO</th>
                          <th>MARCA</th>
                          <th>IMAGEM</th>
                      </tr>
                      
                    </thead>

                    <tbody>
                    <?php
                        if($total){ do{
                    /*  $sql = "SELECT `carro`.`id`,`carro`.`placa`,`carro`.`nome`,`carro`.`modelo`,`carro`.`valorSeguro`,`carro`.`valorLocacao`, `carro`.`cor`,"
                                . " `carro`.`ativo`, `carro`.`marca`, `carro`.`img` FROM `carro` WHERE 1";
                        $result = $conn->query($sql);
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                echo "<tr data-id='".$row['id']."' class='linhasVei'>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['placa']."</td>";
                                    echo "<td>".$row['nome']."</td>";
                                    echo "<td>".$row['modelo']."</td>";
                                    echo "<td>".$row['valorSeguro']."</td>";
                                    echo "<td>".$row['valorLocacao']."</td>";
                                    echo "<td>".$row['cor']."</td>";
                                    echo "<td>".$row['ativo']."</td>";
                                    echo "<td>".$row['marca']."</td>";
                                    echo "<td>".$row['img']."</td>";
                                echo "</tr>";
                            }
                        } */
                    
                    ?>
                    <tr>
                        <td><?php echo $linha['id']?></td>
                        <td><?php echo $linha['placa']?></td>
                        <td><?php echo $linha['nome']?></td>
                        <td><?php echo $linha['modelo']?></td>
                        <td><?php echo $linha['valorSeguro']?></td>
                        <td><?php echo $linha['valorLocacao']?></td>
                        <td><?php echo $linha['cor']?></td>
                        <td><?php echo $linha['ativo']?></td>
                        <td><?php echo $linha['marca']?></td>
                        <td><?php echo $linha['img']?></td>
                        <td><a class="waves-effect waves-light btn" href="<?php echo "EditarVeiculo.php?id=" . $linha['id'] . "&placa=" . $linha['placa'] . "&nome=" . $linha['nome']. "&modelo=" . $linha['modelo']. "&valorSeguro=" . $linha['valorSeguro']. "&valorLocacao=" . $linha['valorLocacao']. "&cor=" . $linha['cor']. "&ativo=" . $linha['ativo']. "&marca=" . $linha['marca']. "&img=" . $linha['img']?>">Editar</a></td>
                        <td><a class="waves-effect waves-light btn" href="<?php echo "ExcluirVeiculo.php?id=" . $linha['id'] ?>">Excluir</a></td>
                    </tr>
                    <?php 
                        } while ($linha = mysqli_fetch_assoc($dados));
                        mysqli_free_result($dados);}
                    ?>
                    </tbody>
                  </table>
            
                </div>
            </div>
       </div> 
        <!--  Scripts-->
                <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
                <script src="js/materialize.min.js"></script>
                <script src="js/init.js"></script>
    </body>
</html>
