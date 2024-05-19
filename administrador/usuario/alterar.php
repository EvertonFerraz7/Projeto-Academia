<?php
  include '../../banco.php';

  //recebendo as variáveis por POST
  $id = $_POST['id'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $cargo = $_POST['cargo'];

  $sql = "update tbusu set email='$email', senha='$senha', cargo='$cargo' where idusu='$id'";
  $update = $conexao->query($sql);
  if ($update) {
    echo 'sucesso';
  } else {
    echo 'erro';
  }
?>