<?php
    include '../banco.php';

    $idava = $_POST['idava'];

    $sql = "DELETE FROM tbavaliacao where idava = '$idava'";

    $delete = $conexao->query($sql);

    if($delete){
        echo 'sucesso';
    }else{
        echo 'erro';
    }
?>