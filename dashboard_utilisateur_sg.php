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
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGmci = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGmci = $statement->rowCount();

         $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGmci = $statement->rowCount();

        if($counttermineSGmci > 0){
        $tauxomci = ($counttermineSGmci * 100/$countnbrSGmci);
    }else
    {
        $tauxomci = 0;
    }

    //OFMS
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGFMS = $statement->rowCount();

         if($counttermineSGFMS > 0){
        $tauxofmg = ($counttermineSGFMS * 100/$countnbrSGFMS);
    }else
    {
        $tauxomfs = 0;
    }

    //OFMG
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGFMG = $statement->rowCount();

        if($counttermineSGFMG > 0){
        $tauxofmg = ($counttermineSGFMG * 100/$countnbrSGFMG);
    }else
    {
        $tauxofmg = 0;
    }


//OFMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGFMM = $statement->rowCount();

        if($counttermineSGFMM > 0){
        $tauxOFMM = ($counttermineSGFMM * 100/$countnbrSGFMM);
    }else
    {
        $tauxOFMM = 0;
    }

    //OMRDC
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGMRDC = $statement->rowCount();

        if($counttermineSGMRDC > 0){
        $tauxOMRDC = ($counttermineSGMRDC * 100/$countnbrSGMRDC);
    }else
    {
        $tauxOMRDC = 0;
    }

    //OMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGMM = $statement->rowCount();

        if($counttermineSGMM > 0){
        $tauxOMM = ($counttermineSGMM * 100/$countnbrSGMM);
    }else
    {
        $tauxOMM = 0;
    }
    //OMBF
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGMBF = $statement->rowCount();

        if($counttermineSGMBF > 0){
        $tauxOMBF = ($counttermineSGMBF * 100/$countnbrSGMBF);
    }else
    {
        $tauxOMBF = 0;
    }

    //OMFSL
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGMFSL = $statement->rowCount();

        if($counttermineSGMFSL > 0){
        $tauxOMFSL = ($counttermineSGMFSL * 100/$countnbrSGMFSL);
    }else
    {
        $tauxOMFSL = 0;
    }
    //OMMA
     $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGMMA = $statement->rowCount();

        if($counttermineSGMMA > 0){
        $tauxOMMA = ($counttermineSGMMA * 100/$countnbrSGMMA);
    }else
    {
        $tauxOMMA = 0;
    }
    //OMLIB
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGMLIB = $statement->rowCount();

        if($counttermineSGMLIB > 0){
        $tauxOMLIB = ($counttermineSGMLIB * 100/$countnbrSGMLIB);
    }else
    {
        $tauxOMLIB = 0;
    }
    //OMBW
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGMBW = $statement->rowCount();

        if($counttermineSGMBW > 0){
        $tauxOMBW = ($counttermineSGMBW * 100/$countnbrSGMBW);
    }else
    {
        $tauxOMBW = 0;
    }
    //OMCM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='SG'");
        $statement->execute();
        $countnbrSGMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='SG' and action.statutaction =100");
        $statement->execute();
        $counttermineSGMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='SG' and action.statutaction <100");
        $statement->execute();
        $countencSGMCM = $statement->rowCount();

        if($counttermineSGMCM > 0){
        $tauxOMCM = ($counttermineSGMCM * 100/$countnbrSGMCM);
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
<!SGCTYPE html>
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
<?php include("menu_utilisateur_SG.php"); ?>
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
                            <div class="number"><?php echo $countnbrSGmci; ?></div>
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
                            <div class="number"><?php echo $counttermineSGmci; ?></div>
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
                            <div class="number"><?php echo $countencSGmci; ?></div>
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
                            <div class="number"><?php echo $countnbrSGFMS; ?></div>
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
                            <div class="number"><?php echo $counttermineSGFMS; ?></div>
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
                            <div class="number"><?php echo $countencSGFMS; ?></div>
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
                            <div class="number"><?php echo $countnbrSGFMG; ?></div>
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
                            <div class="number"><?php echo $counttermineSGFMG; ?></div>
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
                            <div class="number"><?php echo $countencSGFMG; ?></div>
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
                            <div class="number"><?php echo $countnbrSGFMM; ?></div>
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
                            <div class="number"><?php echo $counttermineSGFMM; ?></div>
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
                            <div class="number"><?php echo $countencSGFMM; ?></div>
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
                            <div class="number"><?php echo $countnbrSGMRDC; ?></div>
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
                            <div class="number"><?php echo $counttermineSGMRDC; ?></div>
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
                            <div class="number"><?php echo $countencSGMRDC; ?></div>
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
                            <div class="number"><?php echo $countnbrSGMM; ?></div>
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
                            <div class="number"><?php echo $counttermineSGMM; ?></div>
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
                            <div class="number"><?php echo $countencSGMM; ?></div>
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
                            <div class="number"><?php echo $countnbrSGMBF; ?></div>
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
                            <div class="number"><?php echo $counttermineSGMBF; ?></div>
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
                            <div class="number"><?php echo $countencSGMBF; ?></div>
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
                            <div class="number"><?php echo $countnbrSGMFSL; ?></div>
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
                            <div class="number"><?php echo $counttermineSGMFSL; ?></div>
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
                            <div class="number"><?php echo $countencSGMFSL; ?></div>
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
                            <div class="number"><?php echo $countnbrSGMMA; ?></div>
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
                            <div class="number"><?php echo $counttermineSGMMA; ?></div>
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
                            <div class="number"><?php echo $countencSGMMA; ?></div>
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
                            <div class="number"><?php echo $countnbrSGMLIB; ?></div>
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
                            <div class="number"><?php echo $counttermineSGMLIB; ?></div>
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
                            <div class="number"><?php echo $countencSGMLIB; ?></div>
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
                            <div class="number"><?php echo $countnbrSGMBW; ?></div>
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
                            <div class="number"><?php echo $counttermineSGMBW; ?></div>
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
                            <div class="number"><?php echo $countencSGMBW; ?></div>
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
                            <div class="number"><?php echo $countnbrSGMCM; ?></div>
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
                            <div class="number"><?php echo $counttermineSGMCM; ?></div>
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
                            <div class="number"><?php echo $countencSGMCM; ?></div>
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