#!/usr/bin/php
<?php

    # PHP Security Scanner
    # This program is distributed under the terms and conditions of the GPL
    # See the README and LICENSE files for details

    # This file is the php shell script you will use to search for vulnarabilites

require_once dirname(__FILE__).'/config.php';
require_once dirname(__FILE__).'/Security_Scanner.php';

$time_start = getmicrotime();

//setting execution time to infinite since this scan could take a while.
set_time_limit(0);

if ($_SERVER['argc'] < 3) {
    die ('Usage: '.$_SERVER['argv'][0].' <directory to scan> <search label>'."\n");
}

$path = $_SERVER['argv'][1];
$label = $_SERVER['argv'][2];


///check if path exists
if (!file_exists($path)) {
    die('Directory/file <<'.$path.'>>. does not exists.'."\n");
}

///check if path is readable
if (!is_readable($path)) {
    die('Permission denied on <<'.$path.'>>.'."\n");
}

///check if is file and empty
if (is_file($path) && !file($path)) {
    die('File <<'.$path.'>> is empty.'."\n");
}

///validate label
if (!preg_match("/^[A-z0-9_]{1,32}$/", $label)) {
    die('Label should only include letters,numbers and underscores. It should be one to 32 characters long'."\n");
}

$search = new Security_Scanner($path,$label);

$query = $dbh->getALL("SELECT problem,pattern_expression,problem_description FROM $problem_table");
if (PEAR::isError($query)) {
    die($query->getDebugInfo()."\n");
}
if (empty($query)) {
    die('No problems defined in the database.'."\n");
}

//prepare patterns before use them...optimize them a bit.
$search->preparePatterns($query);
unset($query);

echo "Searching...\n";
$search->run();

///dbg
//var_dump($query);

$cnt_inaccessible = count($search->getInaccessible());
$cnt_results = count($search->getResults());

if ($cnt_results == 0 && $cnt_inaccessible == 0) {
    die ("No matches found! Nothing is added to the database!!!\n");

} elseif ($cnt_inaccessible > 0 && $cnt_results == 0) {
    $inaccessible = $search->getInaccessible();

    //displaying empty files
    if (!empty($inaccessible['files']['empty'])) {
        echo "<<<<<<<<<<<<<<<<<<<  EMPTY FILES    >>>>>>>>>>>>>>>>>>>>>>>>>>\n";
        foreach ($inaccessible['files']['empty'] as $filepath) {
            echo "\t- ".$filepath."\n";
        }
        echo "<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    } else {
        echo "There are no empty files!!!\n";
    }

    //displaying non-accessible files
    if (!empty($inaccessible['files']['inaccessible'])) {
        echo "<<<<<<<<<<<<<<<<<<<  FILES NOT ACCESSABLE    >>>>>>>>>>>>>>>>>>>>>>>>>>\n";
        foreach ($inaccessible['files']['inaccessible'] as $filepath) {
            echo "\t- ".$filepath."\n";
        }
        echo "<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    } else {
        echo "All scanned files are accessible.\n";
    }

    //displaying non-accessible directories
    if (!empty($inaccessible['dirs']['inaccessible'])) {
        echo "<<<<<<<<<<<<<<<<<<<  DIRECTORIES NOT ACCESSABLE    >>>>>>>>>>>>>>>>>>>>>>>>>>\n";
        foreach ($inaccessible['dirs']['inaccessible'] as $filepath) {
            echo "\t- ".$filepath."\n";
        }
        echo "<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    } else {
        echo "All scanned directories are accessible\n";
    }

    echo "Nothing is added to the database!!!\n";
    echo "Exiting...\n";
    exit();
}
unset($inaccessible,$cnt_inaccessible,$cnt_results);

//prepare query
$sth = $dbh->prepare('INSERT INTO '.$result_table.' (search_label,results,inaccessible,search_path,white_black_list) VALUES (?,?,?,?,?)');
if (PEAR::isError($sth)) {
    die($sth->getDebugInfo()."\n");
}

//prepare data for insert
echo "Preparing data for insert.\n";
$results = serialize($search->getResults());
$inaccessible = serialize($search->getInaccessible());
$path = realpath($search->getPath());
$match_list = serialize($match_list);

$data = array ($label,$results,$inaccessible,$path,$match_list);

echo "Inserting data...\n";
$res =& $dbh->execute($sth, $data);
if (PEAR::isError($res)) {
    die($res->getDebugInfo());
}
echo "Results successfully uploaded in the database.\n";
echo "Use the interface to see the results.\n";

$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "Search finished in {$time} seconds.\n";
echo "Exiting...\n";
echo "\n\n";

$dbh->disconnect();

?>