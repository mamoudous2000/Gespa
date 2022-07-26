<?php
    # PHP Security Scanner
    # This program is distributed under the terms and conditions of the GPL
    # See the README and LICENSE files for details

    # This file is the index page for the php security system interface.

//error_reporting(E_ALL);
require_once dirname(__FILE__).'/lib/config.php';
require_once 'Pager/Pager.php';

///getting input parrameters
$id = http_get_param('id',NULL);

///dbg
//$id = 1;

///validating parameters....
if ($id && is_numeric($id)) {

    $data = $dbh->GetRow("SELECT results,inaccessible,search_path,search_label,ts from {$result_table}
                            WHERE id=".$id."");
    if (PEAR::isError($data)) {
        $smarty->assign('error_msg', $data->getDebugInfo());
        $smarty->display('error.html');
        exit();
    }

    if (is_null($data)) {
        $smarty->assign('error_msg', 'ID not found!!!');
        $smarty->display('error.html');
        exit();
    }

    $results = @unserialize($data['results']);
    $inaccessible = @unserialize($data['inaccessible']);

    ///dbg
//     var_dump($results);
//     exit();


    $params = array(
        'itemData' => $results,
        'perPage' => 15,
        'delta' => 40,
        'append' => true,
        //'separator' => ' | ',
        'clearIfVoid' => false,
        'urlVar' => 'entrant',
        'useSessions' => true,
        'closeSession' => true,
        'mode'  => 'Jumping',

    );
    $pager = Pager::factory($params);
    $page_data = $pager->getPageData();
    $links = $pager->getLinks();
    $selectBox = $pager->getPerPageSelectBox();

    $smarty->assign('result',$page_data);
    $smarty->assign('count_result',count($results));
    $smarty->assign('inaccessible',$inaccessible);
    $smarty->assign('search_path',$data['search_path']);
    $smarty->assign('label',$data['search_label']);
    $smarty->assign('ts',$data['ts']);

    $smarty->assign('links',$links);
    ///dbg
//     var_dump($results);
//     exit();

    $smarty->display('index.html');
    exit();

} else {

    ///get results from DB and form a drop down menu with results to choose from to display
    $result = $dbh->getAll("SELECT id,search_label,search_path,ts from {$result_table} ORDER BY ts DESC");
    if (PEAR::isError($result)) {
        die($result->getDebugInfo());
    }
    if (!empty($result)) {
        $smarty->assign('scanned',$result);
        $smarty->display('index.html');
    } else {
        $smarty->assign('error_msg', 'No results in the database. You should use the executable first.');
        $smarty->display('error.html');
        exit();
    }
}

?>