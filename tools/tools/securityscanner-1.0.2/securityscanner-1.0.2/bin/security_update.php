#!/usr/bin/php
<?php

    # PHP Security Scanner
    # This program is distributed under the terms and conditions of the GPL
    # See the README and LICENSE files for details

    # This file is the php shell script you will use to update your problem table
    # with new vulnarabilites to scan for


require_once (dirname(__FILE__)."/config.php");
require_once (dirname(__FILE__)."/xmlrpc_utils.php");

//setting execution time to infinite since this scan could take a while.
set_time_limit(0);


if (!($_SERVER['argc'] >= 2 && $_SERVER['argv'][1] == 'update')) {
    echo ('Usage: '.$_SERVER['argv'][0].' update'."\n");
    echo "Added \"update\" parameter so you don't run the script by accident.\n";
    exit();
}

$query = $dbh->getCol("SELECT problem FROM {$problem_table}");
if (PEAR::isError($query)) {
    die("Error while getting your problem definitions. Check your database connection settings. Contact jmut@users.sourceforge.net. \n".$query->getDebugInfo()."\n");
}
// var_dump($query);
// exit();
$XML_SERVER_DEBUG = 0;
$main = callServer(
                "syncDB",
                $query,
                "securityscanner.lostfiles.de",
                "/server/index.php"
                );

//var_dump($main);
//exit();

switch ($main['code']) {
    case 200 : //there is new data in master database
            foreach ($main['output'] as $entry) {
                $res = $dbh->autoExecute($problem_table, $entry,DB_AUTOQUERY_INSERT);
                if (PEAR::isError($res)) {
                    die("Could not insert new data...Please contact jmut@users.sourceforge.net\n".$res->getDebugInfo()."\n");
                }
            }
            $number_inserts = count($main['output']);
            echo "New data successfully uploaded. ".$number_inserts." problems have been added to your DB. Your are up-to-date with latest security problems.\n";
        break;
    default: //errors or misc data
        echo ($main['output']."\n\n");
}


function callServer($method, $params = '', $server = '', $uri = '',$port = '80') {
    global $XML_SERVER_HOST, $XML_SERVER_URI, $XML_SERVER_DEBUG;
    if ($server=="") {
        $server=$XML_SERVER_HOST;
        $uri=$XML_SERVER_URI;
    }
    if ($XML_SERVER_DEBUG) {
       $debug=$XML_SERVER_DEBUG;
    } else {
       $debug=0;
    }
    $result = xu_rpc_http_concise (
        array(
        "method"    => $method,
        "debug"     => $debug,
        "host"      => $server,
        "uri"       => $uri,
        "args"      => $params,
        "port"      => $port
        )
    );
    return  $result;
}

?>