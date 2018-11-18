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
    header('location:index.php');
    
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $_SESSION['entrou'] = false;
    header('location:login.php');
}
?>
