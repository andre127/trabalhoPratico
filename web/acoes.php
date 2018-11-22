<?php
include "utils.php";

 var_dump ($_POST); 
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

}
      