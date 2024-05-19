<?php
  include '../banco.php';

  //recebendo variáveis por post
  if(isset($_POST['texto'])){
    $texto = $_POST ['texto'];
    //criando uma consulta
    $sql = "select tbavaliacao.*,tbaluno.nome as ALUNO,DATE_FORMAT(tbavaliacao.datava,'%d/%m/%Y') as datava from tbavaliacao
    join tbaluno on (tbaluno.idaluno = tbavaliacao.idaluno)
    where tbaluno.nome like '%$texto%'";
    $consulta = $conexao -> query($sql);
    if($consulta){
      if ($consulta->num_rows > 0){
        while( $linha=$consulta->fetch_array(MYSQLI_ASSOC)){
            echo' <tr>
            <td>'.$linha['idava'].'</td>
            <td>'.$linha['ALUNO'].'</td>                                    
            <td>'.$linha['datava'].'</td>
            <td>'.$linha['horaava'].'</td>
            <td>'.$linha['objetivo'].'</td> 
            <td>
                <button type="button" title="Alterar Avaliação" class="btn btn-md btn-primary" value="alterar" id="'.$linha['idava'].'"><i class="fa fa-edit"></i></button>
                <button id="'.$linha['idava'].'" title="Excluir Avaliação" class="btn btn-md btn-danger" value="deletar"> <i class="fa fa-trash"></i></button>
            </td>
          </tr>';
        }
      } else {
        echo 'vazio';
      }
    }       
  }

  if(isset($_POST['texto1'])){
    $texto = $_POST ['texto1'];
    //criando uma consulta
    $sql2 = "SELECT tbficha.idficha as idficha,tbaluno.nome as ALUNO,DATE_FORMAT(tbficha.datficha,'%d/%m/%Y') as DATFICHA,tbexercicio.nome as EXERCICIO,tbitem_ficha.serie as SERIE,tbitem_ficha.repeticoes as REPETICOES,tbitem_ficha.tipo_treino as TIPO FROM tbficha
    JOIN tbavaliacao ON (tbficha.idava = tbavaliacao.idava)
    JOIN tbitem_ficha ON (tbficha.idficha = tbitem_ficha.idficha)
    JOIN tbaluno ON (tbavaliacao.idaluno = tbaluno.idaluno)
    JOIN tbexercicio ON (tbexercicio.idexercicio = tbitem_ficha.idexercicio)
    WHERE tbaluno.nome like '%$texto%'
    GROUP BY idficha
    ";
    $consulta2 = $conexao -> query($sql2);
    if($consulta2){
      if ($consulta2->num_rows > 0){
        while( $linha2=$consulta2->fetch_array(MYSQLI_ASSOC)){
            echo' <tr>
            <td>'.$linha2['ALUNO'].'</td>
            <td>'.$linha2['DATFICHA'].'</td>                                                
            <td>
                <button id="'.$linha2['idficha'].'" title="Ver ficha" class="btn btn-md btn-info mostrar" value="ver"><i class="fa-regular fa-eye"></i> Ver ficha </button>
            </td>
          </tr>';
        }
      } else {
        echo 'vazio';
      }
    }       
  }

  if(isset($_POST['idava'])){
    $idava = $_POST['idava'];
    $sql = "SELECT * FROM tbavaliacao WHERE idava = $idava";
    $consulta = $conexao-> query($sql);
    $linha = $consulta -> fetch_array(MYSQLI_ASSOC);
    if($consulta){
      if($consulta->num_rows > 0){
        echo '<form action="javascript:func()" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" id="idModal" name="idModal" value="'.$linha['idava'].'">
        </div>
        <div class="form-group">
            <label for="email">Medida do Braço :</label>
            <input type="text" class="form-control" id="med_bracoModal" name="med_bracoModal" value="'.$linha['med_braco'].'">
        </div>
        <div class="form-group">
            <label for="email">Medida do Antebraço :</label>
            <input type="text" class="form-control" id="med_antebracoModal" name="med_antebracoModal" value="'.$linha['med_antebraco'].'">
        </div>
        <div class="form-group">
            <label for="email">Medida da Coxa :</label>
            <input type="text" class="form-control" id="med_coxaModal" name="med_coxaModal" value="'.$linha['med_coxa'].'">
        </div>
        <div class="form-group">
            <label for="email">Medida da Panturrilha :</label>
            <input type="text" class="form-control" id="med_panturrilhaModal" name="med_panturrilhaModal" value="'.$linha['med_panturrilha'].'">
        </div>
        <div class="form-group">
            <label for="email">Objetivo</label>
            <select class="form-control" id="objetivoModal" name="objetivoModal">
              <option value="EMAGRECER">EMAGRECER</option>
              <option value="HIPERTROFIA">HIPERTROFIA</option>
              <option value="PERCA DE PESO">PERCA DE PESO</option>
              <option value="DEFINICAO">DEFINIÇÃO</option>
            </select>
            
        </div>
        </form>';
      } else {
        echo "erro";
      }
    }
  }

  if(isset($_POST['idficha'])){
    $idficha = $_POST['idficha'];
    $sql3 = 'SELECT tbficha.idficha,tbaluno.nome as ALUNO,tbficha.datficha as DATFICHA,tbexercicio.nome as EXERCICIO,tbitem_ficha.serie as SERIE,tbitem_ficha.repeticoes as REPETICOES,tbitem_ficha.tipo_treino as TIPO,tbitem_ficha.iditem_ficha FROM tbficha
    JOIN tbavaliacao ON (tbficha.idava = tbavaliacao.idava)
    JOIN tbitem_ficha ON (tbficha.idficha = tbitem_ficha.idficha)
    JOIN tbaluno ON (tbavaliacao.idaluno = tbaluno.idaluno)
    JOIN tbexercicio ON (tbexercicio.idexercicio = tbitem_ficha.idexercicio)
    WHERE tbitem_ficha.idficha ="'.$idficha.'"';
    $consulta3 = $conexao->query($sql3);
    $linha3 = $consulta3->fetch_array(MYSQLI_ASSOC);
    if($consulta3){
      if($consulta3->num_rows > 0){
        while($linha3=$consulta3->fetch_array(MYSQLI_ASSOC)){
        echo '<tr>
          <td>'.$linha3['EXERCICIO'].'</td>
          <td>'.$linha3['SERIE'].'</td>
          <td>'.$linha3['REPETICOES'].'</td>
          <td>'.$linha3['TIPO'].'</td>
        </tr>';
        
      }
    }else {
      echo "erro";
    }
    }
  }
?>