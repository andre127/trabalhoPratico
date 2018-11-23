<?php
include "utils.php";
session_start();

if (!isset($_SESSION["entrou"]) || $_SESSION["entrou"] != TRUE) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>LocaPlus</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <?php
        echo "<nav class ='color-navbar-footer' role='navigation' style='z-index: 1'>
            <div><a id='logo-container' href='#' class='brand-logo'><img src='img/logoEscritoNavbar.png' width='80%' height='80%'></a>
                <ul class='right hide-on-med-and-down'>
                    <li><a href='#'>".$_SESSION["nome"]."</a></li>
                </ul>
            </div>
        </nav>"; 
        ?>
        <br><br><br>
        <div class="container">
            <div class="section">
                <div class="row">
                    <form id="Formulario" method="POST" action="acoes.php" id="teste" >
                        <div class="col s6 offset-s3">                       
                            <div class="row">
                                <div class="input-field col s12">    
                                    <input type="hidden" id="id_Pessoa" name="id_Pessoa" value="<?php echo $_SESSION['id_pessoa'];?>">
                                    <input type="hidden" id="id_Cliente" name="id_Cliente"value="<?php echo $_SESSION['id_cliente'];?>">
                                    <input id="nome" name="nome" type="text" class="form validate" value="<?php echo $_SESSION['nome'];?>">
                                    <label for="nome">Digite seu Nome</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="endereco" type="text" name="endereco" class="form validate" value="<?php echo $_SESSION['endereco'];?>">
                                    <label for="nome">Digite seu Endereço</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="rg"  type="text" name="rg" class="form validate" value="<?php echo $_SESSION['rg'];?>">
                                    <label for="nome">Digite seu RG</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="cpf" type="text" name="cpf" class="form validate" value="<?php echo $_SESSION['cpf'];?>">
                                    <label for="nome">Digite seu CPF</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="login" type="text" name="login" class="form validate" value="<?php echo $_SESSION['login'];?>">
                                    <label for="nome">Digite seu login</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="senha" type="text" name="senha" class="form validate" value="<?php echo $_SESSION['senha'];?>">
                                    <label for="nome">Digite sua senha</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="tipo" type="text" name="tipo" class="form validate" value="<?php echo $_SESSION['tipo'];?>">
                                    <label for="nome">Insira o tipo</label>
                                </div>          
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="cnh" type="text" name="cnh" class="form validate" value="<?php echo $_SESSION['cnh'];?>">
                                    <label for="nome">Digite sua CNH</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="dependente" type="text" name="dependente" class="form validate" value="<?php echo $_SESSION['dependentes'];?>">
                                    <label for="nome">Digite o numero de Dependentes </label>
                                </div>                              
                            </div>
                            <div class="row">
                                <button  id="btnEditarCliente" class="btn waves-effect waves-light" type="submit">Salvar</button>
                            </div>
                        </div>
                        <input type="hidden" name="acao" value="editarPerfilCliente">
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="page-footer color-navbar-footer">
            <div class="container">
                    <div class="col l6 s12">
                        <h5 class="white-text">Grupo 06</h5>
                        <p class="grey-text text-lighten-4"><i class=" tiny material-icons">copyright</i>André Luiz; Abner Rodrigues; Diego Chiavelli; Junes Anderson; Leonardo Maciel.</p>
                    </div>
            </div>
        </footer>



    </div>
</div>


<!--  Scripts-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>

