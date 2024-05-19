<?php
  include '../testasessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/fontawesome-free/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="../../assets/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <!-- Incluindo JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  </head>
  <body>
    <!-- Início da container-scroller -->
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas fixed" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../admin.php">
              <span class="menu-icon">
              <i class="fa-solid fa-house"></i>
              </span>
              <span class="menu-title">Início</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../usuario/buscausu.php">
              <span class="menu-icon">
               <i class="fa-solid fa-user"></i>
              </span>
              <span class="menu-title">Usuários</span>
            </a>
          </li>
          <li class="nav-item menu-items active">
            <a class="nav-link" href="buscaaluno.php">
              <span class="menu-icon">
                <i class="fa-solid fa-users"></i>
              </span>
              <span class="menu-title">Alunos</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../educador/buscaedu.php">
              <span class="menu-icon">
                <i class="fa-solid fa-people-group"></i>
              </span>
              <span class="menu-title">Educadores</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../essenciais/sair.php">
              <span class="menu-icon">
                <i class="fa-solid fa-right-from-bracket"></i>
              </span>
              <span class="menu-title">Sair</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <i class="fa-solid fa-bars"></i>
          </button>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <i class="fa-solid fa-bars"></i>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="d-sm-flex justify-content-between">
                          <?php include_once '../../essenciais/voltar.php';?>
                        </div>
                        <hr>
                        <center><h3>Cadastro de Alunos</h3></center>
                        <form action="javascript:func()" method="POST">
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="nome">Nome :</label>
                                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o nome">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="email">Email :</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="senha">Senha :</label>
                                  <input type="password" class="form-control" id="senha" name="senha">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="data_nasc">Nascimento :</label>
                                  <input type="date" class="form-control" id="data_nasc" name="data_nasc">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="cpf">CPF :</label>
                                  <input type="text" class="form-control" id="cpf" name="cpf" placeholder="123.456.789-10" maxlength="14">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="bairro">Bairro :</label>
                                  <input type="text" class="form-control" id="bairro" name="bairro">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="rua">Rua :</label>
                                  <input type="text" class="form-control" id="rua" name="rua">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="num_casa">Número da Casa :</label>
                                  <input type="text" class="form-control" id="num_casa" name="num_casa">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="sexo">Sexo :</label>
                                  <select class="form-control" id="sexo" name="sexo">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <center><button class="btn btn-success btn-md" id="cadastrar">Cadastrar</button></center>
                            </div>
                          </div>
                        </form>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="https://cdnjs.com/libraries/jquery.mask"></script>
    <!-- End custom js for this page -->
    <script>
      $(document).ready(function(){
        //Início do controle de cpf
        $('#cpf').on('keyup',function(){
          let Caracteres = $('#cpf').val();
          if(Caracteres.length == 3 || Caracteres.length == 7){
            $('#cpf').val(Caracteres + ".")
          }
          if(Caracteres.length == 11){
            $('#cpf').val(Caracteres + "-")
          }
        })
        //Fim do controle de cpf

        //Início do script de insert
        $('#cadastrar').click(function(){
          swal({
              title: "DESEJA CADASTRAR ESSE USUÁRIO?",
              incon: "info",
              buttons: ["Não","Sim"],
              dangerMode: true,
            })
            .then((willInsert)=>{
              if(willInsert){
                let nome = $('#nome').val();
                let email = $('#email').val();
                let senha = $('#senha').val();
                let data_nasc = $('#data_nasc').val();
                let cpf = $('#cpf').val();
                let bairro = $('#bairro').val();
                let rua = $('#rua').val();
                let num_casa = $('#num_casa').val();
                let sexo = $('#sexo').val();
                $.post('insert.php', {nome:nome, email:email, senha:senha, data_nasc:data_nasc, cpf:cpf, bairro:bairro, rua:rua, num_casa:num_casa, sexo:sexo},function(retorno){
                  if(retorno != 'erro'){
                    swal({
                      title: "ALUNO CADASTRADO COM SUCESSO",
                      icon: "success",
                    });
                  } else {
                    swal({
                      title: "ERRO AO CADASTRAR USUÁRIO",
                      text: "Ocorreu um erro ao cadastrar o aluno, tente novamente",
                      icon: "error"
                    });
                  }
                })
              }
            })
        })
        //Fim do script de insert
      })
    </script>
  </body>
</html>