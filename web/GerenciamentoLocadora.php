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
        <!-- SideNav -->
        <ul id="slide-out" class="sidenav">
            <!-- informações usuarios -->
            <li><div class="user-view">
                    <div class="background">
                        <img src="img/logoEscrito.png">
                    </div>
                    <br>
                    <a href="#name"><span class="name"><?php echo $_SESSION['nome'] ?></span></a>
                    <a href="#email"><span class="email"><?php echo $_SESSION['login'] ?></span></a>
                </div>
            </li>
            <!-- Menu suspenso -->
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href = "GerenciamentoVeiculo.php"class="collapsible-header">Veiculos<i class="material-icons">directions_car</i></a>
                    <div class="collapsible-body">
                    </div>
                </li>
            </ul>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href = "GerenciamentoCliente.php"class="collapsible-header">Clientes<i class="material-icons">people</i></a>
                    <div class="collapsible-body">
                    </div>
                </li>
            </ul>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header">Funcionarios<i class="material-icons">account_box</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="CadastroFuncionario.php">Cadastrar Funcionario</a></li>
                            <li><a href="#!">Editar Funcionario</a></li>
                            <li><a href="#!">Lista Funcionarios</a></li>
                        </ul>
                    </div>
                </li>
            </ul>              
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header">Locações<i class="material-icons">assignment</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="GerenciarLocacoes.php">Reservar Locação</a></li>
                            <li><a href="#!">Alterar Locação</a></li>
                            <li><a href="#!">Cancelar Locação</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </ul>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>



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

