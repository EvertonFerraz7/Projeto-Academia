<?php
  include_once '../testasessao.php';
?>

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
    <link rel="stylesheet" href="../sweet-alert/sweetalert.min.css">
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
                <a class="sidebar-brand brand-logo" href="educador.php"><img src="../assets/images/logo.svg"
                        alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="educador.php"><img src="../assets/images/logo-mini.svg"
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
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg"
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
                                    <form action="javascript:func()" id="buscaFicha" method="POST">
                                        <label for="">Busca de Fichas</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="texto" id="texto1">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i>
                                                    Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="mt-4 mb-3 text-right">
                                        <a href="addficha.php" class="btn btn-md btn-success"><i class="fa fa-plus"></i> Adicionar ficha
                                        </a>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered" id="tabelaFicha">
                                            <thead>
                                                <tr>
                                                    <th>Aluno</th>
                                                    <th>Data</th>                                                    
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody id="corpoFicha"></tbody>

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
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright
                            ©
                            bootstrapdash.com 2020</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                            Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/"
                                target="_blank">Bootstrap
                                admin templates</a> from Bootstrapdash.com</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- Inicio do modal alterar -->
    <div class="modal fade" id="abrirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ficha de <span id="alunoFicha"></span> - <span id="dataFicha"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered" id="tabelaFichaAluno">
                            <thead>
                                <tr>
                                    <th>Exercícios</th>
                                    <th>Série</th>                                                    
                                    <th>Repetições</th>
                                    <th>Tipo de treino</th>
                                </tr>
                            </thead>
                            <tbody id="corpoFichaAluno"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Termino do modal alterar -->


    <!-- Inicio do modal ver mais -->    
    <!-- Fim do modal ver mais -->
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
    <script src="../sweet-alert/sweetalert.min.js"></script>
    <!-- End custom js for this page -->

    <?php

            if(isset($_GET['inserir'])){
                if($_GET['inserir'] == 'sucesso'){
                    echo "<script>
                    swal({
                                title: 'FICHA FEITA COM SUCESSO',                                                              
                                icon: 'success'
                            });
                        </script>";                    
                }
            } 

            ?>

    <script>
    $(document).ready(function() {

        $('#buscaFicha').submit(function() {
            let texto1 = $('#texto1').val();
            $.post('buscas.php', {
                texto1: texto1
            }, function(retorno1) {
                if (retorno1 != 'vazio') {
                    $('#corpoFicha').html(retorno1);
                } else {
                    let html =
                        '<tr><td colspan="3" class="text-center">Sem resultados</td></tr>';
                    $('#body').html(html);
                }
            })
        }) //Fim do submit

        $('#tabelaFicha').on('click', 'button', function() {
            let acao = $(this).val();
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text()
            }).get()

            console.log(data)

            $('#alunoFicha').text(data[0]);
            $('#dataFicha').text(data[1]);
            //Teste para saber se vai alterar o usuário
            if (acao == "ver") {
                let idficha = $(this).attr('id');
                $.post('buscas.php', {
                    idficha: idficha
                }, function(retorno2) {
                    if (retorno2 != 'erro') {
                        $('#corpoFichaAluno').html(retorno2);
                    } else {
                        $('#corpoModal').html(retorno2);
                    }
                })
                $('#abrirModal').modal('show');

                //início do click alterarUsu
                $('#verFicha').click(function() {
                    let idava = $('#idModal').val();
                    let med_braco = $('#med_bracoModal').val();
                    let med_antebraco = $('#med_antebracoModal').val();
                    let med_coxa = $('#med_coxaModal').val();
                    let med_panturrilha = $('#med_panturrilhaModal').val();
                    let med_peso = $('#med_pesoModal').val();
                    let objetivo = $('#objetivoModal').val();
                    $.post('alterar.php', {
                        idava: idava,
                        med_braco: med_braco,
                        med_antebraco: med_antebraco,
                        med_coxa: med_coxa,
                        med_panturrilha: med_panturrilha,
                        objetivo: objetivo,
                        med_peso: med_peso
                    }, function(retorno3) {
                        if (retorno3 != 'erro') {
                            $('#abrirModal').modal('hide');
                            swal({
                                title: "DADOS ALTERADO COM SUCESSO",
                                text: "Atualize a página para ver as informações atualizadas",
                                icon: "success",
                            });
                            //fim swal
                        }
                    })
                }) // Fim do click alterarUsu
            } // Fim do teste para alterar

            //Teste para saber se vai excluir o usuário
            if (acao == "deletar") {
                swal({
                        title: "DESEJA DELETAR ESSE USUÁRIO?",
                        text: "O usuário será deletado permanentemente",
                        incon: "info",
                        buttons: ["Não", "Sim"],
                        dangerMode: true,
                    })
                    .then((willInsert) => {
                        if (willInsert) {
                            let idava = $(this).attr('id');
                            $.post('delete.php', {
                                idava: idava
                            }, function(retorno4) {
                                if (retorno4 != 'erro') {
                                    swal({
                                        title: "DADOS DELETADOS COM SUCESSO",
                                        text: "Atualize a página para ver as informações atualizadas",
                                        icon: "success",
                                    });
                                } else {
                                    swal({
                                        title: "ERRO AO DELETAR OS DADOS",
                                        text: "Ocorreu um erro ao deletar os dados, tente novamente",
                                        icon: "error",
                                    });
                                }
                            })
                        }
                    })
            } //Fim do teste para excluir
        }) //Fim do click tabelaUsu

        
        $('.mostrar').on('click', function() {           

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text()
            }).get()

            console.log(data)

            $('#alunoFicha').text(data[0]);
            $('#dataFicha').text(data[1]);
        })


    })
    </script>
</body>

</html>