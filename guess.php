<?php
$page = "register";
include_once "database/conn.php";
$_SESSION['error'] = "";
$_SESSION['success'] = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }
  
  if (isset($_POST['specialite'])) {
    $specialite = $_POST['specialite'];
  }


  if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");

    if (mysqli_num_rows($select) > 0) {

      $_SESSION['error'] = "Merci de changer l'email car il est déjà utilisé";
    }
  }


  if (isset($_POST['password'])) {
    $password = $_POST['password'];
  }

  
  if (isset($_POST['etablissement'])) {
    $etablissement = $_POST['etablissement'];
  }
  
  if (isset($_POST['diplome'])) {
    $diplome = $_POST['diplome'];
  }
  
  
  



  if ($_SESSION['error'] == "") {
    $select = mysqli_query($conn, "INSERT INTO `users`( `name`, `email`, `password`,`role`,`specialite`,`etablissement`,`diplome`) 
    VALUES ('$name','$email','$password','stagiaire','$specialite','$etablissement','$diplome')");
    if ($select) {
      $_SESSION['success'] = "Un compte a été créé.";
    } else {
      $_SESSION['error'] = "Erreur lors de la création du compte";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= NAME_WEBSITE; ?> -  Création d'un compte</title>

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body >
<div >

  


  
 
  

 

 
  <div class="">




      <div class="container-fluid">
      <div class="hold-transition register-page">
    <div class="register-box">
      <div class="login-logo">
        <b><?= NAME_WEBSITE; ?> </b>création d'un compte</a>
      
      </div>

      <?php if ($_SESSION['error'] != "") : ?>
        <div class="alert alert-danger" role="alert">
          <?= $_SESSION['error']; ?>
        </div>
      <?php endif; ?>

      <?php if ($_SESSION['success'] != "") : ?>
        <div class="alert alert-success" role="alert">
          <?= $_SESSION['success']; ?>
        </div>
      <?php endif; ?>

      <div class="card">
        <div class="card-body register-card-body">


          <form action="" method="post">

           



            <div class="input-group mb-3">
              <input type="text" class="form-control" name="name" placeholder="nom et prénom" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="E-mail" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" name="specialite" placeholder="Spécialité" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa fa-star"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" name="etablissement" placeholder="Etablissement" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-building"></span>
                </div>
              </div>
            </div>


            <div class="input-group mb-3">
              <input type="text" class="form-control" name="diplome" placeholder="Diplôme" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-id-card"></span>
                </div>
              </div>
            </div>




            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>


           

            <div class="row">


              <div class="col-4">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Registre</button>
                
              </div>
              
              <a href="index.php">Se connecter?</a>
            </div>
          </form>




        </div>

      </div>
    </div>

  </div>
    
      </div>
  

  </div>



  <aside class="control-sidebar control-sidebar-dark">
    
  </aside>
  
</div>



<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/chart.js/Chart.min.js"></script>

<script src="plugins/sparklines/sparkline.js"></script>

<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>

<script src="dist/js/demo.js"></script>

<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
