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
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPmci = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPmci = $statement->rowCount();

         $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPmci = $statement->rowCount();

        if($counttermineDAPmci > 0){
        $tauxomci = ($counttermineDAPmci * 100/$countnbrDAPmci);
    }else
    {
        $tauxomci = 0;
    }

    //OFMS
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPFMS = $statement->rowCount();

         if($counttermineDAPFMS > 0){
        $tauxofmg = ($counttermineDAPFMS * 100/$countnbrDAPFMS);
    }else
    {
        $tauxomfs = 0;
    }

    //OFMG
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPFMG = $statement->rowCount();

        if($counttermineDAPFMG > 0){
        $tauxofmg = ($counttermineDAPFMG * 100/$countnbrDAPFMG);
    }else
    {
        $tauxofmg = 0;
    }


//OFMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPFMM = $statement->rowCount();

        if($counttermineDAPFMM > 0){
        $tauxOFMM = ($counttermineDAPFMM * 100/$countnbrDAPFMM);
    }else
    {
        $tauxOFMM = 0;
    }

    //OMRDC
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPMRDC = $statement->rowCount();

        if($counttermineDAPMRDC > 0){
        $tauxOMRDC = ($counttermineDAPMRDC * 100/$countnbrDAPMRDC);
    }else
    {
        $tauxOMRDC = 0;
    }

    //OMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPMM = $statement->rowCount();

        if($counttermineDAPMM > 0){
        $tauxOMM = ($counttermineDAPMM * 100/$countnbrDAPMM);
    }else
    {
        $tauxOMM = 0;
    }
    //OMBF
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPMBF = $statement->rowCount();

        if($counttermineDAPMBF > 0){
        $tauxOMBF = ($counttermineDAPMBF * 100/$countnbrDAPMBF);
    }else
    {
        $tauxOMBF = 0;
    }

    //OMFSL
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPMFSL = $statement->rowCount();

        if($counttermineDAPMFSL > 0){
        $tauxOMFSL = ($counttermineDAPMFSL * 100/$countnbrDAPMFSL);
    }else
    {
        $tauxOMFSL = 0;
    }
    //OMMA
     $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPMMA = $statement->rowCount();

        if($counttermineDAPMMA > 0){
        $tauxOMMA = ($counttermineDAPMMA * 100/$countnbrDAPMMA);
    }else
    {
        $tauxOMMA = 0;
    }
    //OMLIB
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPMLIB = $statement->rowCount();

        if($counttermineDAPMLIB > 0){
        $tauxOMLIB = ($counttermineDAPMLIB * 100/$countnbrDAPMLIB);
    }else
    {
        $tauxOMLIB = 0;
    }
    //OMBW
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPMBW = $statement->rowCount();

        if($counttermineDAPMBW > 0){
        $tauxOMBW = ($counttermineDAPMBW * 100/$countnbrDAPMBW);
    }else
    {
        $tauxOMBW = 0;
    }
    //OMCM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DAP'");
        $statement->execute();
        $countnbrDAPMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DAP' and action.statutaction =100");
        $statement->execute();
        $counttermineDAPMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DAP' and action.statutaction <100");
        $statement->execute();
        $countencDAPMCM = $statement->rowCount();

        if($counttermineDAPMCM > 0){
        $tauxOMCM = ($counttermineDAPMCM * 100/$countnbrDAPMCM);
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
<!DAPCTYPE html>
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
<?php include("menu_utilisateur_DAP.php"); ?>
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
                            <div class="number"><?php echo $countnbrDAPmci; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPmci; ?></div>
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
                            <div class="number"><?php echo $countencDAPmci; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPFMS; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPFMS; ?></div>
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
                            <div class="number"><?php echo $countencDAPFMS; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPFMG; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPFMG; ?></div>
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
                            <div class="number"><?php echo $countencDAPFMG; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPFMM; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPFMM; ?></div>
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
                            <div class="number"><?php echo $countencDAPFMM; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPMRDC; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPMRDC; ?></div>
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
                            <div class="number"><?php echo $countencDAPMRDC; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPMM; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPMM; ?></div>
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
                            <div class="number"><?php echo $countencDAPMM; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPMBF; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPMBF; ?></div>
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
                            <div class="number"><?php echo $countencDAPMBF; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPMFSL; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPMFSL; ?></div>
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
                            <div class="number"><?php echo $countencDAPMFSL; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPMMA; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPMMA; ?></div>
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
                            <div class="number"><?php echo $countencDAPMMA; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPMLIB; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPMLIB; ?></div>
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
                            <div class="number"><?php echo $countencDAPMLIB; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPMBW; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPMBW; ?></div>
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
                            <div class="number"><?php echo $countencDAPMBW; ?></div>
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
                            <div class="number"><?php echo $countnbrDAPMCM; ?></div>
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
                            <div class="number"><?php echo $counttermineDAPMCM; ?></div>
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
                            <div class="number"><?php echo $countencDAPMCM; ?></div>
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