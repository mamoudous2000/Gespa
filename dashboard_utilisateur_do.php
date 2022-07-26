<?php
      require 'config.php';

      if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
           {  
                header("location:sign-in.php");  
                session_destroy();
           }  
           else  
           {  
                $_SESSION['last_login_timestamp'] = time(); 
           }  

      //OMCI
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdomci = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedomci = $statement->rowCount();

         $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdomci = $statement->rowCount();

        if($countterminedomci > 0){
        $tauxomci = ($countterminedomci * 100/$countnbrdomci);
    }else
    {
        $tauxomci = 0;
    }

    //OFMS
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOFMS = $statement->rowCount();

         if($countterminedOFMS > 0){
        $tauxofmg = ($countterminedOFMS * 100/$countnbrdOFMS);
    }else
    {
        $tauxomfs = 0;
    }

    //OFMG
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOFMG = $statement->rowCount();

        if($countterminedOFMG > 0){
        $tauxofmg = ($countterminedOFMG * 100/$countnbrdOFMG);
    }else
    {
        $tauxofmg = 0;
    }


//OFMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOFMM = $statement->rowCount();

        if($countterminedOFMM > 0){
        $tauxOFMM = ($countterminedOFMM * 100/$countnbrdOFMM);
    }else
    {
        $tauxOFMM = 0;
    }

    //OMRDC
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOMRDC = $statement->rowCount();

        if($countterminedOMRDC > 0){
        $tauxOMRDC = ($countterminedOMRDC * 100/$countnbrdOMRDC);
    }else
    {
        $tauxOMRDC = 0;
    }

    //OMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOMM = $statement->rowCount();

        if($countterminedOMM > 0){
        $tauxOMM = ($countterminedOMM * 100/$countnbrdOMM);
    }else
    {
        $tauxOMM = 0;
    }
    //OMBF
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOMBF = $statement->rowCount();

        if($countterminedOMBF > 0){
        $tauxOMBF = ($countterminedOMBF * 100/$countnbrdOMBF);
    }else
    {
        $tauxOMBF = 0;
    }

    //OMFSL
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOMFSL = $statement->rowCount();

        if($countterminedOMFSL > 0){
        $tauxOMFSL = ($countterminedOMFSL * 100/$countnbrdOMFSL);
    }else
    {
        $tauxOMFSL = 0;
    }
    //OMMA
     $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOMMA = $statement->rowCount();

        if($countterminedOMMA > 0){
        $tauxOMMA = ($countterminedOMMA * 100/$countnbrdOMMA);
    }else
    {
        $tauxOMMA = 0;
    }
    //OMLIB
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOMLIB = $statement->rowCount();

        if($countterminedOMLIB > 0){
        $tauxOMLIB = ($countterminedOMLIB * 100/$countnbrdOMLIB);
    }else
    {
        $tauxOMLIB = 0;
    }
    //OMBW
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOMBW = $statement->rowCount();

        if($countterminedOMBW > 0){
        $tauxOMBW = ($countterminedOMBW * 100/$countnbrdOMBW);
    }else
    {
        $tauxOMBW = 0;
    }
    //OMCM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DO'");
        $statement->execute();
        $countnbrdOMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DO' and action.statutaction =100");
        $statement->execute();
        $countterminedOMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DO' and action.statutaction <100");
        $statement->execute();
        $countencdOMCM = $statement->rowCount();

        if($countterminedOMCM > 0){
        $tauxOMCM = ($countterminedOMCM * 100/$countnbrdOMCM);
    }else
    {
        $tauxOMCM = 0;
    }


	  /*$statement = $connect->prepare("SELECT * FROM demande, type_ressource, service, routage, user WHERE user.iduser = demande.iduser and
											routage.iddemande = demande.iddemande and demande.idtype_ressource = type_ressource.idtype_ressource and 
											demande.idservice = service.idservice and etatroutage='cloturer' and user.iduser ='".$_SESSION['iduser']."'");
      $statement->execute();
      $countdemandecloturer = $statement->rowCount();
	  
	  $statement = $connect->prepare("SELECT * FROM demande WHERE statutdemande='rejeter' and iduser ='".$_SESSION['iduser']."'");
      $statement->execute();
      $countdemanderejeter = $statement->rowCount();

      $statement = $connect->prepare("SELECT * FROM demande, type_ressource, service, routage, user WHERE user.iduser = demande.iduser and
											routage.iddemande = demande.iddemande and demande.idtype_ressource = type_ressource.idtype_ressource and 
											demande.idservice = service.idservice and statutdemande='encours' and user.iduser ='".$_SESSION['iduser']."'");
      $statement->execute();
      $countdemandeencours = $statement->rowCount();*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Dashboard Utilisateur | GESPA V1</title>
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

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-orange">
<?php include("menu_utilisateur_do.php"); ?>
<?php
        if(isset($errMsg)){
                    echo'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   '.$errMsg.'
                    </div>';
        }
    ?>
    <section class="content">
        <!-- Hover Expand Effect -->
            <div class="block-header">
                <h2><b>OMCI</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdomci; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedomci; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdomci; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxomci; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

            <!-- Hover Expand Effect -->
            <div class="block-header">
                <h2><b>OMFS</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOFMS; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOFMS; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOFMS; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxomfs; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

<!-- Hover Expand Effect -->
            <div class="block-header">
                <h2><b>OFMG</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOFMG; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOFMG; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOFMG; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxofmg; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

            <!-- Hover Expand Effect -->
            <div class="block-header">
                <h2><b>OFMM</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOFMM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOFMM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOFMM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOFMM; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

            <!-- Hover Expand Effect -->
            <div class="block-header">
                <h2><b>OMRDC</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOMRDC; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOMRDC; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOMRDC; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOMRDC; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

            <!-- Hover Expand Effect -->
            <div class="block-header">
                <h2><b>OMM</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOMM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOMM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOMM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOMM; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

             <!-- Hover Expand Effect -->
            <div class="block-header">
                <h2><b>OMBF</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOMBF; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOMBF; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOMBF; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOMBF; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

            <div class="block-header">
                <h2><b>OMFSL</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOMFSL; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOMFSL; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOMFSL; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOMFSL; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

            <!-- #END# Hover Expand Effect -->

            <div class="block-header">
                <h2><b>OMMA</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOMMA; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOMMA; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOMMA; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOMMA; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

             <!-- #END# Hover Expand Effect -->

            <div class="block-header">
                <h2><b>OMLIB</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOMLIB; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOMLIB; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOMLIB; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOMLIB; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

            <!-- #END# Hover Expand Effect -->

            <div class="block-header">
                <h2><b>OMBW</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOMBW; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOMBW; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOMBW; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOMBW; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->

            <!-- #END# Hover Expand Effect -->

            <div class="block-header">
                <h2><b>OMCM</b></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <div class="content">
                            <div class="text">NBRE TOTAL</div>
                            <div class="number"><?php echo $countnbrdOMCM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">TERMINE</div>
                            <div class="number"><?php echo $countterminedOMCM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">EN COURS</div>
                            <div class="number"><?php echo $countencdOMCM; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">poll</i>
                        </div>
                        <div class="content">
                            <div class="text">TAUX EN %</div>
                            <div class="number"><?php echo $tauxOMCM; ?> %</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Expand Effect -->
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

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Chart Plugins Js -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/charts/chartjs.js"></script>


    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>