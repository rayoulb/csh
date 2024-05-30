<?php

$page = "index";
include_once "database/conn.php";

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


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
  

  
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

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
              <h1 class="m-0">Dashboard - Encadrant</h1>
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


    <div class="alert alert-danger w-25" id="alert2" role="alert">
    
    </div>
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
                <?php $select = mysqli_query($conn,"SELECT * FROM `users` WHERE role = 'stagiaire'"); 
                
                while ($row = mysqli_fetch_assoc($select)):?>
                <tr>
                <td><?=  $row['id'];?></td>
                <form action="" method="post">
                    <td><?= $row['name'];?></td>
                    <td><?=  $row['email'];?></td>
                    <td><?=  $row['specialite'];?></td>
                    <td><?=  $row['etablissement'];?></td>
                    <td><?=  $row['diplome'];?></td>
                    <td><?=  $row['binome'];?></td>
                    
                
                    <td>
                    <div class="form-group">
             
                <select id="myselect" onchange="changeStatut(<?= $row['id'];?>)"  class="form-control" name="myselect">
                    <option <?php if($row['statut']== '0'){ echo 'selected';} ?> value="0" selected >En attente</option>
                    <option <?php if($row['statut']== '1'){ echo 'selected';} ?> value="1">Accepté</option>
                    <option <?php if($row['statut']== '2'){ echo 'selected';} ?> value="2">Rejeté</option>
                </select>
               </div>
                    </td>
                </tr>
                <?php endwhile; ?>

                
               
                
               
            </tbody>
          </table>

         
       



          </div>
   
          </form>
          <div class="row">
      
        </form>

          </div>
          
        </div>
        
      </section>
      
    </div>
<script>
    $("#alert2").hide();
    function changeStatut(id) {
				
       
        let myselect = $("#myselect").val();
					
					$.ajax({
						url: "action/statut.php",
						method: "POST",
						data: {
                            user:id,
                            myselect:myselect,
                            email : '<?= $_SESSION['email'] ;?>',
                          
                        },
						success: function(res) {
                            $(function(){setTimeout(function() {
                                
                                $("#alert2").show("slow").html(res);
                             
                                
                                ;}, 1000);})
                        


						}
					})
					return false;
				
			}
</script>

    
    <aside class="control-sidebar control-sidebar-dark">
      
    </aside>
    
  </div>
  


  
  <script src="dist/js/adminlte.js"></script>
  

  

</body>

</html>