<?php 
    include '../testasessao.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="index.html"><img src="../assets/images/logo.svg"
                        alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg"
                        alt="logo" /></a>
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
                    <a class="nav-link" href="buscaalunos.php" aria-expanded="false" aria-controls="ui-basic">
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
                    <a class="nav-link" href="essenciais/sair.php">
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
                    <a class="navbar-brand brand-logo-mini" href="#"><img src="../assets/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
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
                                    <div class="mt-3 text-center">
                                        <h2> Registro de Avaliação </h2>
                                    </div>   
                                    <form action="inserirAva.php" method="POST">                             
                                    <div class="mt-3">
                                        <div class="row">
                                            <div class="col-6">                                            
                                                <div class="form-group">

                                                    <label for=""> Aluno </label>
                                                    <select class="form-control" name="aluno" placeholder="Selecione o nome do aluno">
                                                    <option></option>
                                                    <?php 
                                                        include '../banco.php';
                                                        $sql = "select * from tbaluno order by nome";
                                                        //executa o comando sql
                                                        $consulta = $conexao->query($sql);
                                                        //testar se deu certo o comando
                                                        if($consulta){
                                                        //verificando se existe o usuario
                                                        if($consulta->num_rows > 0){
                                                        //convertendo a consulta num array
                                                        while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
                                                            echo '<option value="'.$linha['idaluno'].'">'.$linha['nome'].'</option>';
                                                        }
                                                        }
                                                    }
                                                    ?>
                                                    </select>
                                                
                                                </div>                                                
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                
                                                    <label for=""> Educador </label>
                                                    <select class="form-control" name="educador" data-placeholder="Selecione o nome do aluno">
                                                    <option></option>
                                                    <?php 
                                                        include '../banco.php';
                                                        $sql = "select * from tbeducador order by nome";
                                                        //executa o comando sql
                                                        $consulta = $conexao->query($sql);
                                                        //testar se deu certo o comando
                                                        if($consulta){
                                                        //verificando se existe o usuario
                                                        if($consulta->num_rows > 0){
                                                        //convertendo a consulta num array
                                                        while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
                                                            echo '<option value="'.$linha['ideducador'].'">'.$linha['nome'].'</option>';
                                                        }
                                                        }
                                                    }
                                                    ?>
                                                    </select>
                                            
                                                </div>
                                            </div>
                                        </div><!-- Fechamento da div row -->                                                                                                                                                   
                                    </div>                                
                                    <div class="mt-3">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for=""> Medida do Braço </label>
                                                <input type="text" class="form-control" id="medBraco" name="medBraco">
                                            </div>
                                            <div class="col-4">
                                                <label for=""> Medida do Antebraço </label>
                                                <input type="text" class="form-control" id="medAntebraco" name="medAntebraco">
                                            </div>
                                            <div class="col-4">
                                                <label for=""> Medida da Coxa </label>
                                                <input type="text" class="form-control" id="medCoxa" name="medCoxa">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for=""> Medida da Panturrilha </label>
                                                <input type="text" class="form-control" id="medPanturrilha" name="medPanturrilha">
                                            </div>
                                            <div class="col-6">
                                                <label for=""> Objetivo </label>                                                
                                                <select class="form-control" id="objetivo" name="objetivo">
                                                    <option value="0"> Selecione o objetivo</option>
                                                    <option value="EMAGRECER">EMAGRECER</option>
                                                    <option value="HIPERTROFIA">HIPERTROFIA</option>
                                                    <option value="PERCA DE PESO">PERCA DE PESO</option>
                                                    <option value="DEFINICAO">DEFINIÇÃO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for=""> Data da Avaliação </label>
                                                <input type="date" class="form-control" name="dataAva" value="<?php echo date('Y-m-d') ?>">
                                            </div>
                                            <div class="col-6">
                                                <label for=""> Horário da Avaliação </label>
                                                <input type="time" class="form-control" name="horaAva" value="<?php echo date('H:m') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <button class="btn btn-success btn-lg w-50 btn-rounded" id="inserirAva"> Concluir Avaliação </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com 2020</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap
                                admin templates</a> from Bootstrapdash.com</span>
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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function() {
          $('.select2').select2({
            "language" : "pt-BR",           
          });
      });
    </script>
</body>

</html>