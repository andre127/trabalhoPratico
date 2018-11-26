<?php

session_start();
include "utils.php";
//var_dump($_POST);
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_SPECIAL_CHARS);// usado para identificar a acão a ser feita 
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);//usado para identificar o tipo 
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS); // usado para identificar se o cliente existe 
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_SPECIAL_CHARS);// usado para identificar a tela anterior

// Função não habilitada pois em caso de exclusão do cliente pedesse o historico de locação
if ($acao == "excluir") {
    if ($tipo == "cliente") {
        $sql = "DELETE FROM `cliente` WHERE `idPessoa`=" . $id;
        $result = $conn->query($sql);
        $sql = "DELETE FROM `pessoa` WHERE `id`=" . $id;
        $result = $conn->query($sql);
    }
}
// salva e edita cliente
if ($acao == "salvar") {
    if ($tipo == "cliente") {  
        $nome = $_POST['nomeCliente'];
        $endereco = $_POST['enderecoCliente'];
        $rg = $_POST['rgCliente'];
        $cpf = $_POST['cpfCliente'];
        $cnh = $_POST['cnhCliente'];
        $dependente = $_POST['dependenteCliente'];
        $login = $_POST['loginCliente'];
        $senha = $_POST['senhaCliente'];
        if ($id == "novo") { //insert de um novo cliente 
            $sql = "INSERT INTO pessoa(nome_Pessoa, rg, cpf, endereco, tipo, login, senha) VALUES ('$nome', '$rg', '$cpf', '$endereco','$tipo', '$login', '$senha')";
            $result = $conn->query($sql);
            $ultimo = mysqli_insert_id($conn); // retorna o o ultimo id inserido 
            $sql = "INSERT INTO cliente(cnh, numeroDependentes,idPessoa) VALUES ('$cnh', '$dependente','$ultimo')";
            $result = $conn->query($sql);
            if($url=="http://localhost/trabalhoPratico/web/login.php"){ // caso a tela anterior seja a de login 
                header("Location: login.php");
            }else{ // caso a tela anterior seja GerenciamentoCliente 
                header("Location: GerenciamentoCliente.php");
            }
        } else { // update do Cliente 
            //var_dump($_POST);
            $sql = "UPDATE `pessoa` SET `nome_Pessoa`='$nome',`rg`='$rg',`cpf`='$cpf',`endereco`='$endereco',`tipo`='$tipo',`login`='$login',`senha`='$senha' WHERE `id_Pessoa`= '$id'";
            $result = $conn->query($sql);

            $sql = "UPDATE `cliente` SET `cnh`='$cnh',`numeroDependentes`='$dependente' WHERE `idPessoa`='$id'";
            $result = $conn->query($sql);
            header("Location: GerenciamentoCliente.php");
        }
         
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
//recebida da tela de cadastro de locação verica se e uma edição de locação
if ($acao == "salvarLocacao") {
    $CPF_Cliente = $_POST['CPF_Cliente'];
    $placa = $_POST['placa'];
    $dataLocacao = $_POST['dataLoc'];
    $Km = $_POST['Km'];
    $dataDevolucao = $_POST['dataDevolucao'];
    //verifica se o cpf do cliente digitado corresponde a um cliente cadastrado
    $result = $conn->query("SELECT * FROM `pessoa` INNER JOIN cliente on cpf='" . $CPF_Cliente . "' and cliente.idPessoa=pessoa.id_Pessoa");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //se existir um cliente com tal cpf e armazenado o id desse cliente
            $idCliente = $row['id_Cliente'];
        }
    }
    //verifica se a placa do carro digitado corresponde a um carro cadastrado
    $result = $conn->query("SELECT * FROM `carro` WHERE placa='" . $placa . "' ");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //se existir um carro com tal placa e armazenado o id desse carro 
            $idCarro = $row['id'];
        }
    }
    // caso exita o carro e o cliente
    if ($idCarro != NULL && $idCliente != NULL) {
        //comando sql para inserir os valores da locação informadas no cadstro de locações
        $sql = "INSERT INTO `locacao`( `dataLocacao`, `dataDevolucao`, `km`, `situacao`, `idCliente`,`idCarro`, `idFuncionario`)"
                . " VALUES ('$dataLocacao','$dataDevolucao','$Km','ativo','$idCliente','$idCarro','1')";
        $result = $conn->query($sql);
        // chama a listagem de locações
        header("Location: Locacao.php");
    } else {
        //casso nao exista o cliente ou o carro cham uma tela para informar que nao foi cadastrado, e informa o motivo
        header("Location: errorlocacao.php");
    }
            

}
//recebida da tela de cadastro de locação verica se e uma cadastro novo de locação
if ($acao == "editarLocacao") {
    $CPF_Cliente = $_POST['CPF_Cliente'];
    $placa = $_POST['placa'];
    $dataLocacao = $_POST['dataLoc'];
    $Km = $_POST['Km'];
    $dataDevolucao = $_POST['dataDevolucao'];
    //verifica se o cpf do cliente digitado corresponde a um cliente cadastrado
    $result = $conn->query("SELECT * FROM `pessoa` INNER JOIN cliente on cpf='" . $CPF_Cliente . "' and cliente.idPessoa=pessoa.id_Pessoa");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
             //se existir um cliente com tal cpf e armazenado o id desse cliente
            $idCliente = $row['id_Cliente'];
        }
    }
    //se existir um cliente com tal cpf e armazenado o id desse cliente
    $result = $conn->query("SELECT * FROM `carro` WHERE placa='" . $placa . "' ");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //se existir um carro com tal placa e armazenado o id desse carro
            $idCarro = $row['id'];
        }
    }
    // caso exita o carro e o cliente
    if ($idCarro != NULL && $idCliente != NULL) {
        //comando sql para atualizar os valores da locação informadas no cadstro de locações
        $sql = "INSERT INTO `locacao`( `dataLocacao`, `dataDevolucao`, `km`, `situacao`, `idCliente`,`idCarro`, `idFuncionario`)"
                . " VALUES ('$dataLocacao','$dataDevolucao','$Km','$atv','$idCliente','$idCarro','1')";
        $result = $conn->query($sql);
        // chama a listagem de locações
        header("Location: Locacao.php");
    } else {
        //casso nao exista o cliente ou o carro cham uma tela para informar que nao foi cadastrado, e informa o motivo
        header("Location: errorlocacao.php");
    }
}
//Ação utiliza atributos POST para dar um UPDATE com as novas informações do usuario
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

