<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Listagem</title>
<link rel="stylesheet" href="../../estilo.css" type="text/css">	
</head>
<body>





<table width="100%"><thead>
											<tr>
												<th colspan="100%">LISTAGEM DE ALUNO</th>
											</tr>
											
											
											<tr >
										
										<th width="5%" scope="col">ID</th>
										<th>NOME</th>
										<th>SEXO</th>
										<th>NASCIMENTO</th>
										<th>ENDEREÇO</th>
										<th>BAIRRO</th>
                                        <th>RUA</th>
										<th>N° CASA</th>
                                        
										
									 </tr>
									 
									 </thead>
									 <tbody>
									 <?php
									           include '../../banco.php';
						 			   
																				   
											   $sql = "select * from tbaluno order by nome";
											   
											   //executa o comando sql
											   $consulta = $conexao->query($sql);
											   
											   //testar se deu certo o comando
											   if($consulta){
												 //verificando se existe o usuario
												 if($consulta->num_rows > 0){
													//convertendo a consulta num array
													while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
													    echo '<tr>
																<td>'.$linha['idaluno'].'</td>
																<td>'.$linha['nome'].'</td>
																<td>'.$linha['sexo'].'</td>
																<td>'.$linha['data_nasc'].'</td>
																<td>'.$linha['cpf'].'</td>
																<td>'.$linha['bairro'].'</td>
                                                                <td>'.$linha['rua'].'</td>
                                                                <td>'.$linha['numero_casa'].'</td>
															  </tr>';
													}
												 }
											   }
									 ?>
									 
				
									
										
										
								  
								
							</table>
							<br>
							
							
							<div id="noprint">
							<center><a href="buscaaluno.php"><button type="button" class="btn btn-primary">Voltar</button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

							<a href="javascript:;" onclick="window.print();return false"><button type="button" class="btn btn-danger" title="Imprimir">Imprimir</button></a></center>
							</div>  
					</body>
					<style>
					@media print { 
					#noprint { display:none; } 
					body { background: #fff; }
					}
					</style>
</html>
