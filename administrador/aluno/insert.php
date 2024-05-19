<?php
  include '../../banco.php';

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $data_nasc = $_POST['data_nasc'];
  $cpf = $_POST['cpf'];
  $bairro = $_POST['bairro'];
  $rua = $_POST['rua'];
  $num_casa = $_POST['num_casa'];
  $sexo = $_POST['sexo'];

  $insertusu = "INSERT INTO tbusu VALUES (null,'$email','$senha','A')";
  $addusu = $conexao -> query($insertusu);

  if($insertusu){
    $selectusu = "SELECT * FROM tbusu WHERE email='$email'";
    $consultausu = $conexao -> query($selectusu);
    $result = $consultausu -> fetch_array(MYSQLI_ASSOC);

    $insertaluno = "INSERT INTO tbaluno VALUES (null,'".$result['idusu']."','$nome','$sexo','$data_nasc','$cpf','$bairro','$rua','$numero_casa')";
    $addaluno = $conexao -> query($insertaluno);
    if($addaluno){
      echo "sucesso";
    } else {
      echo "erro";
    }
  } else {
    echo "erro";
  }
?>