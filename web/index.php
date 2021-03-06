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
        <!-- NavBar personalizada de acordo com usuario -->
        <?php
            if ($_SESSION['tipo'] == 'cliente'){
                echo "<nav class ='color-navbar-footer' role='navigation' style='z-index: 1'>
                            <div><a id='logo-container' href='#' class='brand-logo'><img src='img/logoEscritoNavbar.png' width='80%' height='80%'></a>
                                <ul class='right hide-on-med-and-down'>
                                    <li><a href='EditarPerfilCliente.php'>".$_SESSION["nome"]."</a></li>
                                    <li><a href='finalizarSession.php'>Sair</a></li> 
                                </ul>
                            </div>
                        </nav>";
            }else{
                echo "<nav class ='color-navbar-footer' role='navigation' style='z-index: 1'>
                            <div><a id='logo-container' href='#' class='brand-logo'><img src='img/logoEscritoNavbar.png' width='80%' height='80%'></a>
                                <ul class='right hide-on-med-and-down'>
                                    <li><a href='#'>".$_SESSION["nome"]."</a></li>
                                    <li><a href='GerenciamentoLocadora.php'>Painel de controle</a></li>
                                    <li><a href='finalizarSession.php'>Sair</a></li> 
                                </ul>
                            </div>
                        </nav>";                
            }
        ?>
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
                    <img src="img/impala.jpg">
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
                    <h5 align="justify" class="header col s12 light">	Lorem ipsum curabitur rutrum elit vehicula, curabitur placerat netus class duis sem, placerat nibh posuere nisi. eleifend varius ligula integer netus metus porta morbi nullam justo litora rutrum blandit, platea neque semper mauris mattis bibendum vel libero imperdiet blandit. bibendum quisque orci metus primis quisque etiam odio pretium enim habitasse duis</h5>
                </div>
                <br><br>

            </div>
        </div>

        <!-- Anuncios -->
        <div class="row center">
        <?php
        $sql = "SELECT * FROM carro WHERE 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) { // Abaixo esta sendo descrita uma lista de carros presente no banco, ja puxando imagens e informações relevantes ao usuario
            while ($row = $result->fetch_assoc()) {
                echo "<ul data-id='" . $row['id'] . "'class = 'listaAnuncios'>";
                echo "<a href='CadastroLocacao.php?id=".$row['id']."'><li class = 'card-panel anuncios col s2'>" .
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
