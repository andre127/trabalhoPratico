<?php
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
include "utils.php";

$sql = "SELECT * FROM pessoa WHERE login = '$login' AND senha = '$senha'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['entrou'] = true;
    while ($row = $result->fetch_assoc()){
       $_SESSION['id'] = $row['id'];
       $_SESSION['tipo'] = $row['tipo'];
       $_SESSION['nome'] = $row['nome'];
       $_SESSION['rg'] = $row['rg'];
       $_SESSION['cpf'] = $row['cpf'];
       $_SESSION['endereco'] = $row['endereco'];
    }
    $sql = "SELECT * FROM `cliente` WHERE idPessoa = '".$_SESSION['id']."'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
       $_SESSION['cnh'] = $row['cnh'];
       $_SESSION['dependentes'] = $row['numeroDependentes'];
    }
    header('location:index.php');
    
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $_SESSION['entrou'] = false;
    header('location:login.php');
}
?>
