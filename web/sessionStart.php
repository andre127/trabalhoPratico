<?php
session_start();
$entrou;
$login = $_POST['login'];
$senha = $_POST['senha'];
include "utils.php";

$sql = "SELECT * FROM pessoa WHERE login = '$login' AND senha = '$senha'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $entrou = true;
    header('location:index.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $entrou = false;
}
?>
