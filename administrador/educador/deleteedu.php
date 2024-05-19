<?php

$ideducador = $_POST['ideducador'];

include '../../banco.php';

$sql = "delete from tbeducador where ideducador = $ideducador";

$delete = $conexao->query($sql);

if($delete){
    echo('sucesso');
}else{
    echo('erro');
}

?>