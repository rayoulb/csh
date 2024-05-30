 <!-- Sidebar -->
 <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php 

            if($_SESSION['role'] == 'admin'){
              $img = "images/female-avatar.svg";

            
            }else{
              $img = "images/vendor.png";
            }


?>
            <img src="<?= ROOT ?><?= $img; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= ucfirst($_SESSION['role']); ?></a>
          </div>
        </div>


<nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li>
              <a href="<?= ROOT ?>dashboard.php" class="nav-link <?php if($page == "index"){echo 'active';} ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard

                </p>
              </a>

            </li>
 <?php if($_SESSION['role'] == 'admin'): ?>
            <li class="nav-item">
              <a href="<?= ROOT ?>register.php" class="nav-link <?php if($page == "register"){echo 'active';} ?>">
                <i class="fa fa-user-plus"></i>
                <p> Création d'un compte</p>
              </a>
            </li>

         
            <li class="nav-item">
              <a href="<?= ROOT ?>add.php" class="nav-link <?php if($page == "add"){echo 'active';} ?>">
                <i class="fa fa-briefcase"></i>
                <p>Ajouter un offer</p>
              </a>
            </li>

    
            <li class="nav-item">
              <a href="<?= ROOT ?>offers.php" class="nav-link <?php if($page == "offers"){echo 'active';} ?>">
                <i class="fa fa-cog"></i>
                <p>Offers</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?= ROOT ?>accounts.php" class="nav-link <?php if($page == "accounts"){echo 'active';} ?>">
                <i class="fa fa-users"></i>
                <p> Les comptes</p>
              </a>
            </li>


             <li class="nav-item">
              <a href="<?= ROOT ?>demander.php" class="nav-link <?php if($page == "demandes"){echo 'active';} ?>">
                <i class="fa fa-puzzle-piece"></i>
                <p> Demander</p>
              </a>
            </li>



            <?php endif; ?>


           
            <!-- <li class="nav-item">
              <a href="<?= ROOT ?>pharmaceutique.php" class="nav-link <?php if($page == "pharmaceutique"){echo 'active';} ?>">
                <i class="fa fa-cube"></i>
                <p> Pharmaceutique</p>
              </a>
            </li> -->


            <!-- <li class="nav-item">
              <a href="Parametres.php" class="nav-link <?php if($page == "Parametres"){echo 'active';} ?>">
                <i class="far fa fa-cog"></i>
                <p> Paramètres</p>
              </a>
            </li> -->
            

           <?php if($_SESSION['role'] == 'stagiaire'): ?>

            <li class="nav-item">
              <a href="<?= ROOT ?>stagiaire.php" class="nav-link <?php if($page == "stagiaire"){echo 'active';} ?>">
                <i class="fa fa-cog"></i>
                <p>Stagiaire</p>
              </a>
            </li>



                <li class="nav-item">
              <a href="<?= ROOT ?>offers_stagiaire.php" class="nav-link <?php if($page == "offers"){echo 'active';} ?>">
                <i class="fa fa-cog"></i>
                <p>Offers</p>
              </a>
            </li>

                <li class="nav-item">
              <a href="<?= ROOT ?>mail.php" class="nav-link <?php if($page == "mail"){echo 'active';} ?>">
                <i class="fa fa-envelope"></i>
                <p>Envoyer un email</p>
              </a>
            </li>
            <?php endif; ?> 


            
            <?php if($_SESSION['role'] == 'gestionnaire'): ?>
                <li class="nav-item">
              <a href="<?= ROOT ?>gs_confirm.php" class="nav-link <?php if($page == "offers"){echo 'active';} ?>">
                <i class="fa fa-cog"></i>
                <p>Stage</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= ROOT ?>stager.php" class="nav-link <?php if($page == "stage2"){echo 'active';} ?>">
                <i class="fa fa-blind"></i>
                <p>Stage 2</p>
              </a>
            </li>




            <?php endif; ?> 

            <?php if($_SESSION['role'] == 'encadrant'): ?>
                <li class="nav-item">
              <a href="<?= ROOT ?>gs_offers.php" class="nav-link <?php if($page == "offers"){echo 'active';} ?>">
                <i class="fa fa-cog"></i>
                <p>Offers</p>
              </a>
            </li>

         

            <li class="nav-item">
              <a href="<?= ROOT ?>mes.php" class="nav-link <?php if($page == "mes"){echo 'active';} ?>">
                <i class="fa fa-cog"></i>
                <p>Mes Stager</p>
              </a>
            </li>



            <?php endif; ?> 




            <!-- <?php if($_SESSION['role'] == 'admin'): ?>
            <li class="nav-item">
              <a href="<?= ROOT ?>stock.php" class="nav-link <?php if($page == "stock"){echo 'active';} ?>">
                <i class="fa fa-database"></i>
                <p> Stock</p>
              </a>
            </li> -->

          


        <!--    <li class="nav-item">
              <a href="<?= ROOT ?>vente.php" class="nav-link <?php if($page == "Vente"){echo 'active';} ?>">
                 <i class="fa fa-shopping-cart"></i>
                <p> Vente </p>
              </a>
            </li> -->

            <!-- <li class="nav-item ">
              <a href="<?= ROOT ?>qr/" class="nav-link ">
                * <i class="fa fa-pencil-square-o"></i>
                <p class="text-danger"> Créer QR </p>
              </a>
            </li>

            <?php endif; ?> -->

            



            <li class="nav-item mt-5">
              <a href="<?= ROOT ?>sortie.php" class="nav-link bg-danger">
                <i class="fa fa-arrow-left"></i>
                <p>Sortie</p>
              </a>
            </li>



          </ul>
        </nav>