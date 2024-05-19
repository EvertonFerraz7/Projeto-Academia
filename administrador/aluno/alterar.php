<?php
  include '../../banco.php';

  //recebendo as variáveis por POST
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $sexo = $_POST['sexo'];
  $data = $_POST['data'];
  $bairro = $_POST['bairro'];
  $rua = $_POST['rua'];
  $numcasa = $_POST['numcasa'];
  $cpf = $_POST['cpf'];

  $sql = "UPDATE tbaluno SET nome='$nome',sexo='$sexo',data_nasc='$data',cpf='$cpf',bairro='$bairro',rua='$rua',numero_casa='$numcasa' WHERE idaluno='$id'";
  $update = $conexao->query($sql);
  if ($update) {
    echo 'sucesso';
  } else {
    echo 'erro';
  }
?>