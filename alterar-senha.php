<?php
  include 'banco.php';
  session_start();

  if(!isset($_POST['senha1']) && !isset($_POST['senha2'])){

    $rash1 = $_SESSION['rash'];
    $rash2 = $_GET['rash'];
    $email = $_SESSION['email'];

    if($rash1 != $rash2){
      header('Location: index.php?rash=norash');
    }
  } else {
    if($_POST['senha1'] != $_POST['senha2']){
      $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>As senhas não correspondem</strong> Tente novamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';

      $senha1 = $_POST['senha1'];
      $senha2 = $_POST['senha2'];
    } else {
      $senha = $_POST['senha1'];
      $email = $_SESSION['email'];

      $sql = "UPDATE tbusu SET senha='$senha' WHERE email='$email'";
      $consulta = $conexao -> query($sql);
      session_destroy();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Redefinir Senha</title>
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
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <?php
                  if(isset($text)){
                    echo $text;
                  }
                ?>
                <form method="POST" action="">
                  <div class="form-group">
                    <label>Digite a nova senha</label>
                    <input type="password" class="form-control" name="senha1" id="senha1" required <?php if(isset($senha1)){echo 'value="'.$senha1.'"';}?>>
                  </div>
                  <div class="form-group">
                    <label>Confirme sua senha</label>
                    <input type="password" class="form-control" name="senha2" id="senha2" required <?php if(isset($senha2)){echo 'value="'.$senha2.'"';}?>>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Alterar</button>
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