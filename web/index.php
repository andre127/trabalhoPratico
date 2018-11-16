<?php
include "utils.php";
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
        <nav class ="color-navbar-footer" role="navigation"" style="z-index: 1">
            <div><a id="logo-container" href="#" class="brand-logo"><img src="img/logoEscritoNavbar.png" width="80%" height="80%"></a>
                <ul class="right hide-on-med-and-down">
                    <li class="modal-trigger" data-target="modalLogin"><a href="$">Entrar</a></li>
                    <li><a href="CadastroCliente.php">Registrar-se</a></li>
                </ul>
            </div>
        </nav>
        <br><br>
        <!-- Slider Topo -->
        <div class="slider" style="z-index: 0">
            <ul class="slides">
                <li>
                    <img src="img/logoRender.png" style="opacity: 1">
                    <div class="caption center-align">
                    </div>
                </li>
                <li>
                    <img src="img/hondacivic.jpg">
                    <div class="caption center-align">
                        <h3>Os melhores carros</h3>
                    </div>
                </li>
                <li>
                    <img src="img/corola2.jpg">
                    <div class="caption left-align">
                        <h3>Com os melhores preços</h3>
                    </div>
                </li>
                <li>
                    <img src="img/impala.jpg"> <!-- random image -->
                    <div class="caption right-align">
                        <h3>Nas melhores condições</h3>
                    </div>
                </li>
            </ul>
        </div>     
        <button id="teste">testes</button>
        <script>alert("<?php echo$entrou?>");</script>
        
        
        
        
        
        <div class="section no-pad-bot" id="index-banner">
            <div class="container center">
                <br><br>
                <img src="img/logoEscrito.png" class="header center orange-text">
                <div class="row center">
                    <h5 align="justify" class="header col s12 light">	Lorem ipsum curabitur rutrum elit vehicula, curabitur placerat netus class duis sem, placerat nibh posuere nisi. eleifend varius ligula integer netus metus porta morbi nullam justo litora rutrum blandit, platea neque semper mauris mattis bibendum vel libero imperdiet blandit. bibendum quisque orci metus primis quisque etiam odio pretium enim habitasse duis</h5>
                </div>
                <br><br>

            </div>
        </div>
        
        <div>
            <h3>Blablablabla</h3>
        </div>

        <!-- Anuncios -->
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">aff</i></a>
        <div class="row center">
            <?php
            $sql = "SELECT * FROM carro WHERE 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<ul data-id='" . $row['id'] . "'class = 'listaAnuncios linhas'>";
                    echo "<a href='#'><li class = 'card-panel anuncios col s3'>" .
                    "<div class='div-img-anuncio'>"
                    . "<img class='img-anuncio' src ='img/" . $row['img'] . "'>"
                    . "</div>" .
                    "<div class='info-anuncio'>" .
                    "<h4>" . $row['nome'] . "</h4>" .
                    "<h5>R$" . $row['valorLocacao'] . "</h5>" .
                    "</div>" .
                    "</li>";
                    echo "</ul></a>";
                }
            }
            ?>
        </div>

        <!-- Footer -->
        <footer class="page-footer color-navbar-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">Loren Ipmsum</p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Settings</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Connect</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Modal para login -->
        <div id="modalLogin" class="modal modal-dialog modal-lg">
            <div class="modal-content">
                <div align="center">
                    <img src="img/logoRender.png" height="100%" width="100%" align="top">
                </div>
                <!-- campos-->
                <div class="row"> 
                    <form method= "post" action ="sessionStart.php" class="col s12" id="formLogin" name="formLogin">
                        <div class="row">
                            <div class="col s12">
                                <input name="login" type="text" class="form-control" id="login" placeholder="Login" required>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col s12">
                                <input name="senha" type="text" class="form-control" id="senha" placeholder="Password" required>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col s6">
                                <a href="lostPassword">Esqueceu sua senha?</a>
                            </div>
                        </div> 
                        <!-- botoes-->
                        <div class ="row" align = "center">
                            <input id ="btn_login" type="submit" value="Entrar" class="light-blue darken-4 btn"/>
                            <button class="light-blue darken-4 btn modal-trigger modal-close">Fechar</button>
                        </div>
                    </form>
                </div>
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
