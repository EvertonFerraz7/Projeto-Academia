<?php

$idaluno = $_GET['idaluno'];

include '../../banco.php';

$sql = "delete from tbaluno where idaluno = $idaluno";

$delete = $conexao->query($sql);

if($delete == true){
    echo('sucesso');
}else{
    echo('erro');
}

?>