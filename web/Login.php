<!--PAGINA UTILIZADA PARA REALIZAR LOGIN NA PLATAFORMA -->
<?php
include "utils.php";
session_start();
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
        <nav class ="color-navbar-footer" role="navigation">
            <div><a id="logo-container" href="#" class="brand-logo"><img src="img/logoEscritoNavbar.png" width="80%" height="80%"></a>
            <ul class="right hide-on-med-and-down">
                    <li><a href="CadastroCliente.php">Registrar-se</a></li>
                </ul>
            </div>

        </nav>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container center">
                <img src="img/logoRender.png" style="width:50%;  height:50%" class="header center orange-text">
            </div>
        </div>
        <div class="container">
            <form method= "post" action ="sessionStart.php" class="col s12" id="formLogin" name="formLogin">
                <div class = "row">
                    <div class="col s4 offset-s4">
                        <input name="login" type="text" class="form-control" id="login" placeholder="Login" required>
                    </div>
                </div> 
                <div class="row">
                    <div class="col s4 offset-s4">
                        <input name="senha" type="password" class="form-control" id="senha" placeholder="Password" required>

                    </div>

                </div>
                <div class="row">
                    <div class="col s4 offset-s4">
                        <a href="lostPassword">Esqueceu sua senha?</a>
                    </div>
                </div> 
                
                <!-- botoes-->
                <div class ="row" align="center"><!-- Passando as informações de login e senha via POST-->
                    <input id ="btn_login" type="submit" value="Entrar" class="light-blue darken-4 btn"/>
                </div>
            </form>
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
