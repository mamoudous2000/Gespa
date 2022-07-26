<?php
      require 'config.php';

       if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
           {  
                header("location:sign-in.php");  
                session_destroy();
           }  

      if(isset($_POST['insert_user'])){

        $loginuser = $_POST['loginuser'];
        $pwduser = PASSWORD_HASH($_POST["pwduser"], PASSWORD_DEFAULT);
        $emailuser = $_POST['emailuser'];
        $idprofil = $_POST['profil'];

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $pwduser);
        $lowercase = preg_match('@[a-z]@', $pwduser);
        $number    = preg_match('@[0-9]@', $pwduser);
        $specialChars = preg_match('@[^\w]@', $pwduser);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST["pwduser"]) >= 10) {

        $statement = $connect->prepare('INSERT INTO  user(loginuser, pwduser, emailuser, idprofil) VALUES(?,?,?,?)');
        $statement->BindParam(1, $loginuser);
        $statement->BindParam(2, $pwduser);
        $statement->BindParam(3, $emailuser);
        $statement->BindParam(4, $idprofil);
     
   //  $statement->execute()
        if($statement->execute()){ 
            echo "<script type='text/javascript'> alert('user inséré avec succes');</script>";
            echo "<script language='javascript'>location.href='create_utilisateur.php';</script>";
        }
        else{
            echo "<script language='javascript'>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
             echo "<script language='javascript'>location.href='create_utilisateur.php';</script>";
        }
        }
    }
   
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Creer Utilisateur | GESPA V1</title>
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
                    GESTION UTILISATEUR
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LISTE DES UTILISATEUR
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
                                            <th>Login</th>
                                            <th>Email</th>
                                            <th>Profil</th>
                                            <th>Statut</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Login</th>
                                            <th>Email</th>
                                            <th>Profil</th>
                                            <th>Statut</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sql = 'SELECT * FROM user, profil WHERE profil.idprofil = user.idprofil';   
                                            $req = $connect->query($sql); 
                                            $i=0;
                                            while($donnees = $req->fetch()){
                                            $i++;
                            $iduser = $donnees["iduser"];
                            $loginuser = $donnees["loginuser"];
                            $pwduser = $donnees["pwduser"];
                            $emailuser = $donnees["emailuser"];
                            $statutuser = $donnees["statutuser"];
                            $idprofil = $donnees["idprofil"];
                            $libprofil = $donnees["libprofil"];
                            echo"<tr>";
                            echo "<td>".$loginuser."</td><td>".$emailuser."</td><td>".$libprofil."</td><td>".$statutuser."</td><td><button type='button' class='btn bg-orange waves-effect' data-toggle='modal' data-target='#modifieruser$i'>
                            <i class='material-icons'>mode_edit</i>
                                    <span>MODIFIER</span></button></td>
                            <td><form method='post' action=''><input type='hidden' name='iduser' value='".$iduser."'/><button type='submit' class='btn bg-black waves-effect' name='supprimeruser$i'>
                                    <i class='material-icons'>delete_forever</i>
                                    <span>SUPPRIMER</span>
                                </button></form></td>";
                            echo"</tr>";

                            echo"<div id='modifieruser$i' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='gridModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                            <h4 class='modal-title' id='defaultModalLabel'>Modification Utilisateur</h4>
                        </div>
                        <form action='create_utilisateur.php' method='post'>
                        <div class='modal-body'>
                            
                                <input type='hidden' class='form-control' name='iduser' value='$iduser'>
                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='loginuser' value='$loginuser' class='form-control' >
                                        <label class='form-label'>Login</label>
                                    </div>
                                </div>

                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='password'  name='pwduser' value='$pwduser' class='form-control' >
                                        <label class='form-label'>Mot de passe</label>
                                    </div>
                                </div>

                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='emailuser' value='$emailuser' class='form-control' >
                                        <label class='form-label'>E-mail</label>
                                    </div>
                                </div>

                                <div class='row clearfix'>
                                <div class='col-sm-12'>
                                    <select class='form-control show-tick' name='idprofil'>";
                                        $sql1 = 'SELECT * FROM profil';   
                                        $req1 = $connect->query($sql1);  
                                        while($donnees = $req1->fetch()){
                                            echo"<option value='".$donnees['idprofil']."'>".$donnees['libprofil']."</option>";}
                                            echo "</select>
                                </div>
                            </div>

                            <div class='row clearfix'>
                                <div class='col-sm-12'>
                                    <select class='form-control show-tick' name='statutuser'>
                                        <option name='statutuser' value='$statutuser'>$statutuser</option>
                                        <option name='statutuser' value='activer'>activer</option>
                                        <option name='statutuser' value='desactiver'>desactiver</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class='modal-footer'>
                            <button type='submit'  name='modifieruser".$i."' class='btn btn-link waves-effect'>ENREGISTRER</button>
                            <button type='button' class='btn btn-link waves-effect' data-dismiss='modal'>FERMER</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>";


            if(isset($_POST["modifieruser".$i])){
                $loginuser = $_POST['loginuser'];
                $pwduser = PASSWORD_HASH($_POST["pwduser"], PASSWORD_DEFAULT);
                $emailuser =  $_POST['emailuser'];
                $statutuser =  $_POST['statutuser'];
                $idprofil =  $_POST['idprofil'];
                $iduser = $_POST['iduser'];

                  // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $pwduser);
        $lowercase = preg_match('@[a-z]@', $pwduser);
        $number    = preg_match('@[0-9]@', $pwduser);
        $specialChars = preg_match('@[^\w]@', $pwduser);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST["pwduser"]) >= 10) {

    $statement = $connect->prepare("UPDATE user SET loginuser=?,pwduser=?,emailuser=?,statutuser=?,idprofil=? WHERE iduser=?");
    $statement->BindParam(1, $loginuser);
    $statement->BindParam(2, $pwduser);
    $statement->BindParam(3, $emailuser);
    $statement->BindParam(4, $statutuser);
    $statement->BindParam(5, $idprofil);
    $statement->BindParam(6, $iduser);
        if($statement->execute()){ 
        //  header('Location: starter.php')

           echo "<script type='text/javascript'> alert('modification effectué  avec succes')</script>";
           echo "<script language='javascript'>location.href='create_utilisateur.php';</script>";
           
}
 else{
            echo "<script language='javascript'>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
             echo "<script language='javascript'>location.href='create_utilisateur.php';</script>";
        }
    }

       }     
          
    if(isset($_POST["supprimeruser".$i])){
    $statement = $connect->prepare("DELETE FROM user  WHERE iduser=?");
    $statement->BindParam(1, $_POST['iduser']);
        if($statement->execute()){ 
         // header('Location: starter.php');

          echo "<script language='javascript'> alert('suppression effectué  avec succes')</script>";            
          echo "<script language='javascript'>location.href='create_utilisateur.php';</script>";
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
                            <h4 class="modal-title" id="defaultModalLabel">Creer un utilisateur</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                    <input type='hidden' class='form-control' name='iduser'>
                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='text'  name='loginuser' class='form-control' >
                                        <label class='form-label'>Login</label>
                                    </div>
                                </div>

                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='Password'  name='pwduser' class='form-control' >
                                        <label class='form-label'>Password</label>
                                    </div>
                                </div>

                                <div class='form-group form-float'>
                                    <div class='form-line'>
                                        <input type='e-mail' name='emailuser' class='form-control' >
                                        <label class='form-label'>E-mail</label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name="profil">
                                        <option name="profil" value="">-- Selectionner un profil --</option>
                                        <?php
                                            $statement = $connect->prepare("SELECT  * FROM profil");
                                            $statement->execute();
                                            $resultats=$statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($resultats as $resultat){

                                        ?>
                                        <option value=<?=$resultat['idprofil']?>><?=$resultat['libprofil']?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit"  name="insert_user" class="btn btn-link waves-effect">ENREGISTRER</button>
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