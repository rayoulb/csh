<?php
$page = "offers";

include_once "database/conn.php";


if (isset($_GET['email'])) {
    $email = $_GET['email'];
}


if (isset($_POST['submit'])) {

    if (isset($_POST['initiative'])) {
        $initiative = $_POST['initiative'];
    }
    if (isset($_POST['connaissances'])) {
        $connaissances = $_POST['connaissances'];
    }
    if (isset($_POST['qualité'])) {
        $qualité = $_POST['qualité'];
    }
    if (isset($_POST['rapidité'])) {
        $rapidité = $_POST['rapidité'];
    }
    if (isset($_POST['ordre'])) {
        $ordre = $_POST['ordre'];
    }
    if (isset($_POST['capacité'])) {
        $capacité = $_POST['capacité'];
    }
    if (isset($_POST['appréciations'])) {
        $appréciations = $_POST['appréciations'];
    }

    $insert = mysqli_query($conn, "INSERT INTO `fiches`( `initiative`, `connaissances`, `qualité`, `rapidité`, `ordre`, `capacité`, `appréciations`, `email`) 
VALUES ('$initiative','$connaissances','$qualité','$rapidité','$ordre','$capacité','$appréciations','$email')");

    header('location:fiche.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demandes</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



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
                            <h1 class="m-0">Fiche d'évaluation</h1>
                        </div>

                    </div>
                </div>
            </div>



            <section class="content">
                <div class="container-fluid">






                    <form action="" method="post">

                        <table class="table table-light">
                            <tbody>
                                <tr>
                                    <th>Fiche d'évaluation</th>
                                    <th class="bg-primary">Exc</th>
                                    <th class="bg-primary">T.B</th>
                                    <th class="bg-primary">Sf</th>
                                    <th class="bg-primary">Ins</th>
                                </tr>
                                <tr>
                                    <th>Initiative</th>
                                    <th><input type="checkbox" name="initiative" onclick="selectOnlyThis1(this.id)" id="initiative1" value="exc"></th>
                                    <th><input type="checkbox" name="initiative" onclick="selectOnlyThis1(this.id)" id="initiative2" value="t.b"></th>
                                    <th><input type="checkbox" name="initiative" onclick="selectOnlyThis1(this.id)" id="initiative3" value="sf"></th>
                                    <th><input type="checkbox" name="initiative" onclick="selectOnlyThis1(this.id)" id="initiative4" value="ins"></th>
                                </tr>

                                <tr>
                                    <th>Connaissances professionnelles</th>
                                    <th><input type="checkbox" name="connaissances" onclick="selectOnlyThis2(this.id)" id="connaissances1" value="exc"></th>
                                    <th><input type="checkbox" name="connaissances" onclick="selectOnlyThis2(this.id)" id="connaissances2" value="t.b"></th>
                                    <th><input type="checkbox" name="connaissances" onclick="selectOnlyThis2(this.id)" id="connaissances3" value="sf"></th>
                                    <th><input type="checkbox" name="connaissances" onclick="selectOnlyThis2(this.id)" id="connaissances4" value="ins"></th>
                                </tr>

                                <tr>
                                    <th>Qualité des traveaux pratiques</th>
                                    <th><input type="checkbox" name="qualité" onclick="selectOnlyThis3(this.id)" id="qualité1" value="exc"></th>
                                    <th><input type="checkbox" name="qualité" onclick="selectOnlyThis3(this.id)" id="qualité2" value="t.b"></th>
                                    <th><input type="checkbox" name="qualité" onclick="selectOnlyThis3(this.id)" id="qualité3" value="sf"></th>
                                    <th><input type="checkbox" name="qualité" onclick="selectOnlyThis3(this.id)" id="qualité4" value="ins"></th>
                                </tr>

                                <tr>
                                    <th>Rapidité</th>
                                    <th><input type="checkbox" name="rapidité" id="rapidité1" onclick="selectOnlyThis4(this.id)" value="exc"></th>
                                    <th><input type="checkbox" name="rapidité" id="rapidité2" onclick="selectOnlyThis4(this.id)" value="t.b"></th>
                                    <th><input type="checkbox" name="rapidité" id="rapidité3" onclick="selectOnlyThis4(this.id)" value="sf"></th>
                                    <th><input type="checkbox" name="rapidité" id="rapidité4" onclick="selectOnlyThis4(this.id)" value="ins"></th>
                                </tr>

                                <tr>
                                    <th>Ordre-Méthode-Propreté</th>
                                    <th><input type="checkbox" name="ordre" id="ordre1" onclick="selectOnlyThis5(this.id)" value="exc"></th>
                                    <th><input type="checkbox" name="ordre" id="ordre2" onclick="selectOnlyThis5(this.id)" value="t.b"></th>
                                    <th><input type="checkbox" name="ordre" id="ordre3" onclick="selectOnlyThis5(this.id)" value="sf"></th>
                                    <th><input type="checkbox" name="ordre" id="ordre4" onclick="selectOnlyThis5(this.id)" value="ins"></th>
                                </tr>
                                <tr>
                                    <th>Capacité d'adaptation</th>
                                    <th><input type="checkbox" name="capacité" id="capacité1" onclick="selectOnlyThis6(this.id)" value="exc"></th>
                                    <th><input type="checkbox" name="capacité" id="capacité2" onclick="selectOnlyThis6(this.id)" value="t.b"></th>
                                    <th><input type="checkbox" name="capacité" id="capacité3" onclick="selectOnlyThis6(this.id)" value="sf"></th>
                                    <th><input type="checkbox" name="capacité" id="capacité4" onclick="selectOnlyThis6(this.id)" value="ins"></th>
                                </tr>

                            </tbody>
                        </table>



                        <div class="form-group">
                            <label for="my-textarea">Appréciations globale</label>
                            <textarea id="appréciations" class="form-control" name="appréciations" rows="3" required></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>

                    </form>
                </div>
            </section>

        </div>

        <script>
            function selectOnlyThis1(id) {
                for (var i = 1; i <= 4; i++) {
                    document.getElementById("initiative" + i).checked = false;
                }
                document.getElementById(id).checked = true;
            }

            function selectOnlyThis2(id) {
                for (var i = 1; i <= 4; i++) {
                    document.getElementById("connaissances" + i).checked = false;
                }
                document.getElementById(id).checked = true;
            }

            function selectOnlyThis3(id) {
                for (var i = 1; i <= 4; i++) {
                    document.getElementById("qualité" + i).checked = false;
                }
                document.getElementById(id).checked = true;
            }

            function selectOnlyThis4(id) {
                for (var i = 1; i <= 4; i++) {
                    document.getElementById("rapidité" + i).checked = false;
                }
                document.getElementById(id).checked = true;
            }

            function selectOnlyThis5(id) {
                for (var i = 1; i <= 4; i++) {
                    document.getElementById("ordre" + i).checked = false;
                }
                document.getElementById(id).checked = true;
            }

            function selectOnlyThis6(id) {
                for (var i = 1; i <= 4; i++) {
                    document.getElementById("capacité" + i).checked = false;
                }
                document.getElementById(id).checked = true;
            }
        </script>



        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>



    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

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

    <script src="dist/js/adminlte.min.js"></script>

    <script src="dist/js/demo.js"></script>

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