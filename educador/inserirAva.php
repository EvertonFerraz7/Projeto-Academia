<?php
    include '../banco.php';

    $idaluno = $_POST['aluno'];
    $ideducador = $_POST['educador'];
    $dataAva = $_POST['dataAva'];
    $horaAva = $_POST['horaAva'];
    $med_braco = $_POST['medBraco'];
    $med_antebraco = $_POST['medAntebraco'];
    $med_coxa = $_POST['medCoxa'];
    $med_panturrilha = $_POST['medPanturrilha'];
    $med_peso = $_POST['medPeso'];
    $objetivo = $_POST['objetivo'];

    $sql = "insert into tbavaliacao values (null,'$idaluno','$ideducador',null,'$dataAva','$horaAva','$med_braco','$med_antebraco','$med_coxa','$med_panturrilha','$med_peso','$objetivo')";

    $inserir = $conexao->query($sql);

    if($inserir){
        header ('Location: buscaava.php?inserir=sucesso');
    }else{
        header ('Location: addavaliacao.php?inserir=erro');
    }

?>