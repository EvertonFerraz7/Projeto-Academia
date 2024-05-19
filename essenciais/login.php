<?php
  include 'banco.php';

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "select * from tbusu where email='$email' and senha='$senha'";

  $consulta = $conexao -> query($sql);

  if($consulta){
    if($consulta -> num_rows > 0){
      session_start();
      $_SESSION['login'] = 'ok';
      $linha = $consulta -> fetch_array(MYSQLI_ASSOC);
      
      //Testa o cargo para ver se é um gerente, educador físico ou aluno
      if($linha['cargo'] == 'G'){
        header('Location: ../admin.php');
      }
      
      if($linha['cargo'] == 'E'){
        $sql3 = "select * from tbeducador where idusu=".$linha['idusu'];
        $consulta3 = $conexao -> query($sql3);
        $linha3 = $consulta3 -> fetch_array(MYSQLI_ASSOC);
        $_SESSION['educador'] = $linha3['nome'];
        header('Location: ../educador.php');
      }
      
      if($linha['cargo'] == 'A'){
        $sql2 = "select * from tbaluno where idusu=".$linha['idusu'];
        $consulta2 = $conexao -> query($sql2);
        $linha2 = $consulta2 -> fetch_array(MYSQLI_ASSOC);
        $_SESSION['aluno'] = $linha2['idaluno'];
        header('Location: ../aluno.php');
      }

    }
    else {
      header('Location: ../index.php?login=erro'); 
    }
  }
?>