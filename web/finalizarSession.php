<!-- Arquivo utilizado exclusivamente para o botão SAIR contido na NAVBAR do arquvio index.php -->
<?php
session_start();
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $_SESSION['entrou'] = false;
    header('location:login.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

