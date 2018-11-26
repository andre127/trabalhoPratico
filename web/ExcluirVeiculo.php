<?php
    include "utils.php";
    
    $id = filter_input(INPUT_GET, "id");
    $sql = "DELETE FROM carro WHERE id='$id'";
    $result = $conn->query($sql);
    header("Location: GerenciamentoVeiculo.php");   
