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
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
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
          <li class="nav-item menu-items active">
            <a class="nav-link" href="buscausu.php">
              <span class="menu-icon">
               <i class="fa-solid fa-user"></i>
              </span>
              <span class="menu-title">Usuários</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../aluno/buscaaluno.php">
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
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
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
        <!-- partial -->
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
                        <form action="javascript:func()" method="POST" id="formbusca">
                           <center><h3>BUSCA DE USUÁRIOS</h3></center>
                           <div class="input-group">
                             <input class="form-control" type="text" name="texto" id="texto">
                             <div class = "input-group-append">
                             <button type="submit" class="btn btn-info" id="buscar"><i class="fa fa-search"></i> Buscar </button>
                          </div>
                          </div>
                        </form>
                        <hr>
                        <table class="table table-bordered text-center" id="tabelaUsu">
                          
                          <thead>
                            <tr>
                              <th>CÓDIGO</th>
                              <th>E-MAIL</th>
                              <th>OPÇÕES</th>
                            </tr>
                          </thead>
                          <tbody id="body"></tbody>
                        </table>
                        <div class="modal fade" id="abrirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alterar Usuário</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" id="corpoModal"></div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-success" id="alterarUsu">Salvar Mudanças</button>
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
    <!-- End custom js for this page -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <script>
      $(document).ready(function(){

        //início do submit
        
        let texto = $('#texto').val();
        $.post('busca.php',{texto:texto}, function(retorno1){
          if(retorno1 != 'vazio'){
            $('#body').html(retorno1);
          } else {
            let html = '<tr><td colspan="3" class="text-center">Sem resultados</td></tr>';
            $('#body').html(html);
          }
        })
        $('#formbusca').change(function(){
          let texto = $('#texto').val();
          $.post('busca.php',{texto:texto}, function(retorno1){
            if(retorno1 != 'vazio'){
              $('#body').html(retorno1);
            } else {
              let html = '<tr><td colspan="3" class="text-center">Sem resultados</td></tr>';
              $('#body').html(html);
            }
          })
        })
        
        //Início click tabelaUsu
        $('#tabelaUsu').on('click','button',function(){
          let acao = $(this).val();
          //Teste para saber se vai alterar o usuário
          if(acao == "alterar"){
            let idusu = $(this).attr('id');
            $.post('busca.php', {idusu:idusu}, function(retorno2){
              if(retorno2 != 'erro'){
                $('#corpoModal').html(retorno2);
              } else {
                $('#corpoModal').html(retorno2);
              }
            })
            $('#abrirModal').modal('show');

            //início do click alterarUsu
            $('#alterarUsu').click(function(){
              let id = $('#idModal').val();
              let email = $('#emailModal').val();
              let senha = $('#senhaModal').val();
              let cargo = $('#cargoModal').val();
              $.post('alterar.php',{id:id, email:email, senha:senha, cargo:cargo}, function(retorno3){
                if(retorno3 != 'erro'){
                  $('#abrirModal').modal('hide');
                  swal({
                    title: "USUÁRIO ALTERADO COM SUCESSO",
                    icon: "success",
                    buttons: false,
                  });
                  //fim swal
                  setTimeout(function(){
                    window.location.reload();
                  }, 1500);
                }
              })
            }) // Fim do click alterarUsu
          } // Fim do teste para alterar

          //Teste para saber se vai excluir o usuário
          if(acao == "deletar"){
            swal({
              title: "DESEJA DELETAR ESSE USUÁRIO?",
              text: "O usuário será deletado permanentemente",
              incon: "info",
              buttons: ["Não","Sim"],
              dangerMode: true,
            })
            .then((willInsert)=>{
              if(willInsert){
                let idusu = $(this).attr('id');
                $.post('delete.php', {idusu:idusu}, function(retorno4){
                  if(retorno4 != 'erro'){
                    swal({
                      title: "USUÁRIO DELETADO COM SUCESSO",
                      icon: "success",
                      text: "Os dados foram excluídos permanentemente",
                      buttons: false,
                    });
                    setTimeout(function(){
                      window.location.reload();
                    }, 1500);
                  } else {
                    swal({
                      title: "ERRO AO ALTERAR USUÁRIO",
                      text: "Ocorreu um erro ao alterar o usuário, tente novamente",
                      icon: "error",
                    });
                  }
                })
              }
            })
          }//Fim do teste para excluir
        }) //Fim do click tabelaUsu
      })
    </script>
  </body>
</html>