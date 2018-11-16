<?php

/**
 * Created by PhpStorm.
 * User: Andre Luiz 
 * Date: 11/11/2018
 * Time: 16:00
 */
include "utils.php";


$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

if ($acao == "excluir") {
    if ($tipo == "cliente") {
        $sql = "DELETE FROM `cliente` WHERE `idPessoa`=" . $id;
        $result = $conn->query($sql);
        $sql = "DELETE FROM `pessoa` WHERE `id`=" . $id;
        $result = $conn->query($sql);
    }
}

if ($acao == "salvar") {
    if ($tipo == "cliente") {
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $cnh = $_POST['cnh'];
        $dependente = $_POST['dependente'];

        $sql = "INSERT INTO pessoa(nome, rg, cpf, endereco) VALUES ('$nome', '$rg', '$cpf', '$endereco')";
        $result = $conn->query($sql);
        $id = mysqli_insert_id($conn);
        $sql = "INSERT INTO cliente(cnh, numeroDependentes,idPessoa) VALUES ('$cnh', '$dependente','$id')";
        $result = $conn->query($sql);
        header("Location: GerenciamentoCliente.php");
    }
}

        