<?php
session_start();
include "utils.php";
   if(!empty($_GET["id"])){
   $id= $_GET["id"];
   $sql = "SELECT * FROM carro WHERE id='$id'";
   $result = $conn->query($sql);
   $row1 = $result->fetch_assoc();
   
   $valid=$row1['id'];
   } else {
     $valid='novo';
}
?>

<html lang="en">
    <head>
        <meta http-equiv=Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Locacao</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="shortcut icon" type="image/ico" href="form.ico"/>
    </head>
    <body>
        <?php
        //Verifica se caso clicou para editar locação
        if (!empty($_GET['idLocEdit'])) {
            $idlocedit= $_GET['idLocEdit'];
            $sql = "SELECT * FROM locacao INNER JOIN pessoa INNER JOIN carro INNER JOIN cliente on locacao.idCliente = cliente.id_Cliente"
                    . " AND cliente.idPessoa = pessoa.id_Pessoa and pessoa.tipo = 'cliente' and locacao.id_Locacao ='".$idlocedit."' and carro.id = locacao.idCarro";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $acao = "editarLocacao";//passa por post para ser reconhecida a ação de editar la na tela acao.php
            
        } else {
            $acao = "salvarLocacao";//caso nao for de clicar passa por post para ser reconhecida a ação de salvar la na tela acao.php
            
        }
        ?>
        <div class="container">
            <div class="section">
                <div class="row">
                    <form id="Formulario"  method="POST" action="acoes.php">
                        <div class="col s6 offset-s3">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i><!--Adicionando icones nos formulario-->
<!--                                    para casso receba editar la em cima os campos da locação escolhida para ediar reeba os valores ja cadastrados para edição-->
                                    <input id="CPF_Cliente" name="CPF_Cliente" type="number" class="form validate" required="required" data-target="modalClientes" value="<?php if ($acao=='editarLocacao'){echo $row['cpf'];}else{if(!empty($_SESSION['cpf'])){echo $_SESSION['cpf'];}}?>">
                                    <label for="numero">CPF Cliente</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">directions_car</i><!--Adicionando icones nos formulario-->
                                    <!--para casso receba editar la em cima os campos da locação escolhida para ediar reeba os valores ja cadastrados para edição-->
                                    <input id="placa" name="placa" type="text" class="form validate"  required="required" value="<?php if ($acao=='editarLocacao'){echo $row['placa'];}else{if(!empty($row1['placa']))echo $row1['placa'] ;}?>">
                                    <label for="placa">Placa do carro</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">date_range</i><!--Adicionando icones nos formulario-->
                                    <!--para casso receba editar la em cima os campos da locação escolhida para ediar reeba os valores ja cadastrados para edição-->
                                    <input id="dataLoc" name="dataLoc" type="date" class="datepicker form"  required="required" value="<?php if (!empty($row['id_Locacao'])) echo $row['dataLocacao'] ?>">
                                    <label for="dataLoc">Data Locação </label>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i><!--Adicionando icones nos formulario-->
                                        <!--para casso receba editar la em cima os campos da locação escolhida para ediar reeba os valores ja cadastrados para edição-->
                                        <input id="dataDevolucao" name="dataDevolucao" type="date" class="datepicker form"  required="required" value="<?php if (!empty($row['id_Locacao'])) echo $row['dataDevolucao'] ?>">
                                        <label for="dataDevolucao">Data Devolução </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">compare_arrows</i><!--Adicionando icones nos formulario-->
                                        <!--para casso receba editar la em cima os campos da locação escolhida para ediar reeba os valores ja cadastrados para edição-->
                                        <input id="Km" name="Km" type="number" class="form validate"  required="required" value="<?php if (!empty($row['id_Locacao'])) echo $row['km'] ?>">
                                        <label for="Km">Km</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">check</i><!--Adicionando icones nos formulario-->
                                        <!--para casso receba editar la em cima os campos da locação escolhida para ediar reeba os valores ja cadastrados para edição-->
                                        <input id="situacao" name="situacao" type="text" class="form validate"  required="required" value="<?php if (!empty($row['id_Locacao'])) echo $row['situacao'] ?>">
                                        <label for="situacao">situacao (ativo or inativo)</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div align="center">
                                <!--Adicionando o values do botao para dar submit de acordo com o escolhido em salvar ou editar-->
                                <button id="confirmar" name = "acao" value ="<?php echo $acao ?>"class="btn waves-effect waves-light cadastroLoc" type="submit">Salvar
                                    <i class="material-icons right"></i>                        
                                </button>


                            </div>
                    </form>
                </div>
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
