<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Monster Machine</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/vendors/fontawesome-free/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="../assets/vendors/fontawesome-free/css/fontawesome.css"> 
    <link rel="stylesheet" href="../assets/vendors/fontawesome-free/css/all.min.css"> 
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item menu-items">
            <a class="nav-link" href="../educador.php">
              <span class="menu-icon">
                <i class="fa-solid fa-house"></i>
              </span>
              <span class="menu-title">Principal</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="buscaalunos.php" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="fa-solid fa-users"></i>
              </span>
              <span class="menu-title">Alunos</span>             
            </a>           
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="buscaava.php">
              <span class="menu-icon">
                <i class="fa fa-pie-chart"></i>
              </span>
              <span class="menu-title">Avaliações</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="buscafichas.php">
              <span class="menu-icon">
                <i class="fa fa-address-card"></i>
              </span>
              <span class="menu-title">Fichas</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../essenciais/sair.php">
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
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
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
                    <form action="buscaalunos.php" method="POST">
                      <label for="">Busca de Alunos</label>
                      <div class="input-group">
                        <input class="form-control" type="text" name="texto" id="texto">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                      </div>
                    </form>                    
                      <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                          <thead>
                          <tr>
                            <th>Código</th>
                            <th>Aluno</th>                 
                            <th>Sexo</th>
                            <th>Nascimento</th>
                            <th>Bairro</th>
                            <th>Rua</th>                    
                          </tr>
                          </thead>
                          <?php
                    if(isset($_POST['texto'])){
                      include '../banco.php';

                      $texto = $_POST['texto'];
                      $sql = "select *,DATE_FORMAT(data_nasc,'%d/%m/%Y') as data_nasc from tbaluno
                      where tbaluno.nome like '%$texto%'";

                      //executa o comando SQL
                      $consulta = $conexao -> query($sql);

                      //testa se a consulta deu certo
                      if($consulta){
                        //verifica se a consulta retornou linhas
                        if($consulta -> num_rows > 0){
                          while($linha = $consulta -> fetch_array(MYSQLI_ASSOC)){
                            echo '<tr>
                                    <td>'.$linha['idaluno'].'</td>
                                    <td>'.$linha['nome'].'</td>                                    
                                    <td>'.$linha['sexo'].'</td>
                                    <td>'.$linha['data_nasc'].'</td>
                                    <td>'.$linha['bairro'].'</td>  
                                    <td>'.$linha['rua'].'</td>                                                                                                                                                                                    
                                  </tr>';                              
                          }
                        } 
                      }
                    }
                    else {
                      echo '<tr>
                              <td colspan=100%>
                              <center>Pesquise algo!!</center>
                              </td>
                            </tr>';
                    }
                  ?>                          
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>    
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->    
  </body>
</html>