<?php

include "utils.php";

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_SPECIAL_CHARS);

if ($acao == "salvar") {
        $placa = $_POST['placa'];
        $nome = $_POST['nome']; 
        $modelo = $_POST['modelo'];
        $valorSeguro = $_POST['valorSeguro'];
        $valorLocacao = $_POST['valorLocacao'];
        $cor = $_POST['cor'];
        $ativo = $_POST['ativo'];
        $marca = $_POST['marca'];
        $img = $_POST['img'];
        
        if(isset($_FILES['img'])){
            $extensao = substr($_FILES['img']['name'], -4);
            $img = md5(time()) . $extensao;
            $diretorio = "img/";
            
            move_uploaded_file($_FILES['img']['tmp_name'], $diretorio.$img);
        } 
        
        $sql = "INSERT INTO carro(placa, nome, modelo, valorSeguro, valorLocacao, cor, ativo, marca, img) VALUES "
                . "('$placa', '$nome', '$modelo', '$valorSeguro', '$valorLocacao', '$cor', '$ativo', '$marca', '$img')";
        $result = $conn->query($sql);
        header("Location: GerenciamentoVeiculo.php");
    }