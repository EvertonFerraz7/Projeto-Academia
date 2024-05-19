<?php
    include_once '../../banco.php';
    session_start();
    $sqlava = "SELECT MAX(idava) AS idavaliacao, MAX(datava) AS dataava FROM tbavaliacao WHERE idaluno = ".$_SESSION['aluno'];

    $consultaava = $conexao -> query($sqlava);
    $linhaava = $consultaava -> fetch_array(MYSQLI_ASSOC);
    $_SESSION['idava'] = $linhaava['idavaliacao'];

    //Pegando o id da tabela de ficha
    $sqlficha = "SELECT idficha AS idficha FROM tbficha WHERE idava = ".$linhaava['idavaliacao'];

    $consultaficha = $conexao -> query($sqlficha);
    $linhaficha = $consultaficha -> fetch_array(MYSQLI_ASSOC);

    $sql = "SELECT tbexercicio.nome AS exercicio, tbitem_ficha.* 
    FROM tbitem_ficha
    INNER JOIN tbexercicio ON(tbexercicio.idexercicio = tbitem_ficha.idexercicio)
    WHERE tbitem_ficha.idficha = ".$linhaficha['idficha'];
    
    $consulta = $conexao -> query($sql);
    
    if($consulta){
      if($consulta -> num_rows > 0){
        while($linha = $consulta -> fetch_array(MYSQLI_ASSOC)){
            echo '<tr>
                    <td>'.$linha['exercicio'].'</td>
                    <td>'.$linha['serie'].'</td>
                    <td>'.$linha['repeticoes'].'</td>
                    <td>'.$linha['tipo_treino'].'</td>
                    <td><button class="btn btn-info" id="ver" value="'.$linha['exercicio'].'"><i class="fa-regular fa-eye"></i></button></td>
                </tr>';
        }
      }
    }
?>