<?php
    session_start();

    //Define('database')
    define('dbhost','10.242.32.58');
    define('dbuser','root');
    define('dbpass','Lkskjjd56@54');
    define('dbname','point_daction');

    //Connecting database
    try{
        $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass,array(
			PDO::MYSQL_ATTR_LOCAL_INFILE => true,
		));
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
            echo $e->getMessage();
    }

?>