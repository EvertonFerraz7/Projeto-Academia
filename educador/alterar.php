<?php
    include '../banco.php';

    $id = $_POST['idava'];
    $med_braco = $_POST['med_braco'];
    $med_antebraco = $_POST['med_antebraco'];
    $med_coxa = $_POST['med_coxa'];
    $med_panturrilha = $_POST['med_panturrilha'];
    $med_peso = $_POST['med_peso'];
    $objetivo = $_POST['objetivo'];


    $sql = "update tbavaliacao set med_braco='$med_braco', med_antebraco='$med_antebraco', med_coxa='$med_coxa', med_panturrilha='$med_panturrilha', med_peso='$med_peso', objetivo='$objetivo'
    where idava='$id'";

    $alterar = $conexao->query($sql);

    if($alterar){
        echo 'sucesso';
    }else{
        echo 'erro';
    }
?>