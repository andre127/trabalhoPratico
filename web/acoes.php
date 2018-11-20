<?php

include "utils.php";


$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
var_dump($_POST);

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
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $sql = "INSERT INTO pessoa(nome, rg, cpf, endereco, tipo, login, senha) VALUES ('$nome', '$rg', '$cpf', '$endereco','$tipo', '$login', '$senha')";
        $result = $conn->query($sql);
        $ultimo = mysqli_insert_id($conn);
        $sql = "INSERT INTO cliente(cnh, numeroDependentes,idPessoa) VALUES ('$cnh', '$dependente','$ultimo')";
        $result = $conn->query($sql);
        header("Location: GerenciamentoCliente.php");
        //var_dump ($ultimo);
        // var_dump ($_POST);   
    }



    if ($tipo == "veiculo") {
        $placa = $_POST['placa'];
        $nome = $_POST['nome'];
        $modelo = $_POST['modelo'];
        $valorSeguro = $_POST['valorSeguro'];
        $valorLocacao = $_POST['valorLocacao'];
        $cor = $_POST['cor'];
        $ativo = $_POST['ativo'];
        $marca = $_POST['marca'];
        $img = $_POST['img'];

        $sql = "INSERT INTO carro(placa, nome, modelo, valorSeguro, valorLocacao, cor, ativo, marca, img) VALUES "
                . "('$placa', '$nome', '$modelo', '$valorSeguro', '$valorLocacao', '$cor', '$ativo', '$marca', '$img')";
        $result = $conn->query($sql);
        header("Location: GerenciamentoVeiculo.php");
    }
    if ($tipo == "locacao") {
        $CPF_Cliente = $_POST['CPF_Cliente'];
        $placa = $_POST['placa'];
        $dataLocacao = $_POST['dataLoc'];
        $KmRetirada = $_POST['KmRetirada'];
        $dataDevolucao = $_POST['dataDevolucao'];
        $sql = "SELECT * FROM pessoa WHERE cpf = '$CPF_Cliente' AND tipo = 'cliente'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "INSERT INTO `locacao`(`dataLocacao`, `dataDevolucao`, `kmInicial`, `idCliente`, `idFuncionario`, `kmFinal`) "
                        . "VALUES ('$dataLocacao','$dataDevolucao','$KmRetirada'," . $row['id'] . ",'0','0')";
            }
            $result = $conn->query($sql);
//            header("Location: CadastroLocacao.php");
        } else {

//            header("Location: index.php");
        }
    }
}

