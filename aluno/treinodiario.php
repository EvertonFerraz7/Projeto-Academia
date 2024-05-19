<?php
    include '../banco.php';
    session_start();

    if(isset($_POST['controle'])){
        if($_POST['controle'] == "pesquisa"){
            $sqlcontrole = "SELECT * FROM tbtreinodiario WHERE idaluno=".$_SESSION['aluno'];
            echo $sqlcontrole;
            $consultacontrole = $conexao -> query($sqlcontrole);
            $linhaconsulta = $consultacontrole -> fetch_array(MYSQLI_ASSOC);
            if($linhaconsulta['concluido'] == "N"){
                $sql = 'SELECT tbexercicio.nome AS exercicio, tbitem_ficha.* 
                FROM tbitem_ficha
                INNER JOIN tbexercicio ON(tbexercicio.idexercicio = tbitem_ficha.idexercicio)
                WHERE tbitem_ficha.idficha = "'.$_SESSION['idficha'].'" AND tbitem_ficha.tipo_treino="'.$linhaconsulta['tipo'].'"';
  
                $consulta = $conexao -> query($sql);
  
                if($consulta){
                  if($consulta -> num_rows > 0){
                    while($linha = $consulta -> fetch_array(MYSQLI_ASSOC)){
                        echo '<tr>
                                <td>'.$linha['exercicio'].'</td>
                                <td>'.$linha['serie'].'</td>
                                <td>'.$linha['repeticoes'].'</td>
                                <td>'.$linha['tipo_treino'].'</td>
                                <td>
                                  <button class="btn btn-primary btn-md" id="exercicio" value="'.$linha['exercicio'].'"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>';
                    }
                  }
                }
            } else {
                echo '<td colspan="5">Seu treino diário já foi realizado</td>';
            }
        }
        if($_POST['controle'] == "concluido"){
            $sqlcontrole = "SELECT * FROM tbtreinodiario WHERE idaluno=".$_SESSION['aluno'];

            $consultacontrole = $conexao -> query($sqlcontrole);
            $linhaconsulta = $consultacontrole -> fetch_array(MYSQLI_ASSOC);

            if($linhaconsulta['tipo'] == "A"){
                $prox = "B";
            } else if($linhaconsulta['tipo'] == "B"){
                $prox = "C";
            } else if($linhaconsulta['tipo'] == "C"){
                $prox = "D";
            } else if($linhaconsulta['tipo'] == "D"){
                $prox = "E";
            } else {
                $prox = "A";
            }
            
            $dia = date("Y-m-d");
            $sql = "UPDATE `tbtreinodiario` SET `tipo`='$prox',`concluido`='S',`data`='$dia' WHERE idaluno=".$_SESSION["aluno"];
            $update = $conexao -> query($sql);
            if($update){
                echo "sucesso";
            } else {
                echo "erro";
            }
        }
    }
?>