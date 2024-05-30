<?php
$page ="demandes";

include_once "database/conn.php";

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
                
               


                <?php include_once "inclouds/nav.php" ;?>
                
            </div>
            
        </aside>

        
        <div class="content-wrapper">
            
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Demandes Offers</h1>
                        </div>

                    </div>
                </div>
            </div>
            

            
            <section class="content">
                <div class="container-fluid">
                    <div class="card">

                        
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Eamil</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Service</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Profile</th>
                                               
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sujet</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column descending" aria-sort="ascending">Date de début</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Date Dxpiration</th>

                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">L'état</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $select = mysqli_query($conn, "SELECT * FROM `demander`");
                                                while ($row = mysqli_fetch_assoc($select)) {


                                                ?>



                                                    <tr class="odd">
                                                    <td class="dtr-control"><?= $row['email'];?></td>
                                                        <td class="dtr-control"><?= $row['service'];?></td>
                                                        <td class="sorting_1"><?= $row['profile'];?></td>
                                                        <td><?= $row['sujet'];?></td>
                                                        <td><?= $row['date_de_début'];?></td>

                                                        <td><?=$row['date_dxpiration'];?></td>

                                                        <td>
                                                          <div class="form-group">
                                                 
                                                            <select id="status<?= $row['id']; ?>" onchange="Status('<?= $row['id']; ?>')"  class="form-control" >
                                                                <option disabled selected>L'état</option>
                                                                <option <?php if($row['status'] == 1 ){echo "selected";}  ?> value="1">ACCEPTÉ</option>
                                                                <option <?php if($row['status'] == 2 ){echo "selected";}  ?> value="2">REJETÉ</option>
                                                            </select>
                                                          </div>
                                                        </td>
                                                    
                                                    </tr>
                                                <?php } ?>

                                       
  <script>
        function Status(link_id) {
          
            let status = $("#status" + link_id).val();
            $.ajax({
                url: "action/status_demande.php",
                method: "POST",
                data: "id=" + link_id + "&status=" + status,
                success: function(res) {}
            })
            return false;

        }
    </script>


                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div>



                </div>
            </section>

        </div>


        
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