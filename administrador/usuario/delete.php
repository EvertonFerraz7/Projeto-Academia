<?php
include '../../banco.php';

$idusu = $_POST['idusu'];

$sql = "delete from tbusu where idusu = $idusu";

$delete = $conexao->query($sql);

if($delete){
  echo "sucesso";
}else{
  echo "erro";
}

?>