<?php
$page ="add";
include_once "database/conn.php";
$_SESSION['error'] = "";
$_SESSION['success'] = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['service'])) {
        $service = $_POST['service'];
    }
    if (isset($_POST['sujet'])) {
        $sujet = $_POST['sujet'];
    }
    if (isset($_POST['profile'])) {
        $profile = $_POST['profile'];
    }
    if (isset($_POST['date_de_début'])) {
        $date_de_début = $_POST['date_de_début'];
    }
    if (isset($_POST['date_dxpiration'])) {
        $date_dxpiration = $_POST['date_dxpiration'];
    }            
    $insert = mysqli_query($conn,"INSERT INTO `offers`( `service`, `sujet`, `profile`, `date_de_début`, `date_dxpiration`) 
    VALUES ('$service','$sujet','$profile','$date_de_début','$date_dxpiration')");
     $_SESSION['success'] = "Offre ajoutée";
     header('location:offers.php');
     die();
}
              

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un offer</title>

    
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
             


                <?php include_once "inclouds/nav.php" ;?>
                
            </div>
            
        </aside>


        <div class="content-wrapper">




            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">


                        </div>



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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter un offer</h3>



                        </div>
                        
                        
                        <form method="POST" action="" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service de stage</label>
                                    <input type="text" name="service" class="form-control" id="exampleInputEmail1" required placeholder="Service de stage">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sujet de stage</label>
                                    <input type="text" name="sujet" class="form-control" id="exampleInputPassword1" required placeholder="Sujet de stage">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Profile demandé</label>
                                    <input type="text" name="profile" class="form-control" id="exampleInputPassword1" required placeholder="Profile demandé">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date de début</label>
                                    <input type="date" name="date_de_début" class="form-control" id="exampleInputPassword1" required placeholder="Date de début">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date d'expiration</label>
                                    <input type="date" name="date_dxpiration" class="form-control" id="exampleInputPassword1" required placeholder="Date d'expiration">
                                </div>
                              

                            </div>
                            

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Ajout</button>
                            </div>
                        </form>
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