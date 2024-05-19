<?php
  include '../../banco.php';
  if(isset($_POST['texto'])){
    $texto = $_POST ['texto'];
  
    //criando uma consulta
    $sql = "select * from tbaluno where nome like '%$texto%' ";
    $consulta = $conexao -> query($sql);
    
    if($consulta){
      if ($consulta->num_rows > 0){
        while(  $linha=$consulta->fetch_array(MYSQLI_ASSOC)){
          if($linha['sexo']=='M'){
            $sexo = "Masculino";
          } else {
            $sexo = "Feminino";
          }
          //coloca a data em formato brasileiro
          $data = implode("/", array_reverse(explode("-", $linha['data_nasc'])));
          echo' <tr>
                <td>'.$linha['nome'].'</td>
                <td>'.$sexo.'</td>
                <td>'.$data.'</td> 
                <td>'.$linha['bairro'].'</td>
                <td>'.$linha['rua'].'</td>
                <td>'.$linha['numero_casa'].'</td>
                <td>
                  <button title="Alterar Aluno" class="btn btn-md btn-primary" value="alterar" id="'.$linha['idaluno'].'"> <i class="fa fa-edit"></i></button>
                  <button title="Excluir Aluno" class="btn btn-md btn-danger" value="deletar" id="'.$linha['idaluno'].'"> <i class="fa fa-trash"></i></button>
                </td>
                </tr>';
        }
      }else{
        echo 'vazio';    
      }
    }
  }

  if(isset($_POST['idaluno'])){
    $idaluno = $_POST['idaluno'];
    $sql = "SELECT * FROM tbaluno WHERE idaluno = $idaluno";
    $consulta = $conexao-> query($sql);
    $linha = $consulta -> fetch_array(MYSQLI_ASSOC);
    if($linha['sexo']=='M'){
      $sexo = "Masculino";
    } else {
      $sexo = "Feminino";
    }
    if($consulta){
      if($consulta->num_rows > 0){
        echo '<form action="javascript:func()" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" id="idModal" name="idModal" value="'.$linha['idaluno'].'">
        </div>
        <div class="form-group">
          <label for="nomeModal">Nome :</label>
          <input type="text" class="form-control" id="nomeModal" name="nomeModal" value="'.$linha['nome'].'">
        </div>
        <div class="form-group">
          <label for="sexoModal">Sexo :</label>
          <input type="text" class="form-control" id="sexoModal" name="sexoModal" value="'.$sexo.'">
        </div>
        <div class="form-group">
          <label for="cpfModal">CPF :</label>
          <input type="text" class="form-control" id="cpfModal" name="cpfModal" value="'.$linha['cpf'].'">
        </div>
        <div class="form-group">
          <label for="dataModal">Nascimento :</label>
          <input type="date" class="form-control" id="dataModal" name="dataModal" value="'.$linha['data_nasc'].'">
        </div>
        <div class="form-group">
          <label for="bairroModal">Bairro :</label>
          <input type="text" class="form-control" id="bairroModal" name="bairroModal" value="'.$linha['bairro'].'">
        </div>
        <div class="form-group">
          <label for="ruaModal">Rua :</label>
          <input type="text" class="form-control" id="ruaModal" name="ruaModal" value="'.$linha['rua'].'">
        </div>
        <div class="form-group">
          <label for="numcasaModal">Número :</label>
          <input type="text" class="form-control" id="numcasaModal" name="numcasaModal" value="'.$linha['numero_casa'].'">
        </div>
        </form>';
      } else {
        echo "erro";
      }
    }
  }
?>