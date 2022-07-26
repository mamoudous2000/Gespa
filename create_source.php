<?php
      require 'config.php';
	  
	  if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
           {  
                header("location:sign-in.php");  
                session_destroy();
           }  

      if(isset($_POST['insert_source'])){

        $libsource = $_POST['libsource'];

        $statement = $connect->prepare('INSERT INTO  source(libsource) VALUES(?)');
        $statement->BindParam(1, $libsource);
     
   //  $statement->execute()
        if($statement->execute()){ 
            echo "<script language='javascript'>location.href='create_source.php';</script>";
            echo "<script type='text/javascript'> alert('service inséré avec succes');</script>";
        }
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Creer Service | GESPA V1</title>
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

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-orange">
    <?php include("menu_administration.php"); ?>
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
                    SOURCE
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTE DES SOURCES
                            </h2>
                            <div class="align-right">
                                <button type="button" class="btn bg-black waves-effect" data-toggle="modal" data-target="#ajouter">
                                    <i class="material-icons">add_circle_outline</i>
                                    <span>AJOUTER</span>
                                </button>
                            </div>
                                
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Libellé</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Libellé</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sql = 'SELECT * FROM source';   
                                            $req = $connect->query($sql); 
                                            $i=0;
                                            while($donnees = $req->fetch()){
                                            $i++;
                            $idsource = $donnees["idsource"];
                            $libsource = $donnees["libsource"];
                            echo"<tr>";
                            echo "<td>".$idsource."</td><td>".$libsource."</td><td><button type='button' class='btn bg-orange waves-effect' data-toggle='modal' data-target='#modifiersource$i'>
                            <i class='material-icons'>mode_edit</i>
                                    <span>MODIFIER</span></button></td>
                            <td><form method='post' action=''><input type='hidden' name='idservice' value='".$idsource."'/><button type='submit' class='btn bg-black waves-effect' name='supprimersource$i'>
                                    <i class='material-icons'>delete_forever</i>
                                    <span>SUPPRIMER</span>
                                </button></form></td>";
                            echo"</tr>";
                            echo"<div id='modifiersource$i' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='gridModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                            <h4 class='modal-title' id='defaultModalLabel'>Modifier cette source</h4>
                        </div>
                        <form action='create_source.php' method='post'>
                        <div class='modal-body'>
                            
                                <input type='hidden' class='form-control' name='idsource' value='$idsource'>
                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='libsource' value='$libsource' class='form-control'>
                                        <label class='form-label'>Libellé</label>
                                    </div>
                                </div>
                            
                        </div>
                        <div class='modal-footer'>
                            <button type='submit'  name='modifiersource".$i."' class='btn btn-link waves-effect'>ENREGISTRER</button>
                            <button type='button' class='btn btn-link waves-effect' data-dismiss='modal'>FERMER</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>";
          

    if(isset($_POST["modifiersource".$i])){
        $idsource = $_POST["idsource"];
        $libsource = $_POST["libsource"];
           echo "<script language='javascript'>location.href='create_source.php';</script>";
    $statement = $connect->prepare("UPDATE source SET libsource=? WHERE idsource=?");
    $statement->BindParam(1, $libsource);
    $statement->BindParam(2, $idsource);
        if($statement->execute()){ 
        //  header('Location: starter.php')
           echo "<script type='text/javascript'> alert('modification effectué  avec succes')</script>";
}
    }

    if(isset($_POST["supprimersource".$i])){
    $statement = $connect->prepare("DELETE FROM source  WHERE idsource=?");
    $statement->BindParam(1, $_POST['idsource']);
        if($statement->execute()){ 
         // header('Location: starter.php');
            
          echo "<script language='javascript'>location.href='create_source.php';</script>";
          echo "<script language='javascript'> alert('suppression effectué  avec succes')</script>";
}    
                          }
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

        <div class="modal fade" id="ajouter" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Creer une source</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='libsource' class='form-control'>
                                        <label class='form-label'>Libellé</label>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"  name="insert_source" class="btn btn-link waves-effect">ENREGISTRER</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">FERMER</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

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

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>