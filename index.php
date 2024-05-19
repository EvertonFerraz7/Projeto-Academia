<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <?php 
						      if(isset($_GET['login'])) {
						        if(($_GET['login'])== 'erro'){
							        echo '<script>
                          swal({
                            title: "ERRO AO FAZER LOGIN",
                            text: "Ocorreu um erro ao fazer login, tente novamente",
                            icon: "error",
                          });
                        </script>';
						        }
						        if(($_GET['login'])== 'semsessao'){
						        	echo '<script>
                              swal({
                                title: "USUÁRIO NÃO AUTENTICADO",
                                text: "Por favor faça login!",
                                icon: "info",
                              });
                            </script>';
						        }
						        if(($_GET['login'])== 'logout'){
						        	echo'<script>
                              swal({
                                title: "LOGOUT REALIZADO COM SUCESSO",
                                text: "O logout foi realizado",
                                icon: "success",
                              });
                            </script>';
						        }
						      }
					      ?>
                <h3 class="card-title text-left mb-3">Projeto Academia</h3>
                <form method="post" action="essenciais/login.php">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
                  <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control p_input" name="senha" id="senha">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <a href="esqueci-senha.php" class="forgot-pass">Esqueci a senha</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>