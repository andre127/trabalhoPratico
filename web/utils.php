<?php
/**
 * Created by PhpStorm.
 * User: Andre Luiz
 * Date: 11/11/2018
 * Time: 16:13
 */

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "locadora";

//Criar a conexão com o Banco de Dados
$conn = new mysqli($servername,$username,$password,$db_name);
//Checar se a conexão foi aberta
if($conn->connect_error){
    die("Falha na Conexão: ".$conn->connect_error);
}


