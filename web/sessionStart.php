<!-- Arquivo utilizado para tratar o login do usuario -->
<!-- Ao realizar o login os codigos abaixos irão armazenar todas as informações do cliente -->
<?php
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
include "utils.php";

$sql = "SELECT * FROM pessoa WHERE login = '$login' AND senha = '$senha'"; //verificando se o login e senha do usuario existem no banco de dados
$result = $conn->query($sql);


if ($result->num_rows > 0) {//caso o login e senha existam, variaveis do tipo $_SESSION serão povoadas com as informações do usuario
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['entrou'] = true;
    while ($row = $result->fetch_assoc()){
       $_SESSION['id_pessoa'] = $row['id_Pessoa'];
       $_SESSION['tipo'] = $row['tipo'];
       $_SESSION['nome'] = $row['nome_Pessoa'];
       $_SESSION['rg'] = $row['rg'];
       $_SESSION['cpf'] = $row['cpf'];
       $_SESSION['endereco'] = $row['endereco'];
       $_SESSION['tipo'] = $row['tipo'];
       
    }
    $sql = "SELECT * FROM `cliente` WHERE idPessoa = '".$_SESSION['id_pessoa']."'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
       $_SESSION['cnh'] = $row['cnh'];
       $_SESSION['dependentes'] = $row['numeroDependentes'];
       $_SESSION['id_cliente'] = $row['id_Cliente'];
    }
    header('location:index.php');
    
} else {//caso não seja encontrado usuario e senha a pagina sera recarregada
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $_SESSION['entrou'] = false;
    header('location:login.php');
}
?>
