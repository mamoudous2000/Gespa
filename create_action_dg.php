<?php
      require 'config.php';  

      if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
           {  
                header("location:sign-in.php");  
                session_destroy();
           }  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>POINT D'ACTION | GESPA V1</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SweetAlert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-orange">
    <?php include("menu_utilisateur_dg.php"); ?>
<?php
        if(isset($errMsg)){
                    echo'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   '.$errMsg.'
                    </div>';
        }
    ?>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    GESTION PA
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTE DES PLANS D'ACTION
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Libelle P.A</th>
                                            <th>Source</th>
                                            <th>Porteur</th>
                                            <th>Nature</th>
                                            <th>Emetteur</th>
                                            <th>Date de création</th>
                                            <th>Delai (Echeance)</th>
                                            <th>Taux (%)</th>
                                            <th>Commentaire</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>Libelle P.A</th>
                                            <th>Source</th>
                                            <th>Porteur</th>
                                            <th>Nature</th>
                                            <th>Emetteur</th>
                                            <th>Date de création</th>
                                            <th>Delai (Echeance)</th>
                                            <th>Taux (%)</th>
                                            <th>Commentaire</th>
                                            <th>Statut</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sql = 'SELECT * FROM action, porteur, source, user, pays, nature WHERE action.idporteur = porteur.idporteur and action.idpays = pays.idpays and action.idsource = source.idsource and action.iduser = user.iduser and action.idnature = nature.idnature';   
                                            $req = $connect->query($sql); 
                                            $i=0;
                                            while($donnees = $req->fetch()){
                                            $i++;
                             $idaction = $donnees["idaction"];
                            $libaction = $donnees["libaction"];
                            $delaiaction = $donnees["delaiaction"];
                            $datecreaction = $donnees["datecreaction"];
                            $statutaction = $donnees["statutaction"];
                            $comaction = $donnees["comaction"];
                            $idPorteur = $donnees["idPorteur"];
                            $libporteur = $donnees["libporteur"];
                            $idsource = $donnees["idsource"];
                            $libsource = $donnees["libsource"];
                            $idpays = $donnees["idpays"];
                            $libpays = $donnees["libpays"];
                            $idnature = $donnees["idnature"];
                            $libnature = $donnees["libnature"];


                            $var = '';  
                            if ($statutaction == '100' ){
                            $var = '<h4><span class="label label-success">Terminé</span></h4>';
                            }elseif($statutaction == '0'){
                            $var = '<h4><span class="label label-danger">Non débuté</span></h4>';
                            }else{
                            $var = '<h4><span class="label bg-orange">En cours</span></h4>';
                            }    
                            echo"<tr>";
                            echo "<td>".$libaction."</td><td>".$libsource."</td><td>".$libporteur."</td><td>".$libnature."</td><td>".$libpays."</td><td>".$datecreaction."</td><td>".$delaiaction."</td><td>".$statutaction." %</td><td>".$comaction."</td><td>".$var."</td>";
                            echo"</tr>";

                          }
        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Select Plugin Js -->
    <!--<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>