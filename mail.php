<?php
$page ="mail";
include_once "database/conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$_SESSION['success'] = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['subject'])) {
        $subject = $_POST['subject'];
    }
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
    }




require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$otp = mt_rand(99999,999999);
$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'riadhcoding24@gmail.com';
	$mail->Password   = 'atvqldyiuzlrjbtf';
	$mail->SMTPSecure = 'ssl';
	$mail->Port       = 465;
	$mail->setFrom('riadhcoding24@gmail.com');
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$link = bin2hex(random_bytes(16));
	$mail->Body = 'Message : '.$message;
	$mail->send();
    $_SESSION['success'] = "Votre message a été envoyé. Merci" ;
    header('location:mail.php');

   
    
    

}
              

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Envoyer un message</title>

    
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
                            <h3 class="card-title">Envoyer un message</h3>



                        </div>
                        
                        
                        <form method="POST" action="" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" required placeholder="Email du destinataire">
                                </div>
                            

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Subject</label>
                                    <input type="text" name="subject" class="form-control" id="exampleInputPassword1" required placeholder="Subject">
                                </div>

                             
                                <div class="form-group">
                                  <div class="form-group">
                                    <label for="my-textarea">Message</label>
                                    <textarea id="my-textarea" class="form-control" name="message" required rows="3" placeholder="Message.."></textarea>
                                  </div>
                                </div>
                              

                            </div>
                            

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
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