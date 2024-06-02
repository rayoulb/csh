<?php

$page = "index";
include_once "database/conn.php";


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
              <h1 class="m-0">Dashboard</h1>
            </div>

          </div>
        </div>
      </div>

      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM `users` WHERE role = 'encadrant'");

                  echo mysqli_num_rows($select);
                  ?>
                </h3>

                <p>Encadrants</p>
              </div>
              <div class="icon">
                <i class="fa fa fa-user-secret"></i>


              </div>

            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM `users` WHERE role = 'stagiaire'");

                  echo mysqli_num_rows($select);
                  ?>
                </h3>

                <p>Stagiaires</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>

            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM `users` WHERE role = 'gestionnaire'");

                  echo mysqli_num_rows($select);
                  ?>
                </h3>

                <p>Gestionnaires</p>
              </div>
              <div class="icon">
                <i class="fa fa-th-large"></i>
              </div>

            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>

                  <?php
                  $select = mysqli_query($conn, "SELECT *  FROM `users`");

                  echo mysqli_num_rows($select);
                  ?>

                </h3>

                <p>Tous les utilisateurs</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>

            </div>
          </div>




          <section class="cart section--lg container">
            <form action="" method="POST" class="form grid">
              <div class="table-container" id="cart">
                <div class="table-container">





                  <?php
                  $email = $_SESSION['email'];

                  $select = mysqli_query($conn, "SELECT * FROM `demander` WHERE email ='$email'");

                  while ($row = mysqli_fetch_assoc($select)) {
                    if ($row['end_stg'] == 1) {
                      echo '<a class="btn btn-success btn-sm " href="uploads/file.pdf" download=""><i class="fa fa-download" aria-hidden="true"></i>
Attestation de stage</a>';
                    }
                  }


                  ?>




                </div>









          </section>

          <script>
            const qtyInputs = document.querySelectorAll('.qtyInput');
            const minusBtns = document.querySelectorAll('.minus-btn');
            const addBtns = document.querySelectorAll('.add-btn');
            const priceInputs = document.querySelectorAll('.price');

            const totalEl = document.querySelector('#total');
            const saveBtn = document.querySelector('#save');
            const clearCartBtn = document.querySelector('#clear');

            let totalPrice = 0;

            // Load saved values on page load
            window.addEventListener('DOMContentLoaded', () => {
              loadValues();
              updateTotal();
            });

            for (let index = 0; index < qtyInputs.length; index++) {
              const qtyInput = qtyInputs[index];
              const addBtn = addBtns[index];
              const minusBtn = minusBtns[index];
              const priceInput = priceInputs[index];

              let qty, price;

              addBtn.addEventListener('click', (e) => {
                qty = Number(qtyInput.value);
                price = Number(priceInput.value);
                qtyInput.value = qty + 1;
                updateTotal();
                saveValues();
              });

              minusBtn.addEventListener('click', (e) => {
                qty = Number(qtyInput.value);
                if (qty > 1) {
                  qtyInput.value = qty - 1;
                  updateTotal();
                  saveValues();
                }
              });

              qtyInput.addEventListener('input', () => {
                updateTotal();
                saveValues();
              });
            }

            function updateTotal() {
              let sum = 0;
              for (let i = 0; i < qtyInputs.length; i++) {
                const qty = Number(qtyInputs[i].value);
                const price = Number(priceInputs[i].value);
                sum += qty * price;
              }
              totalEl.innerText = sum;
            }

            function saveValues() {
              const values = [];
              for (let i = 0; i < qtyInputs.length; i++) {
                values.push({
                  qty: qtyInputs[i].value,
                  price: priceInputs[i].value
                });
              }
              localStorage.setItem('cartValues', JSON.stringify(values));
            }

            function clearSave() {
              localStorage.removeItem('cartValues');
            }

            function loadValues() {
              const savedValues = localStorage.getItem('cartValues');
              if (savedValues) {
                const values = JSON.parse(savedValues);
                console.log('Retrieved values:', values); // Debugging line
                if (Array.isArray(values)) {
                  for (let i = 0; i < qtyInputs.length; i++) {
                    qtyInputs[i].value = values[i].qty; // Assuming price doesn't change, so no need to update price input
                  }
                } else {
                  console.error('Saved values have unexpected structure.');
                }
              }
            }


            // Save Cart Values
            saveBtn.addEventListener('click', (e) => {
              e.preventDefault();
              saveValues();
              alert('Saved!'); //Show saved alert here
            });

            // Clear Cart
            clearCartBtn.addEventListener('click', async (e) => {
              e.preventDefault();
              await clearSave(); //clear localstorage
              await (window.location.href = 'clear.php'); //then redirect to clear.php
            });
          </script>


        </div>


        <div class="row">

        </div>

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
