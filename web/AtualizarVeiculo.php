<?php
    include "utils.php";
    
    $id = filter_input(INPUT_GET, "id");
    $placa = filter_input(INPUT_GET, "placa");
    $nome = filter_input(INPUT_GET, "nome");
    $modelo = filter_input(INPUT_GET, "modelo");
    $valorSeguro = filter_input(INPUT_GET, "valorSeguro");
    $valorLocacao = filter_input(INPUT_GET, "valorLocacao");
    $cor = filter_input(INPUT_GET, "cor");
    $ativo = filter_input(INPUT_GET, "ativo");
    $marca = filter_input(INPUT_GET, "marca");
    $img = filter_input(INPUT_GET, "img"); 
    
    if(isset($_FILES['img'])){
                $extensao = substr($_FILES['img']['name'], -4);
                $img = md5(time()) . $extensao;
                $diretorio = "img/";

                move_uploaded_file($_FILES['img']['tmp_name'], $diretorio.$img);
    } 
    
    $sql = "UPDATE carro SET placa='$placa', nome='$nome', modelo='$modelo', valorSeguro='$valorSeguro', valorLocacao='$valorLocacao', cor='$cor', ativo='$ativo', marca='$marca', img='$img' WHERE id='$id'" ;
    
    $result = $conn->query($sql);

    header("Location: GerenciamentoVeiculo.php");