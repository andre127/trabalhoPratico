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
        <nav class ="color-navbar-footer" role="navigation"">
            <div><a id="logo-container" href="#" class="brand-logo"><img src="img/logoEscritoNavbar.png" width="80%" height="80%"></a>
                <ul class="right hide-on-med-and-down">
                    <li class="modal-trigger" data-target="modalLogin"><a href="$">Entrar</a></li>
                    <li><a href="CadastroCliente.php">Registrar-se</a></li>
                </ul>
            </div>
        </nav>

        <!-- Slider Topo -->
        <div class="slider">
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

        <div class="section no-pad-bot" id="index-banner">
            <div class="container center">
                <br><br>
                <img src="img/logoEscrito.png" class="header center orange-text">
                <div class="row center">
                    <h5 class="header col s12 light">Texto decorativo pra encher de bla bla bla (Ainda vou editar)</h5>
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
            <ul class = "listaAnuncios">
                <a href="#>"<li class = "card-panel anuncios col s3">
                        <div class="div-img-anuncio">
                            <img class="img-anuncio" src ="img/carro1.png">
                        </div>
                        <div class ="info-anuncio">
                            <h5>R$500</h5>
                        </div>
                    </li></a>
                <a href="#>"<li class = "card-panel anuncios col s3">
                        <div class="div-img-anuncio">
                            <img class="img-anuncio" src ="img/carro1.png">
                        </div>
                        <div class ="info-anuncio">
                            <h5>R$500</h5>
                        </div>
                    </li></a>

                <a href="#>"<li class = "card-panel anuncios col s3">
                        <div class="div-img-anuncio">
                            <img class="img-anuncio" src ="img/carro1.png">
                        </div>
                        <div class ="info-anuncio">
                            <h5>R$500</h5>
                        </div>
                    </li></a>
                <a href="#>"<li class = "card-panel anuncios col s3">
                        <div class="div-img-anuncio">
                            <img class="img-anuncio" src ="img/carro1.png">
                        </div>
                        <div class ="info-anuncio">
                            <h5>R$500</h5>
                        </div>
                    </li></a>                  
                <a href="#>"<li class = "card-panel anuncios col s3">
                        <div class="div-img-anuncio">
                            <img class="img-anuncio" src ="img/carro1.png">
                        </div>
                        <div class ="info-anuncio">
                            <h5>R$500</h5>
                        </div>
                    </li></a>
                <a href="#>"<li class = "card-panel anuncios col s3">
                        <div class="div-img-anuncio">
                            <img class="img-anuncio" src ="img/carro1.png">
                        </div>
                        <div class ="info-anuncio">
                            <h5>R$500</h5>
                        </div>
                    </li></a>
                <a href="#>"<li class = "card-panel anuncios col s3">
                        <div class="div-img-anuncio">
                            <img class="img-anuncio" src ="img/carro1.png">
                        </div>
                        <div class ="info-anuncio">
                            <h5>R$500</h5>
                        </div>
                    </li></a>
                <a href="#>"<li class = "card-panel anuncios col s3">
                        <div class="div-img-anuncio">
                            <img class="img-anuncio" src ="img/carro1.png">
                        </div>
                        <div class ="info-anuncio">
                            <h5>R$500</h5>
                        </div>
                    </li></a>
            </ul>
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

        <!-- Modal Structure -->

        <!-- Modal para login -->
        <div id="modalLogin" class="modal modal-dialog modal-lg">
            <div class="modal-content">
                <div align="center">
                    <img src="img/logoRender.png" height="100%" width="100%" align="top">
                </div>
                <!-- campos-->
                <div class="row"> 
                    <form class="col s12">
                        <div class="row">
                            <div class="col s12">
                                <input name="name" type="text" class="form-control" id="login" placeholder="Login" required>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col s12">
                                <input name="name" type="text" class="form-control" id="senha" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <a href="lostPassword">Esqueceu sua senha?</a>
                            </div>
                        </div>  
                    </form>
                </div>
                <!-- botoes-->
                <div class ="row" align = "center">
                    <button class="light-blue darken-4 btn modal-trigger">Login</button>
                    <button class="light-blue darken-4 btn modal-trigger modal-close">Fechar</button>
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
