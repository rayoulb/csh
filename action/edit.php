<?php

include_once "../database/conn.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }
    if (isset($_POST['prix'])) {
        $prix = $_POST['prix'];
    }
    if (isset($_POST['quantité'])) {
        $quantité = $_POST['quantité'];
    }
    if (isset($_POST['expiration'])) {
        $expiration = $_POST['expiration'];
    }



    if (isset($_POST['forme'])) {
        $forme = $_POST['forme'];
    }
    if (isset($_POST['famille'])) {
        $famille = $_POST['famille'];
    }
    if (isset($_POST['lot'])) {
        $lot = $_POST['lot'];
    }

    $insert = mysqli_query($conn, "UPDATE `pharmaceutique` SET `nom`='$nom',`prix`='$prix',`quantité`='$quantité',`expiration`='$expiration',`forme`='$forme',`famille`='$famille',`lot`='$lot' WHERE id = '$id'");
    $insert = mysqli_query($conn, "UPDATE `stock` SET `nom`='$nom',`prix`='$prix',`quantité`='$quantité',`expiration`='$expiration',`forme`='$forme',`famille`='$famille',`lot`='$lot' WHERE id = '$id'");
    $_SESSION['success'] = "Le médicament a été ajouté";
    header('location:../pharmaceutique.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmaceutique</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->

    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
              


                <?php include_once "../inclouds/nav.php"; ?>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pharmaceutique</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                            <thead>
                                                <tr>

                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Photo du médicament</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Nom du médicament</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Prix ​​du médicament</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column descending" aria-sort="ascending">Quantité de médicament</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Date d'expiration du médicament</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">La Forme</th>

                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">La Famille</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Numéro de lot</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $select = mysqli_query($conn, "SELECT * FROM `pharmaceutique` WHERE id = '$id'");

                                                while ($row = mysqli_fetch_assoc($select)) {
                                                ?>


                                                    <form action="" method="post">

                                                        <tr class="odd">
                                                            <td style=""><img width="50" src="../uploads/<?= $row['file']; ?>" alt=""></td>
                                                            <td class="dtr-control"><input class="form-control" type="text" name="nom" value="<?= $row['nom']; ?>" required></td>
                                                            <td><input type="number" name="prix" class="form-control" value="<?= $row['prix']; ?>" required></td>
                                                            <td class="sorting_1"><input class="form-control" type="number" name="quantité" value="<?= $row['quantité']; ?>" required></td>
                                                            <td>
                                                                <input class="form-control" type="text" name="expiration" value="<?= $row['expiration']; ?>" required>
                                                            </td>
                                                            <td> <input class="form-control" type="text" name="forme" value="<?= $row['forme']; ?>" required></td>
                                                            <td> <input class="form-control" type="text" name="famille" value="<?= $row['famille']; ?>" required></td>
                                                            <td> <input class="form-control" type="text" name="lot" value="<?= $row['lot']; ?>" required></td>


                                                        </tr>
                                                    <?php } ?>



                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>

                                        <button type="submit" name="submit" class="btn btn-dark">Enregistrez la modification</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>



                </div>
            </section>

        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>