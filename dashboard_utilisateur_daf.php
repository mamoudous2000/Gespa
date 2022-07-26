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
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFmci = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFmci = $statement->rowCount();

         $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFmci = $statement->rowCount();

        if($counttermineDAFmci > 0){
        $tauxomci = ($counttermineDAFmci * 100/$countnbrDAFmci);
    }else
    {
        $tauxomci = 0;
    }

    //OFMS
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFFMS = $statement->rowCount();

         if($counttermineDAFFMS > 0){
        $tauxofmg = ($counttermineDAFFMS * 100/$countnbrDAFFMS);
    }else
    {
        $tauxomfs = 0;
    }

    //OFMG
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFFMG = $statement->rowCount();

        if($counttermineDAFFMG > 0){
        $tauxofmg = ($counttermineDAFFMG * 100/$countnbrDAFFMG);
    }else
    {
        $tauxofmg = 0;
    }


//OFMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFFMM = $statement->rowCount();

        if($counttermineDAFFMM > 0){
        $tauxOFMM = ($counttermineDAFFMM * 100/$countnbrDAFFMM);
    }else
    {
        $tauxOFMM = 0;
    }

    //OMRDC
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFMRDC = $statement->rowCount();

        if($counttermineDAFMRDC > 0){
        $tauxOMRDC = ($counttermineDAFMRDC * 100/$countnbrDAFMRDC);
    }else
    {
        $tauxOMRDC = 0;
    }

    //OMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFMM = $statement->rowCount();

        if($counttermineDAFMM > 0){
        $tauxOMM = ($counttermineDAFMM * 100/$countnbrDAFMM);
    }else
    {
        $tauxOMM = 0;
    }
    //OMBF
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFMBF = $statement->rowCount();

        if($counttermineDAFMBF > 0){
        $tauxOMBF = ($counttermineDAFMBF * 100/$countnbrDAFMBF);
    }else
    {
        $tauxOMBF = 0;
    }

    //OMFSL
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFMFSL = $statement->rowCount();

        if($counttermineDAFMFSL > 0){
        $tauxOMFSL = ($counttermineDAFMFSL * 100/$countnbrDAFMFSL);
    }else
    {
        $tauxOMFSL = 0;
    }
    //OMMA
     $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFMMA = $statement->rowCount();

        if($counttermineDAFMMA > 0){
        $tauxOMMA = ($counttermineDAFMMA * 100/$countnbrDAFMMA);
    }else
    {
        $tauxOMMA = 0;
    }
    //OMLIB
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFMLIB = $statement->rowCount();

        if($counttermineDAFMLIB > 0){
        $tauxOMLIB = ($counttermineDAFMLIB * 100/$countnbrDAFMLIB);
    }else
    {
        $tauxOMLIB = 0;
    }
    //OMBW
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFMBW = $statement->rowCount();

        if($counttermineDAFMBW > 0){
        $tauxOMBW = ($counttermineDAFMBW * 100/$countnbrDAFMBW);
    }else
    {
        $tauxOMBW = 0;
    }
    //OMCM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DAF'");
        $statement->execute();
        $countnbrDAFMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DAF' and action.statutaction =100");
        $statement->execute();
        $counttermineDAFMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DAF' and action.statutaction <100");
        $statement->execute();
        $countencDAFMCM = $statement->rowCount();

        if($counttermineDAFMCM > 0){
        $tauxOMCM = ($counttermineDAFMCM * 100/$countnbrDAFMCM);
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
<!DAFCTYPE html>
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
<?php include("menu_utilisateur_DAF.php"); ?>
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
                            <div class="number"><?php echo $countnbrDAFmci; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFmci; ?></div>
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
                            <div class="number"><?php echo $countencDAFmci; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFFMS; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFFMS; ?></div>
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
                            <div class="number"><?php echo $countencDAFFMS; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFFMG; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFFMG; ?></div>
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
                            <div class="number"><?php echo $countencDAFFMG; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFFMM; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFFMM; ?></div>
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
                            <div class="number"><?php echo $countencDAFFMM; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFMRDC; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFMRDC; ?></div>
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
                            <div class="number"><?php echo $countencDAFMRDC; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFMM; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFMM; ?></div>
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
                            <div class="number"><?php echo $countencDAFMM; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFMBF; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFMBF; ?></div>
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
                            <div class="number"><?php echo $countencDAFMBF; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFMFSL; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFMFSL; ?></div>
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
                            <div class="number"><?php echo $countencDAFMFSL; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFMMA; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFMMA; ?></div>
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
                            <div class="number"><?php echo $countencDAFMMA; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFMLIB; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFMLIB; ?></div>
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
                            <div class="number"><?php echo $countencDAFMLIB; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFMBW; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFMBW; ?></div>
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
                            <div class="number"><?php echo $countencDAFMBW; ?></div>
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
                            <div class="number"><?php echo $countnbrDAFMCM; ?></div>
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
                            <div class="number"><?php echo $counttermineDAFMCM; ?></div>
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
                            <div class="number"><?php echo $countencDAFMCM; ?></div>
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