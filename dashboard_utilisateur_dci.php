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
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCImci = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCImci = $statement->rowCount();

         $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCI' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCImci = $statement->rowCount();

        if($counttermineDCImci > 0){
        $tauxomci = ($counttermineDCImci * 100/$countnbrDCImci);
    }else
    {
        $tauxomci = 0;
    }

    //OFMS
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMS' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIFMS = $statement->rowCount();

         if($counttermineDCIFMS > 0){
        $tauxofmg = ($counttermineDCIFMS * 100/$countnbrDCIFMS);
    }else
    {
        $tauxomfs = 0;
    }

    //OFMG
        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMG' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIFMG = $statement->rowCount();

        if($counttermineDCIFMG > 0){
        $tauxofmg = ($counttermineDCIFMG * 100/$countnbrDCIFMG);
    }else
    {
        $tauxofmg = 0;
    }


//OFMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OFMM' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIFMM = $statement->rowCount();

        if($counttermineDCIFMM > 0){
        $tauxOFMM = ($counttermineDCIFMM * 100/$countnbrDCIFMM);
    }else
    {
        $tauxOFMM = 0;
    }

    //OMRDC
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMRDC' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIMRDC = $statement->rowCount();

        if($counttermineDCIMRDC > 0){
        $tauxOMRDC = ($counttermineDCIMRDC * 100/$countnbrDCIMRDC);
    }else
    {
        $tauxOMRDC = 0;
    }

    //OMM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMM' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIMM = $statement->rowCount();

        if($counttermineDCIMM > 0){
        $tauxOMM = ($counttermineDCIMM * 100/$countnbrDCIMM);
    }else
    {
        $tauxOMM = 0;
    }
    //OMBF
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBF' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIMBF = $statement->rowCount();

        if($counttermineDCIMBF > 0){
        $tauxOMBF = ($counttermineDCIMBF * 100/$countnbrDCIMBF);
    }else
    {
        $tauxOMBF = 0;
    }

    //OMFSL
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMFSL' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIMFSL = $statement->rowCount();

        if($counttermineDCIMFSL > 0){
        $tauxOMFSL = ($counttermineDCIMFSL * 100/$countnbrDCIMFSL);
    }else
    {
        $tauxOMFSL = 0;
    }
    //OMMA
     $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMMA' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIMMA = $statement->rowCount();

        if($counttermineDCIMMA > 0){
        $tauxOMMA = ($counttermineDCIMMA * 100/$countnbrDCIMMA);
    }else
    {
        $tauxOMMA = 0;
    }
    //OMLIB
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMLIB' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIMLIB = $statement->rowCount();

        if($counttermineDCIMLIB > 0){
        $tauxOMLIB = ($counttermineDCIMLIB * 100/$countnbrDCIMLIB);
    }else
    {
        $tauxOMLIB = 0;
    }
    //OMBW
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMBW' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIMBW = $statement->rowCount();

        if($counttermineDCIMBW > 0){
        $tauxOMBW = ($counttermineDCIMBW * 100/$countnbrDCIMBW);
    }else
    {
        $tauxOMBW = 0;
    }
    //OMCM
    $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DCI'");
        $statement->execute();
        $countnbrDCIMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DCI' and action.statutaction =100");
        $statement->execute();
        $counttermineDCIMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action, porteur, pays where action.idPorteur = porteur.idPorteur and pays.idpays = action.idpays and pays.libpays ='OMCM' and porteur.libporteur ='DCI' and action.statutaction <100");
        $statement->execute();
        $countencDCIMCM = $statement->rowCount();

        if($counttermineDCIMCM > 0){
        $tauxOMCM = ($counttermineDCIMCM * 100/$countnbrDCIMCM);
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
<!DCICTYPE html>
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
<?php include("menu_utilisateur_DCI.php"); ?>
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
                            <div class="number"><?php echo $countnbrDCImci; ?></div>
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
                            <div class="number"><?php echo $counttermineDCImci; ?></div>
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
                            <div class="number"><?php echo $countencDCImci; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIFMS; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIFMS; ?></div>
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
                            <div class="number"><?php echo $countencDCIFMS; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIFMG; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIFMG; ?></div>
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
                            <div class="number"><?php echo $countencDCIFMG; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIFMM; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIFMM; ?></div>
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
                            <div class="number"><?php echo $countencDCIFMM; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIMRDC; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIMRDC; ?></div>
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
                            <div class="number"><?php echo $countencDCIMRDC; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIMM; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIMM; ?></div>
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
                            <div class="number"><?php echo $countencDCIMM; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIMBF; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIMBF; ?></div>
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
                            <div class="number"><?php echo $countencDCIMBF; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIMFSL; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIMFSL; ?></div>
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
                            <div class="number"><?php echo $countencDCIMFSL; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIMMA; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIMMA; ?></div>
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
                            <div class="number"><?php echo $countencDCIMMA; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIMLIB; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIMLIB; ?></div>
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
                            <div class="number"><?php echo $countencDCIMLIB; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIMBW; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIMBW; ?></div>
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
                            <div class="number"><?php echo $countencDCIMBW; ?></div>
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
                            <div class="number"><?php echo $countnbrDCIMCM; ?></div>
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
                            <div class="number"><?php echo $counttermineDCIMCM; ?></div>
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
                            <div class="number"><?php echo $countencDCIMCM; ?></div>
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