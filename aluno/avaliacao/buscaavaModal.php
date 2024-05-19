<?php
  include_once '../../banco.php';
  
  $idava = $_POST['idava'];

  $sql = "SELECT tbaluno.nome AS aluno, tbeducador.nome AS educador, tbavaliacao.datava AS dataava, tbavaliacao.horaava AS horaava, tbavaliacao.med_braco AS braco, tbavaliacao.med_antebraco AS antebraco, tbavaliacao.med_coxa AS coxa, tbavaliacao.med_panturrilha AS panturrilha, tbavaliacao.objetivo AS objetivo
  FROM tbavaliacao
  INNER JOIN tbaluno ON(tbaluno.idaluno = tbavaliacao.idaluno)
  INNER JOIN tbeducador ON(tbeducador.ideducador = tbavaliacao.ideducador)
  WHERE tbavaliacao.idava = ".$idava;
    
  $consulta = $conexao -> query($sql);
    
  if($consulta){
    if($consulta -> num_rows > 0){
      $linha = $consulta ->fetch_array(MYSQLI_ASSOC);
      echo '<div class="mb-3">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="nomeAluno">Nome:</label>
            <input value="'.$linha['aluno'].'" class="form-control" type="text" id="nomeAluno" name="nomeAluno" readonly>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="nomeEdu">Educador:</label>
            <input value="'.$linha['educador'].'" class="form-control" type="text" id="nomeEdu" name="nomeEdu" readonly>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="dataAva">Data da Avaliação:</label>
            <input value="'.$linha['dataava'].'" class="form-control" type="date" id="dataAva" name="dataAva" readonly>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="horaAva">Hora da Avaliação:</label>
            <input value="'.$linha['horaava'].'" class="form-control" type="time" id="horaAva" name="horaAva" readonly>
          </div>
        </div>
      </div>
    </div>
    <h4 class="text-center mb-3">Medidas</h4>
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="medBraco">Braço:</label>
            <input value="'.$linha['braco'].'" type="text" class="form-control" id="medBraco" name="medBraco" readonly>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="medAntebraco">Antebraço:</label>
            <input value="'.$linha['antebraco'].'" type="text" class="form-control" id="medAntebraco" name="medAntebraco" readonly>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="medCoxa">Coxa:</label>
            <input value="'.$linha['coxa'].'" type="text" class="form-control" id="medCoxa" name="medCoxa" readonly>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="medPanturrilha">Panturrilha:</label>
            <input value="'.$linha['panturrilha'].'" type="text" class="form-control" id="medPanturrilha" name="medPanturrilha" readonly>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-12">
          <label for="objetivo">Objetivo:</label>
          <textarea name="objetivo" id="objetivo" cols="30" rows="10" class="form-control" readonly>'.$linha['objetivo'].'</textarea>
        </div>
      </div>
    </div>';
    }
  }
?>