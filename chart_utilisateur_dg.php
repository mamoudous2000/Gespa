<?php
      require 'config.php';

      if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
           {  
                header("location:sign-in.php");  
                session_destroy();
           }  
      //OMCI
        $statement = $connect->prepare("SELECT * FROM action,  pays where pays.idpays = action.idpays and pays.libpays ='OMCI' ");
        $statement->execute();
        $countnbrDCImci = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMCI'  and action.statutaction =100");
        $statement->execute();
        $counttermineDCImci = $statement->rowCount();

         $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMCI'  and action.statutaction <100");
        $statement->execute();
        $countencDCImci = $statement->rowCount();


        if($counttermineDCImci > 0){
                  $tauxomci = ($counttermineDCImci*100/$countnbrDCImci);

    }else
    {
        $tauxomci = 0;
    }
      

    //OFMS
        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMS' ");
        $statement->execute();
        $countnbrDCIFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMS'  and action.statutaction =100");
        $statement->execute();
        $counttermineDCIFMS = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMS'  and action.statutaction <100");
        $statement->execute();
        $countencDCIFMS = $statement->rowCount();

        if($counttermineDCIFMS > 0){
                $tauxomfs = ($counttermineDCIFMS*100/$countnbrDCIFMS);
    }else
    {
        $tauxomfs = 0;
    }

    //OFMG
        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMG' ");
        $statement->execute();
        $countnbrDCIFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMG'  and action.statutaction =100");
        $statement->execute();
        $counttermineDCIFMG = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMG'  and action.statutaction <100");
        $statement->execute();
        $countencDCIFMG = $statement->rowCount();

        if($counttermineDCIFMG > 0){
        $tauxofmg = ($counttermineDCIFMG * 100/$countnbrDCIFMG);
    }else
    {
        $tauxofmg = 0;
    }

    //OFMM
        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMM' ");
        $statement->execute();
        $countnbrOFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMM'  and action.statutaction =100");
        $statement->execute();
        $counttermineOFMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OFMM'  and action.statutaction <100");
        $statement->execute();
        $countencOFMM = $statement->rowCount();

        if($counttermineOFMM > 0){
        $tauxOFMM = ($counttermineOFMM * 100/$countnbrOFMM);
    }else
    {
        $tauxOFMM = 0;
    }

    //OMRDC
        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMRDC' ");
        $statement->execute();
        $countnbrOMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMRDC'  and action.statutaction =100");
        $statement->execute();
        $counttermineOMRDC = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMRDC'  and action.statutaction <100");
        $statement->execute();
        $countencOMRDC = $statement->rowCount();

        if($counttermineOMRDC > 0){
        $tauxOMRDC = ($counttermineOMRDC * 100/$countnbrOMRDC);
    }else
    {
        $tauxOMRDC = 0;
    }

    //OMM
        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMM' ");
        $statement->execute();
        $countnbrOMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMM'  and action.statutaction =100");
        $statement->execute();
        $counttermineOMM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMM'  and action.statutaction <100");
        $statement->execute();
        $countencOMM = $statement->rowCount();

        if($counttermineOMM > 0){
        $tauxOMM = ($counttermineOMM * 100/$countnbrOMM);
    }else
    {
        $tauxOMM = 0;
    }

    //OMBF
        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMBF' ");
        $statement->execute();
        $countnbrOMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMBF'  and action.statutaction =100");
        $statement->execute();
        $counttermineOMBF = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMBF'  and action.statutaction <100");
        $statement->execute();
        $countencOMBF = $statement->rowCount();

        if($counttermineOMBF > 0){
        $tauxOMBF = ($counttermineOMBF * 100/$countnbrOMBF);
    }else
    {
        $tauxOMBF = 0;
    }

    //OMFSL
        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMFSL' ");
        $statement->execute();
        $countnbrOMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMFSL'  and action.statutaction =100");
        $statement->execute();
        $counttermineOMFSL = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMFSL'  and action.statutaction <100");
        $statement->execute();
        $countencOMFSL = $statement->rowCount();

        if($counttermineOMFSL > 0){
        $tauxOMFSL = ($counttermineOMFSL * 100/$countnbrOMFSL);
    }else
    {
        $tauxOMFSL = 0;
    }

    //OMMA
    $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMMA' ");
        $statement->execute();
        $countnbrOMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMMA'  and action.statutaction =100");
        $statement->execute();
        $counttermineOMMA = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMMA'  and action.statutaction <100");
        $statement->execute();
        $countencOMMA = $statement->rowCount();

        if($counttermineOMMA > 0){
        $tauxOMMA = ($counttermineOMMA * 100/$countnbrOMMA);
    }else
    {
        $tauxOMMA = 0;
    }

    //OMLIB
    $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMLIB' ");
        $statement->execute();
        $countnbrOMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMLIB'  and action.statutaction =100");
        $statement->execute();
        $counttermineOMLIB = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMLIB'  and action.statutaction <100");
        $statement->execute();
        $countencOMLIB = $statement->rowCount();

        if($counttermineOMLIB > 0){
        $tauxOMLIB = ($counttermineOMLIB * 100/$countnbrOMLIB);
    }else
    {
        $tauxOMLIB = 0;
    }

    //OMBW
    $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMBW' ");
        $statement->execute();
        $countnbrOMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMBW'  and action.statutaction =100");
        $statement->execute();
        $counttermineOMBW = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMBW'  and action.statutaction <100");
        $statement->execute();
        $countencOMBW = $statement->rowCount();

        if($counttermineOMBW > 0){
        $tauxOMBW = ($counttermineOMBW * 100/$countnbrOMBW);
    }else
    {
        $tauxOMBW = 0;
    }

    //OMCM
    $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMCM' ");
        $statement->execute();
        $countnbrOMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMCM'  and action.statutaction =100");
        $statement->execute();
        $counttermineOMCM = $statement->rowCount();

        $statement = $connect->prepare("SELECT * FROM action,  pays where  pays.idpays = action.idpays and pays.libpays ='OMCM'  and action.statutaction <100");
        $statement->execute();
        $countencOMCM = $statement->rowCount();

        if($counttermineOMCM > 0){
        $tauxOMCM = ($counttermineOMCM * 100/$countnbrOMCM);
    }else
    {
        $tauxOMCM = 0;
    }

$dataPoints = array(
    array("label"=> "OMCI", "y"=> $countnbrDCImci),
    array("label"=> "OFMS", "y"=> $countnbrDCIFMS),
    array("label"=> "OFMG", "y"=> $countnbrDCIFMG),
    array("label"=> "OFMM", "y"=> $countnbrOFMM),
    array("label"=> "OMRDC", "y"=> $countnbrOMRDC),
    array("label"=> "OMM", "y"=> $countnbrOMM),
    array("label"=> "OMBF", "y"=> $countnbrOMBF),
    array("label"=> "OMFSL", "y"=> $countnbrOMFSL),
    array("label"=> "OMMA", "y"=> $countnbrOMMA),
    array("label"=> "OMLIB", "y"=> $countnbrOMLIB),
    array("label"=> "OMBW", "y"=> $countnbrOMBW),
    array("label"=> "OMCM", "y"=> $countnbrOMCM)
    );

$dataPoints1 = array(
    array("label"=> "OMCI", "y"=> $counttermineDCImci),
    array("label"=> "OFMS", "y"=> $counttermineDCIFMS),
    array("label"=> "OFMG", "y"=> $counttermineDCIFMG),
    array("label"=> "OFMM", "y"=> $countnbrOFMM),
    array("label"=> "OMRDC", "y"=> $countnbrOMRDC),
    array("label"=> "OMM", "y"=> $countnbrOMM),
    array("label"=> "OMBF", "y"=> $countnbrOMBF),
    array("label"=> "OMFSL", "y"=> $countnbrOMFSL),
    array("label"=> "OMMA", "y"=> $countnbrOMMA),
    array("label"=> "OMLIB", "y"=> $countnbrOMLIB),
    array("label"=> "OMBW", "y"=> $countnbrOMBW),
    array("label"=> "OMCM", "y"=> $countnbrOMCM)

    /*array("label"=> "Shopping & Misc", "y"=> 72),
    array("label"=> "Transportation", "y"=> 191),
    array("label"=> "Rent", "y"=> 573),
    array("label"=> "Travel Insurance", "y"=> 126)*/
);

$dataPoints2 = array( 
   array("label"=> "OMCI", "y"=> $tauxomci),
    array("label"=> "OFMS", "y"=> $tauxomfs),
    array("label"=> "OFMG", "y"=> $tauxofmg),
    array("label"=> "OFMM", "y"=> $tauxOFMM),
    array("label"=> "OMRDC", "y"=> $tauxOMRDC),
    array("label"=> "OMM", "y"=> $tauxOMM),
    array("label"=> "OMBF", "y"=> $tauxOMBF),
    array("label"=> "OMFSL", "y"=> $tauxOMFSL),
    array("label"=> "OMMA", "y"=> $tauxOMMA),
    array("label"=> "OMLIB", "y"=> $tauxOMLIB),
    array("label"=> "OMBW", "y"=> $tauxOMBW),
    array("label"=> "OMCM", "y"=> $tauxOMCM)
);


    

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

    <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Nombre de P.A par Pays"
    },
    axisY:{
        includeZero: true
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        indexLabelPlacement: "outside",   
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
 var chart1 = new CanvasJS.Chart("chartContainer1", {
    theme: "light2",
    animationEnabled: true,
    exportEnabled: true,
    title:{
        text: "% de P.A TERMINE PAR PAYS"
    },
    subtitles: [{
        text: ""
    }],
    data: [{
        type: "pie",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - #percent%",
        yValueFormatString: "฿#,##0",
        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    }]
});
chart1.render();
}



</script>
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
    <section class="content">
        <!-- Hover Expand Effect -->
            <div class="block-header">
                <h2>CHART</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-white">
                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-white">
                            <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                </div>
            
            <!-- #END# Hover Expand Effect -->
    </section>
    
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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