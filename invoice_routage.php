<?php
      require 'config.php';
	  $statement = $connect->prepare("SELECT idRoutage FROM routage GROUP BY idRoutage");
      $statement->execute();
      $countRoutage = $statement->rowCount();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Imprimer le routage | Lucarne - V2</title>
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

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	
	<!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-orange">
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

    <section class="content-fluid">
	<form action="invoice_routage.php" method="POST">
        <div class="container-fluid">
            <div class="block-header">
                <img class="img-responsive thumbnail align-left col-lg-1 col-md-1 col-sm-1 col-xs-1" src="images/orange.png">
				<div class="align-right">
                 <strong>OT N°<?php echo $countRoutage;?></strong>
            </div>
            </div>
            <!-- Basic Example -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-orange">
                            <small>
                                <strong>INFORMATION SUR L'ORDRE DE TRAVAIL</strong> 
                            </small>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <p class="align-center col-orange">
                                        <small><strong>1.INFORMATION DEMANDEUR</strong></small>
                                    
                                            <div class="form-line"><small>
                                                <label class="form-label">DATE :</label>
												<label class="form-label"><?php echo $_SESSION['datecreatedemande'];?></label></small>
                                            </div>

                                       
                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">DEMANDEUR :</label>
											<label class="form-label"><?php echo $_SESSION['porteurdemande'];?></label>
                                        </small>
                                    </div>
            
                                 <div class="form-line">
                                            <small>
                                                <label class="form-label">FIXE DEMANDEUR : </label>
												<label class="form-label"><?php echo $_SESSION['tefixedemande'];?></label>
                                            </small>
                                        </div>

                                <div class="form-line">
                                            <small>
                                                <label class="form-label">MOBILE DEMANDEUR :</label>
												<label class="form-label"><?php echo $_SESSION['telmobiledemande'];?></label>
                                            </small>
                                        </div>

                                <div class="form-line">
                                            <small>
                                                <label class="form-label">EMAIL DEMANDEUR : </label>
												<label class="form-label"><?php echo $_SESSION['email'];?></label>
                                            </small>
                                        </div>

                                <div class="form-line">
                                            <small>
                                                <label class="form-label">DIRECTION DEMANDEUR : </label>
												<label class="form-label"><?php echo $_SESSION["directdemande"];?></label>
                                            </small>
                                        </div>

                                 <div class="form-line">
                                            <small>
                                                <label class="form-label">DEPARTEMENT DEMANDEUR :</label>
												<label class="form-label"><?php echo $_SESSION['departdemande'];?></label>
                                            </small>
                                        </div>
							
                                </div>

                                <div class="col-md-6">
                                    <p class="align-center col-black">
                                        <small><strong>2.INFORMATION CLIENT</strong></small>
                                    
                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">NOM DU CLIENT :</label>
											<label class="form-label"><?php echo $_SESSION['clientdemande'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">ADRESSE DU CLIENT :</label>
											<label class="form-label"><?php echo $_SESSION['adrcltdemande'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                            <small>
                                                <label class="form-label">TELEPHONE DU CLIENT: </label>
												<label class="form-label"><?php echo $_SESSION['telcltdemande'];?></label>
                                            </small>
                                        </div>
                                </div>
								</p>
                            </div>
                            <p class="align-center col-orange">
                                        <small><strong>3.INFORMATION RESSOURCES DEMANDEES</strong></small>
                                    </p>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">NOM DU PROJET :</label>
                                            <label class="form-label"><?php echo $_SESSION['nomprojdemande'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">EXTREMITE A :</label>
                                            <label class="form-label"><?php echo $_SESSION['extremAdemande'];?></label>
                                        </div>
                                    </small>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">TYPE DE RESSOURCE : </label>
                                            <label class="form-label"><?php echo $_SESSION['nomtype_ressource'];?></label>
                                        </small>
                                    </div>


                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">SERVICE :</label>
                                            <label class="form-label"><?php echo $_SESSION['nomservice'];?></label>
                                        </small>
                                    </div>

                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">DATE DE LIVRAISON :</label>
											<label class="form-label"><?php echo $_SESSION['datelivredemande'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">EXTREMITE B :</label>
                                            <label class="form-label"><?php echo $_SESSION['extremBdemande'];?></label>
                                        </small>
                                    </div>

                                   <div class="form-line">
                                        <small>
                                            <label class="form-label">DEBIT :</label>
                                            <label class="form-label"><?php echo $_SESSION['debitdemande'];?></label>
                                        </small>
                                    </div>
                                </div>
                            </div>
							
                            <p class="align-center col-orange">
                                        <small><strong>4.INFORMATION ROUTAGE UGR</strong></small>
                                    
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">REFERENCE OT :</label>
                                            <label class="form-label"><?php echo $_SESSION['nomroutage'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">DESTINATAIRE :</label>
                                            <label class="form-label"><?php echo $_SESSION['destroutage'];?></label>
                                        </small>
                                    </div>

                                </div>
                                
                                <div class="col-md-6">
                                     <div class="form-line">
                                        <small>
                                            <label class="form-label">NOM DU CIRCUIT :</label>
                                            <label class="form-label"><?php echo $_SESSION['nomaugestroutage'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">SECURISATION :</label>
                                            <label class="form-label"><?php echo $_SESSION['securoutage'];?></label>
                                        </small>
                                    </div>
                                </div>
                            </div>
						</p>

							<p class="align-center col-orange">
                                        <strong><small>INFORMATION SITE A</small></strong>
                                    
							<div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">EXTREMITE A :</label>
                                            <label class="form-label"><?php echo $_SESSION['extremiteA'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">ELEMENT RESEAU A :</label>
                                            <label class="form-label"><?php echo $_SESSION['elementreseauA'];?></label>
                                        </small>
                                    </div>
									
									<div class="form-line">
                                        <small>
                                            <label class="form-label">SLOT/CARTE A :</label>
                                            <label class="form-label"><?php echo $_SESSION['slotA'];?></label>
                                        </small>
                                    </div>

                                </div>
                                
                                <div class="col-md-6">
                                     <div class="form-line">
                                        <small>
                                            <label class="form-label">CARTE A :</label>
                                            <label class="form-label"><?php echo $_SESSION['carteA'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">PORT A :</label>
                                            <label class="form-label"><?php echo $_SESSION['numportA'];?></label>
                                        </small>
                                    </div>
									
									<div class="form-line">
                                        <small>
                                            <label class="form-label">DEBIT(mbit/s) :</label>
                                            <label class="form-label"><?php echo $_SESSION['debitportA'];?></label>
                                        </small>
                                    </div>
									
									<div class="form-line">
                                        <small>
                                            <label class="form-label">INFORMATION SUPPLEMENTAIRE :</label>
                                            <label class="form-label"><?php echo $_SESSION['ametA'];?></label>
                                        </small>
                                    </div>
                                </div>
                            </div>
							</p>

                            <p class="align-center col-orange">
                                        <strong><small>INFORMATION SITE B</small></strong>
                                    
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">EXTREMITE B :</label>
                                            <label class="form-label"><?php echo $_SESSION['extremiteB'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">ELEMENT RESEAU B :</label>
                                            <label class="form-label"><?php echo $_SESSION['elementreseauB'];?></label>
                                        </small>
                                    </div>
									
									<div class="form-line">
                                        <small>
                                            <label class="form-label">SLOT/CARTE B :</label>
                                            <label class="form-label"><?php echo $_SESSION['slotB'];?></label>
                                        </small>
                                    </div>

                                </div>
                                
                                <div class="col-md-6">
                                     <div class="form-line">
                                        <small>
                                            <label class="form-label">CARTE B :</label>
                                            <label class="form-label"><?php echo $_SESSION['carteB'];?></label>
                                        </small>
                                    </div>

                                    <div class="form-line">
                                        <small>
                                            <label class="form-label">PORT B :</label>
                                            <label class="form-label"><?php echo $_SESSION['numportB'];?></label>
                                        </small>
                                    </div>
									
									<div class="form-line">
                                        <small>
                                            <label class="form-label">DEBIT B(mbit/s) :</label>
                                            <label class="form-label"><?php echo $_SESSION['debitportB'];?></label>
                                        </small>
                                    </div>
									
									<div class="form-line">
                                        <small>
                                            <label class="form-label">INFORMATION SUPPLEMENTAIRE :</label>
                                            <label class="form-label"><?php echo $_SESSION['ametB'];?></label>
                                        </small>
                                    </div>
                                </div>
                            </div>
							</p>

                            <div class="row clearfix">
                                <div class="col-sm-6">
								<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TDC A
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered"><small>
                                <thead>
                                        <tr>
                                            <th>Nom du TDC</th>
                                            <th>Segment du TDC</th>
                                            <th>N°</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                        <?php
                                         $sql = "SELECT * FROM TDC_FO, brin WHERE brin.idTDC_FO = TDC_FO.idTDC_FO 
										 and statutbrin='desactiver' and idRoute ='".$_SESSION['idRoutage']."' and position = 'A'";   
                                            $req = $connect->query($sql); 
                                            $i=0;
										while($donnees = $req->fetch()){
                                            $i++;
                            $nomTDC_FO = $donnees["nomTDC_FO"];
                            $segTDC_FO = $donnees["segTDC_FO"];
                            $numerobrin = $donnees["numerobrin"];
                            echo"<tr>";
                            echo "<td>".$nomTDC_FO."</td><td>".$segTDC_FO."</td><td>".$numerobrin."</td>";
                            echo"</tr>";
                          }
                                        ?>
                                    </tbody>
                            </small></table>
                        </div>
                    </div>
                </div>
            </div>
							</div>
                                <div class="col-sm-6">
                                    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TDC B
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered"><small>
                                <thead>
                                        <tr>
                                            <th>Nom du TDC</th>
                                            <th>Segment du TDC</th>
                                            <th>N°</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                        <?php
                                         $sql = "SELECT * FROM TDC_FO, brin WHERE brin.idTDC_FO = TDC_FO.idTDC_FO 
										 and statutbrin='desactiver' and idRoute ='".$_SESSION['idRoutage']."' and position = 'B'";   
                                            $req = $connect->query($sql); 
                                            $i=0;
										while($donnees = $req->fetch()){
                                            $i++;
                            $nomTDC_FO = $donnees["nomTDC_FO"];
                            $segTDC_FO = $donnees["segTDC_FO"];
                            $numerobrin = $donnees["numerobrin"];
                            echo"<tr>";
                            echo "<td>".$nomTDC_FO."</td><td>".$segTDC_FO."</td><td>".$numerobrin."</td>";
                            echo"</tr>";
                          }
                                        ?>
                                    </tbody>
                            </small></table>
                        </div>
                    </div>
                </div>
            </div>
                                </div>
								</div>
									
						   <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SENS NORMAL
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered"><small>
                                <thead>
                                        <tr>
                                            <th>Connexion-Physique</th>
                                            <th>AU4</th>
                                            <th>VC3</th>
											<th>E1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $sql = "SELECT * FROM e1, VC3, AU4, connexion_physique WHERE e1.idVC3 = VC3.idVC3 and VC3.AU4_idAU4 = AU4.idAU4 
										 and AU4.idconn_phys = connexion_physique.idconn_phys and statutE1 = 'desactiver' and sens='normal' and idRoute ='".$_SESSION['idRoutage']."'";   
                                            $req = $connect->query($sql); 
                                            $i=0;
										while($donnees = $req->fetch()){
                                            $i++;
                            $nomconn_phys = $donnees["nomconn_phys"];
							$libAU4 = $donnees["libAU4"];
                            $libVC3 = $donnees["libVC3"];
                            $idE1 = $donnees["idE1"];
							$libE1 = $donnees["libE1"]; 
                            echo"<tr>";
                            echo "<td>".$nomconn_phys."</td><td>".$libAU4."</td><td>".$libVC3."</td><td>".$libE1."</td>";
                            echo"</tr>";
                          }
                                        ?>
                                    </tbody>
                            </small></table>
                        </div>
                    </div>
                </div>
            </div>
						
                            
							<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SENS DE PROTECTION
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered"><small>
                                <thead>
                                        <tr>
                                            <th>Connexion-Physique</th>
                                            <th>AU4</th>
                                            <th>VC3</th>
											<th>E1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $sql = "SELECT * FROM e1, VC3, AU4, connexion_physique WHERE e1.idVC3 = VC3.idVC3 and VC3.AU4_idAU4 = AU4.idAU4 
										 and AU4.idconn_phys = connexion_physique.idconn_phys and statutE1 = 'desactiver' and sens='protection' and idRoute ='".$_SESSION['idRoutage']."'";   
                                            $req = $connect->query($sql); 
                                            $i=0;
										while($donnees = $req->fetch()){
                                            $i++;
                            $nomconn_phys = $donnees["nomconn_phys"];
							$libAU4 = $donnees["libAU4"];
                            $libVC3 = $donnees["libVC3"];
                            $idE1 = $donnees["idE1"];
							$libE1 = $donnees["libE1"]; 
                            echo"<tr>";
                            echo "<td>".$nomconn_phys."</td><td>".$libAU4."</td><td>".$libVC3."</td><td>".$libE1."</td>";
                            echo"</tr>";
                          }
                                        ?>
                                    </tbody>
                            </small></table>
                        </div>
                    </div>
                </div>
            </div>
			
			<p class="align-center">
                                <a href="test.php" type="submit" id="impression" name="impression" class="btn bg-green waves-effect ecran">
                                    <span>IMPRIMER</span>
									<i class="material-icons">print</i>
									
                                </a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Colored Card - With Loading -->
        </div>

			 </form>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

	
	<script type="text/javascript">
            function imprimer_page(){
            window.print();
             }
        </script>
		
		<style> 
    @media print{   
        .ecran 
            {display: none;}
        }
< /style>


    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>
	
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

    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <script src="js/pages/forms/basic-form-elements.js"></script>


    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>
</html>