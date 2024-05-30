<?php

$page = "stagiaire";
include_once "database/conn.php";

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}


if(isset($_POST['upload'])){
  if (isset($_FILES['file'])) {
    $file = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $fileExt = explode(".", $file);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg", "jpeg", "png", "svg","pdf");
    if (in_array($fileActualExt, $allowed)) {
        if ($file_error == 0) {
            if ($file_size < 600000000) {
                $new_name = time() . '.' . $fileActualExt;
                $target = "uploads/" . $new_name;
                if (!empty($file)) {
                move_uploaded_file($_FILES['file']['tmp_name'],$target);
                $insert = mysqli_query($conn,"UPDATE `users` SET `file`='$new_name' WHERE email = '$email'");
                header('location:stagiaire.php');
                $_SESSION['error'] = "Le fichier a été téléchargé avec succès";
                }
            } else {
                $_SESSION['error'] =  "fichier trop gros";
            }
        } else {

            $_SESSION['error'] =  "Erreur dans votre fichier";
        }
    } else {
        $_SESSION['error'] =  "Erreur dans le type de fichier | accept: jpg , jpeg , png , svg";
    }
}
}








if (isset($_POST['submit'])) {
  if(isset($_POST['name'])){
    $name = $_POST['name'];
  }
  if(isset($_POST['email'])){
    $email = $_POST['email'];
  }
  if(isset($_POST['specialite'])){
    $specialite = $_POST['specialite'];
  }
  if(isset($_POST['etablissement'])){
    $etablissement = $_POST['etablissement'];
  }
  if(isset($_POST['diplome'])){
    $diplome = $_POST['diplome'];
  }
  if(isset($_POST['binome'])){
    $binome = $_POST['binome'];
  }

  $update = mysqli_query($conn,"UPDATE `users` SET `name`='$name',`email`='$email',`specialite`='$specialite',`etablissement`='$etablissement',`diplome`='$diplome',`binome`='$binome' WHERE email = '$email'");
  $_SESSION['error'] = "Vos données personnelles ont été mises à jour";
  header('location:stagiaire.php');die();

 


}
  





?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= NAME_WEBSITE; ?>
    - Dashboard</title>

  
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

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    


    
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">


      
      <ul class="navbar-nav ml-auto">
        



        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>


      </ul>
    </nav>
    

    
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      



      <div class="sidebar">

        <?php include_once "inclouds/nav.php"; ?>
        
      </div>
      
    </aside>

    
    <div class="content-wrapper">
      
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard - Stagiaire</h1>
            </div>

          </div>
        </div>
      </div>

     <script src="dist/js/jquery.js"></script>

      <script> 
      $(function(){setTimeout(function() { $("#alert").hide("slow");}, 6000);}); 
      
      </script>

        <div class="container-fluid">
            <?php if ($_SESSION['error'] != "") : ?>
        <div id="alert" class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
    <?php endif; ?>
          <div class="row">
           
        
          <table class="table table-light hover">
            <tbody>
                <tr>
                  <th>Matricule</th>
                    <th>nom et prénom</th>
                    <th>E-mail</th>
                    <th>Spécialité</th>
                    <th>Etablissement</th>
                    <th>Diplôme</th>
                    <th>Binome</th>
                    <th>Statut de la commande</th>

                </tr>
                <?php $select = mysqli_query($conn,"SELECT * FROM `users` WHERE email = '$email'"); 
                
                while ($row = mysqli_fetch_assoc($select)):?>
                <tr>
                <td><?=  $row['id'];?></td>
                <form action="" method="post">
                    <td><input class="form-control" type="text" name="name" value="<?= $row['name'];?>"></td>
                    <td><input class="form-control" type="text" name="email" value="<?=  $row['email'];?>"></td>
                    <td><input class="form-control" type="text" name="specialite" value="<?=  $row['specialite'];?>"></td>
                    <td><input class="form-control" type="text" name="etablissement" value="<?=  $row['etablissement'];?>"></td>
                    <td><input class="form-control" type="text" name="diplome" value="<?=  $row['diplome'];?>"></td>
                    <td><input class="form-control" type="text" name="binome" placeholder="binome" value="<?=  $row['binome'];?>"></td>
                    
                
                    <td>
                        <?php 
                        if(is_null($row['statut']) || $row['statut'] == 0){
                            echo '<button class="btn btn-warning btn-sm" type="button">En attente</button>';


                        }elseif($row['statut'] == 1){
                            echo '<button class="btn btn-success btn-sm" type="button">Accepté</button>';

                        }else{
                            echo '<button class="btn btn-danger btn-sm" type="button">Rejeté</button>';

                        }
                        ?>
                    </td>
                </tr>
                <?php if(!is_null($row['file'])): ?>
                <a  href="uploads/<?= $row['file'];?>" class="btn btn-dark p-1"> <i class="fa fa-download" aria-hidden="true"></i> Téléchargez votre fichier</a>
              <?php endif;?>



                <?php endwhile; ?>

                
                
               
            </tbody>
          </table>

         
        



          </div>
          <button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button>
          </form>
         <br> <br>
          <div class="col pl-2">
            <div>
              <h1>Envoyer un fichier </h1> 
            </div>

            <div>
              
              <form action="" class="w-25" method="post" enctype="multipart/form-data">
              <input class="form-control" type="file"  name="file">
              <br>
              <button type="submit" name="upload" class="btn btn-primary">Envoyer le fichier</button>
            </form>
            </div>
          </div>


          <br>
          <h1>Fiche d'évaluation</h1>

          <?php 
          $select = mysqli_query($conn,"SELECT * FROM `fiches` WHERE email = '$email'");

          if(mysqli_num_rows($select) < 1){
            echo '<div class="alert alert-danger" role="alert">Pas trouvé</div>';

          }else{
            echo '<a href="get_fiche.php?email='.$email.'" class="btn btn-sm btn-primary" target="blank">Naviguer</a>';
          }

          ?>
          
        </div>

        
      
    
        
      </section>
    
      
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