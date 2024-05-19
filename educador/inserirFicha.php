<?php
    include '../banco.php';

    $aluno = $_POST['aluno'];
    $dataficha = $_POST['dataficha'];
    $exercicio = explode(",",implode(",",$_POST['exercicio']));
    $series = explode(",",implode(",",$_POST['series']));
    $repeticoes = explode(",",implode(",",$_POST['repeticoes']));
    $tipo_treino = explode(",",implode(",",$_POST['tipo_treino']));
    $consulta = $conexao->query('SELECT idava as IDAVA from tbavaliacao WHERE idaluno = "'.$aluno.'"');
    $linha = $consulta->fetch_array(MYSQLI_ASSOC);
    $INSERT = $conexao->query('INSERT INTO tbficha values (null,"'.$linha['IDAVA'].'","'.$dataficha.'")');
    $busca = $conexao->query("SELECT MAX(idficha) as MAXFICHA from tbficha");
    $row = $busca->fetch_array(MYSQLI_ASSOC);

    for ($cont=0; $cont <= count($exercicio); $cont++){
        $inserir = $conexao->query('INSERT INTO tbitem_ficha VALUES (null,"'.$row['MAXFICHA'].'","'.$exercicio[$cont].'","'.$series[$cont].'","'.$repeticoes[$cont].'","'.$tipo_treino[$cont].'")');
    }
    

        header ('Location: buscafichas.php?inserir=sucesso');
?>