<?php

      require 'config.php';

      if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
           {  
                header("location:sign-in.php");  
                session_destroy();
           }  

      if(isset($_POST['insert_action'])){

        $libaction = $_POST['libaction'];
        $delaiaction = $_POST['delaiaction'];
        $statutaction = $_POST['statutaction'];
        $comaction = $_POST['comaction'];
        $iduser = $_SESSION['iduser'];
        $idsource = $_POST['idsource'];
        $idPorteur = $_POST['idPorteur'];
        $idpays = $_POST['idpays'];


        $statement = $connect->prepare('INSERT INTO  action(libaction, delaiaction, statutaction, comaction, iduser, idsource, idPorteur, idpays) VALUES(?,?,?,?,?,?,?,?)');
        $statement->BindParam(1, $libaction);
        $statement->BindParam(2, $delaiaction);
        $statement->BindParam(3, $statutaction);
        $statement->BindParam(4, $comaction);
        $statement->BindParam(5, $iduser);
        $statement->BindParam(6, $idsource);
        $statement->BindParam(7, $idPorteur);
        $statement->BindParam(8, $idpays);
     
   //  $statement->execute()
        if($statement->execute()){ 
            echo "<script language='javascript'>location.href='create_action.php';</script>";
            echo "<script type='text/javascript'> alert('site inséré avec succes');</script>";
        }
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
    <?php include("menu_utilisateur.php"); ?>
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
                                LISTE DES POINT D'ACTION
                            </h2>
                            <div class="align-right">
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#ajouter">
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
                                            <th>Libelle P.A</th>
                                            <th>Source</th>
                                            <th>Porteur</th>
                                            <th>Pays</th>
                                            <th>Delai (Echeance)</th>
                                            <th>Taux (%)</th>
                                            <th>Commentaire</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>#</th>
                                            <th>Libelle P.A</th>
                                            <th>Source</th>
                                            <th>Porteur</th>
                                            <th>Pays</th>
                                            <th>Delai (Echeance)</th>
                                            <th>Taux (%)</th>
                                            <th>Commentaire</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sql = 'SELECT * FROM action, porteur, source, user, pays WHERE action.idporteur = porteur.idporteur and action.idpays = pays.idpays and action.idsource = source.idsource and action.iduser = user.iduser';   
                                            $req = $connect->query($sql); 
                                            $i=0;
                                            while($donnees = $req->fetch()){
                                            $i++;
                            $idaction = $donnees["idaction"];
                            $libaction = $donnees["libaction"];
                            $delaiaction = $donnees["delaiaction"];
                            $statutaction = $donnees["statutaction"];
                            $comaction = $donnees["comaction"];
                            $idPorteur = $donnees["idPorteur"];
                            $libporteur = $donnees["libporteur"];
                            $idsource = $donnees["idsource"];
                            $libsource = $donnees["libsource"];
                            $idpays = $donnees["idpays"];
                            $libpays = $donnees["libpays"];

                            $var = '';  
                            if ($statutaction == '100' ){
                            $var = '<h4><span class="label label-success">Terminé</span></h4>';
                            }elseif($statutaction == '0'){
                            $var = '<h4><span class="label label-danger">Non débuté</span></h4>';
                            }else{
                            $var = '<h4><span class="label bg-orange">En cours</span></h4>';
                            }    
                            echo"<tr>";
                            echo "<td>".$idaction."</td><td>".$libaction."</td><td>".$libsource."</td><td>".$libporteur."</td><td>".$libpays."</td><td>".$delaiaction."</td><td>".$statutaction." %</td><td>".$comaction."</td><td>".$var."</td><td><button type='button' class='btn bg-blue waves-effect' data-toggle='modal' data-target='#modifieraction$i'>
                            <i class='material-icons'>mode_edit</i>
                                    <span>MODIFIER</span></button></td>";
                            echo"</tr>";

                            echo"<div id='modifieraction$i' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='gridModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                            <h4 class='modal-title' id='defaultModalLabel'>Modification Action</h4>
                        </div>
                        <form action='create_action.php' method='post'>
                        <div class='modal-body'>
                            
                                <input type='hidden' class='form-control' name='idaction' value='$idaction'>
                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='libaction' value='$libaction' class='form-control' >
                                        <label class='form-label'>Libellé action</label>
                                    </div>
                                </div>

                                <div class='row clearfix'>
                                <div class='col-sm-12'>
                                    <select class='form-control show-tick' name='idsource'>";
                                        $sql1 = 'SELECT * FROM source';   
                                        $req1 = $connect->query($sql1);  
                                        while($donnees = $req1->fetch()){
                                            echo"<option value='".$donnees['idsource']."'>".$donnees['libsource']."</option>";}
                                            echo "</select>
                                </div>
                            </div>

                            <div class='row clearfix'>
                                <div class='col-sm-12'>
                                    <select class='form-control show-tick' name='idPorteur'>";
                                        $sql2 = 'SELECT * FROM porteur';   
                                        $req2 = $connect->query($sql2);  
                                        while($donnees = $req2->fetch()){
                                            echo"<option value='".$donnees['idPorteur']."'>".$donnees['libporteur']."</option>";}
                                            echo "</select>
                                </div>
                            </div>

                             <div class='row clearfix'>
                                <div class='col-sm-12'>
                                    <select class='form-control show-tick' name='idpays'>";
                                        $sql3 = 'SELECT * FROM pays';   
                                        $req3 = $connect->query($sql3);  
                                        while($donnees = $req3->fetch()){
                                            echo"<option value='".$donnees['idpays']."'>".$donnees['libpays']."</option>";}
                                            echo "</select>
                                </div>
                            </div>


                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='date'  name='delaiaction' value='$delaiaction' class='form-control' >
                                        <label class='form-label'>Delai</label>
                                    </div>
                                </div>

                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='statutaction' value='$statutaction' class='form-control' >
                                        <label class='form-label'>Taux (%)</label>
                                    </div>
                                </div>

                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='comaction' value='$comaction' class='form-control' >
                                        <label class='form-label'>Commentaire</label>
                                    </div>
                                </div>

                        </div>
                        <div class='modal-footer'>
                            <button type='submit'  name='modifieraction".$i."' class='btn btn-link waves-effect'>ENREGISTRER</button>
                            <button type='button' class='btn btn-link waves-effect' data-dismiss='modal'>FERMER</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>";


            if(isset($_POST["modifieraction".$i])){
                $idaction = $_POST['idaction'];
                $libaction = $_POST['libaction'];
                $delaiaction =  $_POST['delaiaction'];
                $statutaction =  $_POST['statutaction'];
                $comaction =  $_POST['comaction'];
                $idPorteur = $_POST['idPorteur'];
                $idsource =  $_POST['idsource'];
                $idpays = $_POST['idpays'];
                echo "<script language='javascript'>location.href='create_action.php';</script>";
    $statement = $connect->prepare("UPDATE action SET libaction=?,delaiaction=?,statutaction=?,comaction=?,idPorteur=?,idsource=?,idpays=? WHERE idaction=?");
    $statement->BindParam(1, $libaction);
    $statement->BindParam(2, $delaiaction);
    $statement->BindParam(3, $statutaction);
    $statement->BindParam(4, $comaction);
    $statement->BindParam(5, $idPorteur);
    $statement->BindParam(6, $idsource);
    $statement->BindParam(7, $idpays);
    $statement->BindParam(8, $idaction);
        if($statement->execute()){ 
        //  header('Location: starter.php')
           echo "<script type='text/javascript'> alert('modification effectué  avec succes')</script>";
           
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
                            <h4 class="modal-title" id="defaultModalLabel">Creer un P.A</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                    <input type='hidden' class='form-control' name='idaction'>
                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='libaction' class='form-control' >
                                        <label class='form-label'>Libellé action</label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name="idsource">
                                        <option name="idsource" value="">-- Selectionner une source --</option>
                                        <?php
                                            $statement = $connect->prepare("SELECT  * FROM source");
                                            $statement->execute();
                                            $resultats=$statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($resultats as $resultat){

                                        ?>
                                        <option value=<?=$resultat['idsource']?>><?=$resultat['libsource']?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <br>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name="idPorteur">
                                        <option name="idPorteur" value="">-- Selectionner un porteur --</option>
                                        <?php
                                            $statement = $connect->prepare("SELECT  * FROM porteur");
                                            $statement->execute();
                                            $resultats=$statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($resultats as $resultat){

                                        ?>
                                        <option value=<?=$resultat['idPorteur']?>><?=$resultat['libporteur']?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <br>

                             <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name="idpays">
                                        <option name="idpays" value="">-- Selectionner un pays --</option>
                                        <?php
                                            $statement = $connect->prepare("SELECT  * FROM pays");
                                            $statement->execute();
                                            $resultats=$statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($resultats as $resultat){

                                        ?>
                                        <option value=<?=$resultat['idpays']?>><?=$resultat['libpays']?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <br>
                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='Date'  name='delaiaction' class='form-control'>
                                    </div>
                                </div>

                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text' name='statutaction' class='form-control' >
                                        <label class='form-label'>Taux (%)</label>
                                    </div>
                                </div>

                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='textarea' name='comaction' class='form-control' >
                                        <label class='form-label'>Commentaire</label>
                                    </div>
                                </div>

                         
                            </div>
                        <div class="modal-footer">
                            <button type="submit"  name="insert_action" class="btn btn-link waves-effect">ENREGISTRER</button>
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