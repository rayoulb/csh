<?php

$page ="login";
include_once "database/conn.php";


$_SESSION['error'] = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    $select = mysqli_query($conn,"SELECT * FROM `users` WHERE email='$email' AND password = '$password' ");
    if (mysqli_num_rows($select) === 1) {
        $row = mysqli_fetch_assoc($select);
        if ($row['email'] === $email && $row['password'] === $password) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $row['role'];

            if($row['role'] == 'stagiaire'){
              
              header('location:stagiaire.php');die();
            }elseif($row['role'] == 'encadrant'){
              header('location:encadrant.php');die();
            }else{
              header('location:dashboard.php');die();
            }
        }
    } else {
        $_SESSION['error'] = "Mauvais email ou mot de passe";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= NAME_WEBSITE; ?> | Se connecter</title>


  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<?php // include_once "inclouds/header.php"; ?>
<body>

<div class="hold-transition register-page">
  <div class="register-box">
<div class="login-box">
  <div class="login-logo">
   <b><?= NAME_WEBSITE; ?></b></a>
   <center>
    
  </center>
  </div>
  <?php if ($_SESSION['error'] != "") : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
    <?php endif; ?>
 
  <div class="card">
    <div class="card-body login-card-body">

    
      
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="E-mail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
     
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Connecter</button>
          </div>
   
        </div>
      </form>

     

   
    </div>
  
  </div>
</div>

</div>
</body>
</html>
