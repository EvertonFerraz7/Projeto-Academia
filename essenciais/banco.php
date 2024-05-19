<?php
	$conexao = new mysqli('localhost','root','','dbacademia');
   
   //Teste de conexao com o banco
	if(mysqli_connect_errno()){
		trigger_error(mysqli_connect_error());
		echo mysqli_connect_error;
	}
?>