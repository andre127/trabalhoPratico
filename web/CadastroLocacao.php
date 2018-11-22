<?php
session_start();
include "utils.php";
   if(!empty($_GET["id"])){
   $id= $_GET["id"];
   $sql = "SELECT * FROM carro WHERE id='$id'";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   
   $valid=$row['id'];
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

        <div class="container">
            <div class="section">
                <div class="row">
                    <form id="Formulario"  method="POST" action="acoes.php">
                        <div class="col s6 offset-s3">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="CPF_Cliente" name="CPF_Cliente" type="number" class="form validate" data-target="modalClientes" value="<?php if(!empty($_SESSION['cpf']))echo $_SESSION['cpf'] ?>">
                                    <label for="numero">CPF Cliente</label>
                    
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="placa" name="placa" type="text" class="form validate" value="<?php if(!empty($row['placa']))echo $row['placa'] ?>">
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
                                        <button  name = "acao" value ="salvarLocacao"class="btn waves-effect waves-light cadastroLoc" type="submit">Salvar
                                            <i class="material-icons right"></i>                        
                                        </button>
                                    </div>
                                </div>
                            </div>
<!--                            <input type="hidden" name="acao" value="salvar">
                            <input type="hidden" name="tipo" value="locacao">-->
                            </form>
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
