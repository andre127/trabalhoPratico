<?php
/**
 * Created by PhpStorm.
 * User: Andre Luiz 
 * Date: 11/11/2018
 * Time: 16:00
 */

include "utils.php";

$acao = filter_input(INPUT_POST,'acao',FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST,'tipo',FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);

if($acao=="excluir"){
    if($tipo=="funcionario"){
        $sql = "DELETE FROM `funcionario` WHERE `idPessoa`=".$id;
        $result = $conn->query($sql);
        $sql = "DELETE FROM `pessoa` WHERE `id`=".$id;
        $result = $conn->query($sql);
    }
}