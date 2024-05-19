<?php
  include '../../banco.php';
  if(isset($_POST['texto'])){
    $texto = $_POST ['texto'];
  
    //criando uma consulta
    $sql = "select * from tbeducador where nome like '%$texto%' ";
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
          echo' <tr class="text-center">
                <td>'.$linha['nome'].'</td>
                <td>'.$sexo.'</td>
                <td>'.$data.'</td>
                <td>
                  <button title="Alterar Educador" class="btn btn-md btn-primary" value="alterar" id="'.$linha['ideducador'].'"> <i class="fa fa-edit"></i></button>
                  <button title="Excluir Educador" class="btn btn-md btn-danger" value="deletar" id="'.$linha['ideducador'].'"> <i class="fa fa-trash"></i></button>
                </td>
                </tr>';
        }
      }else{
        echo 'vazio';    
      }
    }
  }

  if(isset($_POST['ideducador'])){
    $ideducador = $_POST['ideducador'];
    $sql = "SELECT * FROM tbeducador WHERE ideducador = $ideducador";
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
            <input type="hidden" class="form-control" id="idModal" name="idModal" value="'.$linha['ideducador'].'">
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
          <label for="dataModal">Nascimento :</label>
          <input type="date" class="form-control" id="dataModal" name="dataModal" value="'.$linha['data_nasc'].'">
        </div>
        <div class="form-group">
          <label for="cpfModal">Bairro :</label>
          <input type="text" class="form-control" id="cpfModal" name="cpfModal" value="'.$linha['cpf'].'">
        </div>
        </form>';
      } else {
        echo "erro";
      }
    }
  }
?>