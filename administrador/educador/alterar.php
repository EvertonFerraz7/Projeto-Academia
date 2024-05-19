<?php
  include '../../banco.php';

  //recebendo as variáveis por POST
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $sexo = $_POST['sexo'];
  $data = $_POST['data'];
  $cpf = $_POST['cpf'];

  $sql = "UPDATE tbeducador SET nome='$nome',sexo='$sexo',data_nasc='$data',cpf='$cpf' WHERE ideducador='$id'";
  $update = $conexao->query($sql);
  if ($update) {
    echo 'sucesso';
  } else {
    echo 'erro';
  }
?>