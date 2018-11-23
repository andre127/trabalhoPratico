<?php
session_start();
include "utils.php";
var_dump($_POST);
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
         $nome = $_POST['nomeCliente'];
         $endereco = $_POST['enderecoCliente'];
         $rg = $_POST['rgCliente'];
         $cpf = $_POST['cpfCliente'];
         $cnh = $_POST['cnhCliente'];
         $dependente = $_POST['dependenteCliente'];
         $login=$_POST['loginCliente'];
         $senha=$_POST['senhaCliente'];
         if ($id == "novo"){
                $sql = "INSERT INTO pessoa(nome, rg, cpf, endereco, tipo, login, senha) VALUES ('$nome', '$rg', '$cpf', '$endereco','$tipo', '$login', '$senha')";
                $result = $conn->query($sql);
                $ultimo = mysqli_insert_id($conn);
                $sql = "INSERT INTO cliente(cnh, numeroDependentes,idPessoa) VALUES ('$cnh', '$dependente','$ultimo')";
                $result = $conn->query($sql);
                header("Location: GerenciamentoCliente.php");
                 //var_dump ($ultimo);
                 
        } else {
            var_dump ($_POST);
                $sql = "UPDATE `pessoa` SET `nome`='$nome',`rg`='$rg',`cpf`='$cpf',`endereco`='$endereco',`tipo`='$tipo',`login`='$login',`senha`='$senha' WHERE `id`= '$id'";
                $result = $conn->query($sql);
                
                $sql = "UPDATE `cliente` SET `cnh`='$cnh',`numeroDependentes`='$dependente' WHERE `idPessoa`='$id'";
                $result = $conn->query($sql);
                header("Location: GerenciamentoCliente.php");
        }
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
}


      
if ($acao == "salvarLocacao") {
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
if ($acao == "editarPerfilCliente") {
    $id_pessoa = $_POST['id_Pessoa'];
    $id_cliente = $_POST['id_Cliente'];
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $cnh = $_POST['cnh'];
    $dependente = $_POST['dependente'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "UPDATE pessoa SET nome_Pessoa='$nome',rg='$rg',cpf='$cpf',endereco='$endereco',tipo='$tipo',login='$login',senha='$senha' WHERE id_Pessoa= '$id_pessoa'";
    $result = $conn->query($sql);
    $sql = "UPDATE cliente SET cnh='$cnh',numeroDependentes='$dependente' WHERE id_Cliente='$id_cliente'";
    $result = $conn->query($sql);
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $_SESSION['entrou'] = false;
    header('location:login.php');
}