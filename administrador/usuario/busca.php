<?php
  include '../../banco.php';

  //recebendo variáveis por post
  if(isset($_POST['texto'])){
    $texto = $_POST ['texto'];
    //criando uma consulta
    $sql = "select * from tbusu where email like '%$texto%' ";
    $consulta = $conexao -> query($sql);
    if($consulta){
      if ($consulta->num_rows > 0){
        while( $linha=$consulta->fetch_array(MYSQLI_ASSOC)){
            echo' <tr>
            <td>'.$linha['idusu'].'</td>
            <td>'.$linha['email'].'</td>
            <td>
                <button type="button" title="Alterar Usuário" class="btn btn-md btn-primary" value="alterar" id="'.$linha['idusu'].'"> <i class="fa fa-edit"></i></button>
                <button id="'.$linha['idusu'].'" title="Excluir Usuário" class="btn btn-md btn-danger" value="deletar"> <i class="fa fa-trash"></i></button>
            </td>
          </tr>';
        }
      } else {
        echo 'vazio';
      }
    }       
  }

  if(isset($_POST['idusu'])){
    $idusu = $_POST['idusu'];
    $sql = "SELECT * FROM tbusu WHERE idusu = $idusu";
    $consulta = $conexao-> query($sql);
    $linha = $consulta -> fetch_array(MYSQLI_ASSOC);
    if($consulta){
      if($consulta->num_rows > 0){
        echo '<form action="javascript:func()" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" id="idModal" name="idModal" value="'.$linha['idusu'].'">
        </div>
        <div class="form-group">
            <label for="email">E-mail :</label>
            <input type="email" class="form-control" id="emailModal" name="emailModal" value="'.$linha['email'].'" placeholder="example@gmail.com">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group">
            <label for="senha">Senha :</label>
            <input type="password" class="form-control" id="senhaModal" name="senhaModal" value="'.$linha['senha'].'" placeholder="Digite sua senha">
        </div>
        <div class="form-group">
            <label for="nome">Cargo :</label>
            <input type="text" class="form-control" id="cargoModal" name="cargoModal" value="'.$linha['cargo'].'" placeholder="Digite seu nome aqui">
        </div>
        </form>';
      } else {
        echo "erro";
      }
    }
  }
?>