<?php
  include '../../banco.php';

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $data_nasc = $_POST['data_nasc'];
  $cpf = $_POST['cpf'];
  $sexo = $_POST['sexo'];

  $insertusu = "INSERT INTO tbusu VALUES (null,'$email','$senha','E')";
  $addusu = $conexao -> query($insertusu);

  if($insertusu){
    $selectusu = "SELECT * FROM tbusu WHERE email='$email'";
    $consultausu = $conexao -> query($selectusu);
    $result = $consultausu -> fetch_array(MYSQLI_ASSOC);

    $inserteducador = "INSERT INTO tbeducador VALUES (null,'".$result['idusu']."','$nome','$sexo','$data_nasc','$cpf')";
    $addeducador = $conexao -> query($inserteducador);
    if($addeducador){
      echo "sucesso";
    } else {
      echo "erro";
    }
  } else {
    echo "erro";
  }
?>