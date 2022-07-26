<?php
error_reporting(E_ALL);

    # PHP Security Scanner
    # This program is distributed under the terms and conditions of the GPL
    # See the README and LICENSE files for details

    # This file contains the main class of the tool.

/**
 * Description: Security_Scanner class is used in PHP Security Scan project
 *
 * PHP version 4 - should work with php 5 too
 *
 * LICENSE: This source file is subject to the GPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Security
 * @package    PHP Security Scanner
 * @author     Julian Davtchev <jmut@users.sourceforge.net>
 * @license     http://opensource.org/licenses/gpl-license.php  GPL license
 * @since      Class available since Release 1.0
 */

class Security_Scanner
{
    // {{{ properties

    /**
     * The searched path
     *
     *  @var string
     *  @access private
     *  @see Security_Scanner::Security_Scanner()
     */
    var $_path = '';

    /**
     * Array with problem and the descriptions. Used later in the interface
     * @see Security_Scanner::preparePatterns()
     * @access private
     * @var array
     */
    var $problem_description = array();

    /**
     *  Optimized patterns, ready to be searched for.
     *  @see Security_Scanner::preparePatterns()
     *  @see Security_Scanner::searchFileForPattern()
     *  @var array
     */
    var $prapared_patterns = array();

     /**
     *  @see Security_Scanner::addResult()
     *  @var array $_search_results holds search result information
     */
    var $_search_results = array();

     /**
     * @var array $inaccessible Contains not accessible files or empty files and not accessible directories.
     */
    var $inaccessible = array();

    // }}}
    // {{{ Security_Scanner

    /**
    *   Constructor
    *
    *   Initiates path and label.
    *
    *   @param string $path Directory/File to search for.
    *   @param string $label Label of the search...used later for interface.
    *   @uses Security_Scanner::$_path   Sets initial values
    *   @uses Security_Scanner::$_label    Sets initial values
    *   @uses Security_Scanner::formatDirectoryName() Formats directory name without trailing slashes
    *   @access public
    *
    */
    function Security_Scanner($path,$label)
    {
        $this->_path = $this->formatDirectoryName($path);
        $this->_label = (string) $label;
    }

    // }}}
    // {{{ formatDirectoryName

    /**
    *   Removes trailing slashes from directory names. This method is called once.
    *
    *   @param string $path Directory/File to search for.
    *   @see Security_Scanner::Security_Scanner()
    *   @return string Directory without trailing slash
    *   @access private
    *
    */
    function formatDirectoryName ($dir)
    {
        $dir = preg_split('/\/+$/',$dir,-1,PREG_SPLIT_NO_EMPTY);
        return $dir[0];
    }

    //}}}
    // {{{ preparePatterns()

    /**
    *
    *   Patterns are prepared so that only one search is executed for close patterns...
    *   e.g.
    *   problem -  pattern_expression
    *   text       -  %(text)reg_exp_chars%
    *   text2     -  %(text2)reg_exp_chars%
    *   This will result in the following pattern
    *   %(text|text2)reg_exp_chars%   -> since the only thing they differ in is the problem string.
    *
    *   Array with problem and problem description for interface usage. This is necessery since
    *   prepared_patterns gather every problem in one and thus, have to decide which pattern from the result
    *   belongs to which description.
    *   @param array $db_pattern_data  The problem, problem description and pattern_expression taken from DB.
    *   DB data. Have in mind that it is not empty. So it is checked before used in the class.
    *   @todo  don't have to be so complicated function
    *
    *   @uses Security_Scanner::$problem_description
    *   @uses Security_Scanner::$prapared_patterns
    *   @access public
    */
    function preparePatterns($db_pattern_data)
    {
        for ($i = 0, $cnt = count($db_pattern_data); $i < $cnt; $i++) {
            if (!isset($empty_pattern)) {
                $empty_pattern = array();
            }
            $empty_pattern[$db_pattern_data[$i]['problem']] = preg_replace("/".$db_pattern_data[$i]['problem']."/","____",$db_pattern_data[$i]['pattern_expression']);            $this->problem_description[$i] = array ('problem' => $db_pattern_data[$i]['problem'], 'problem_description' => $db_pattern_data[$i]['problem_description']);
        }
        $pattern_functions = array();
        foreach ($empty_pattern as $k=>$v) {
            if (!isset ($pattern_functions[$v])) {
                $pattern_functions[$v] = '';
            }
                $pattern_functions[$v] .= $k.'|';
        }
        //var_dump($pattern_functions);
        //exit();
        foreach ($pattern_functions as $k => $v) {
            $pattern_functions[$k] = substr($v, 0, -1);
        }

        foreach ($pattern_functions as $k=>$v) {
            $this->prapared_patterns[] = preg_replace("/____/",$v,$k);
        }
//         var_dump($this->prapared_patterns);
//         exit();
    }

    //}}}
    // {{{ searchFileForPattern()

    /**
    *   @param string $file File's path name.
    *   @see Security_Scanner::run()
    *   @uses Security_Scanner::$inaccessible
    *   @uses Security_Scanner::$prapared_patterns
    *   @uses Security_Scanner::getProblemDescription()
    *   @uses Security_Scanner::addResult()
    */
    function searchFileForPattern($file)
    {

        if (!is_readable($file)) {
            if (!isset($this->inaccessible['files']['inaccessible']) || !in_array($file,$this->inaccessible['files']['inaccessible'])) {
                $this->inaccessible['files']['inaccessible'][] = $file;
            }
            return;
        }

        if (!file($file)) {
            if (!isset($this->inaccessible['files']['empty']) || !in_array($file,$this->inaccessible['files']['empty'])) {
                $this->inaccessible['files']['empty'][] = $file;
            }
            return;
        }

        $fileLines = file($file);
            foreach ($this->prapared_patterns as $pattern) {
                foreach($fileLines as $lineNumber=>$lineContent) {
                    $lineContent = trim($lineContent);
                    if(preg_match($pattern,$lineContent)) {
                        $problemDescription = $this->getProblemDescription($lineContent);
                        // log result
                        $this->addResult($file, $lineContent, $lineNumber+1, $problemDescription);
                    }
                }
            }
    }

    //}}}
    // {{{ scanDirectory()

    /**
    *   Scan the directories for files and directories and makes sure they obey matching rules from the config file
    *   @param string Directory name
    *   @see Security_Scanner::run()
    *   @uses Security_Scanner::isMatchingList()
    *   @uses Security_Scanner::searchFileForPattern()
    *   @uses Security_Scanner::scanDirectory()
    *   @uses Security_Scanner::isExtension()
    *   @uses Security_Scanner::$inaccessible
    */
    function scanDirectory($dir)
    {
        $subDirs = array();
        $dirFiles = array();
        if ($handle = @opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." ) {
                    if (is_dir($dir."/".$file) && $this->isMatchingList($file,'dir')) {
                            $subDirs[] = $dir."/".$file;
                    } elseif (is_file($dir."/".$file) && $this->isExtension($file)) {
                        if ($this->isMatchingList($file,'file')) {
                            $dirFiles[] = $dir."/".$file;
                        }
                    } else {
                            ///neither file, nor directory >>> not interested.
                    }
                }
            }
            closedir($handle);
            foreach($dirFiles as $file) {
                    $this->searchFileForPattern($file);
            }
            if (count($subDirs) > 0) {
                foreach ($subDirs as $subDir) {
                    $this->scanDirectory($subDir);
                }
            }
        } else {
            if (!isset($this->inaccessible['dirs']['inaccessible']) || !in_array($dir,$this->inaccessible['dirs']['inaccessible'])) {
                $this->inaccessible['dirs']['inaccessible'][] = $dir;
            }
        }

    }

    //}}}
    // {{{ isExtension()

    /**
    *   Check if file name has extension defined in the configuration file. Usually this would be .php
    *
    *   @param string $file File name to check
    *   @return bool Whether or not file has PHP_EXTENSION extension
    *   @access private
    *   @see Security_Scanner::scanDirectory()
    *
    */
    function isExtension($file)
    {
        $extension = $GLOBALS['php_extensions'];
        $file_ext = array_pop(explode(".",$file));
        if (in_array($file_ext,$extension)) {
            return true;
        }
        return false;
    }

    //}}}
    // {{{ isMatchingList()

    /**
    *   Finds if file/directory(depending on $type) is ok to be scanned. This method takes data from
    *   configuration method. Data is taken from configuation file.
    *
    *   @param string $file This is returned from the dir handle. Could be filename or dirname
    *   @param string $type What type are we scanning: file or directory.
    *   @return bool If file/dir maches the white/black list defined in the configuration file
    *   @see Security_Scanner::scanDirectory
    *   @uses Security_Scanner::isMatch
    *
    *   -------------------------------------------------
    *   |Matches                |White list | Black list|
    *   -------------------------------------------------
    *   | Any white/but black   |   set     |   set     |
    *   -------------------------------------------------
    *   | All/ but black        |   not set |   set     |
    *   -------------------------------------------------
    *   | Only white (any of it)|   set     |  not set  |
    *   -------------------------------------------------
    *   | All                   |   not set |  not set  |
    *   -------------------------------------------------
    *
    *    set       >>> array is not empty and scip_list == false
    *    not set   >>> array is empty or scip_list == true
    *
    */
    function isMatchingList($file, $type)
    {
        /*
        * Will search if file
        */
        if ($type === 'file') {
            $white_list = $GLOBALS['match_list']['file']['white_list'];
            $black_list = $GLOBALS['match_list']['file']['black_list'];
            //striping the extension from file's name (it is sure to be one of PHP_EXTENSION)
            //+1 is for the "." dot.
            $ext_lenght = strlen(array_pop(explode(".",$file))) + 1;
            $file = substr($file,0, -$ext_lenght);
        }
        /*
        * Will search if directory
        */
        if ($type === 'dir') {
            $white_list = $GLOBALS['match_list']['dir']['white_list'];
            $black_list = $GLOBALS['match_list']['dir']['black_list'];
        }

        //we have the white and black lists. Algorithm for finding directoriy and file match is the same.
        /*
        *   |Matches                |White list | Black list|
        *   | All                   |   not set |  not set  |
        */
        if ($white_list['skip_list'] !== false && $black_list['skip_list'] !== false) {
            return true;
        }

        /*
        *   |Matches                |White list | Black list|
        *   | Any white/but black   |   set     |   set     |
        */
        if ($white_list['skip_list'] === false && $black_list['skip_list'] === false) {
            return ($this->isMatch($file,$white_list) && !$this->isMatch($file,$black_list));
        }

        /*
        *   |Matches                |White list | Black list|
        *   | All/ but black        |   not set |   set     |
        */
        if ($white_list['skip_list'] !== false && $black_list['skip_list'] === false) {
            return !$this->isMatch($file,$black_list);
        }

        /*
        *   |Matches                |White list | Black list|
        *   | Only white (any of it)|   set     |  not set  |
        */
        if ($white_list['skip_list'] === false && $black_list['skip_list'] !== false) {
            return $this->isMatch($file,$white_list);
        }
    }

    //}}}
    // {{{ isMatch()

    /**
    *   @todo Think of some way not to iterate twice the same array and keep the logic.
    *   @param string $file This is the name of the file/directory to test against white/black lists.
    *   @param array $list Black or white list...the algorithm is the same for both.
    *   @return bool If the name match black/white list. Depends which on the $list.
    *   @see Security_Scanner::isMatchingList()
    *   @uses Security_Scanner::escapePregString()
    *   @access private
    */
    function isMatch ($file, $list) {

        //checking "exact" array.
        if (!empty($list['exact'])) {
            if (in_array($file,$list['exact'])) {
                return true;

            }
        }
        //checking "start_with" array
        if (!empty($list['start_with'])) {
            foreach ($list['start_with'] as $pattern) {
                if (preg_match('%^'.$this->escapePregString($pattern).'%',$file)) {
                    return true;
                }
            }
        }
        //checking "end_on" array....itterating twice so first start_with is checked and then end_on
        if (!empty($list['end_on'])) {
            foreach ($list['end_on'] as $pattern) {
            echo $file."\n";
                if (preg_match('%'.$this->escapePregString($pattern).'$%',$file)) {
                    return true;
                }
            }
        }
        return false;

    }

    //}}}
    // {{{ escapePregString()

    /**
    *   Used in isMatch to escape characters that are not escaped by PHP's preg_quote() function
    *
    *   @param string $file This is the name of the file/directory to test against white/black lists.
    *   @param array $list Black or white list...the algorithm is the same for both.
    *   @return string The string to use in the regular expression.
    *   @see Security_Scanner::isMatch()
    *   @access private
    */
    function escapePregString($string) {
        $string = preg_quote($string);

        //these characters are not escaped by preg_quote(). Just to be on the save side I escape them myself.
        $chars_to_escape = array ('%','@','#','&','/','_');
        $escape_chars_with = array ('\%','\@','\#','\&','\/','\_');
        return str_replace($chars_to_escape,$escape_chars_with,$string);
    }

    //}}}
    // {{{ getProblemDescription()

    /**
    *   Gets the problem description of the problem found in $line
    *
    *   @todo:This is not very correct since will get only one problem description. If
    *   exec ($...system($...)) etc. ->  we actually have more problems on the same line and will return description of the last in the line.
    *   @param string $line Line content
    *   @return string the description of the problem found on particular $line
    *   @see Security_Scanner::searchFileForPattern
    *   @uses Security_Scanner::$problem_description
    *   @access private
    */
    function getProblemDescription ($line)
    {
        for ($i = 0, $cnt = count($this->problem_description); $i < $cnt; $i++) {
            if (strstr($line,$this->problem_description[$i]['problem'])) {
                return $this->problem_description[$i]['problem_description'];
            }
        }
    }

    //}}}
    // {{{ run()

    /**
    *   This is the main method used. This actually initiates the search
    *   @uses Security_Scanner::searchFileForPattern()
    *   @uses Security_Scanner::scanDirectory()
    *   @access public
    */
    function run()
    {
            if(is_file($this->_path)) {
                // run search on the file
                $this->searchFileForPattern($this->_path);
            } elseif (is_dir($this->_path)) {
                // scan directory contents for string
                $this->scanDirectory($this->_path);
            }
    }

    //}}}
    // {{{ addResult()

    /**
    *   Adds results in an array
    *   @param string $filePath Full path of the file
    *   @param string $lineContents Contents of the line...where match if found.
    *   @param int $lineNumber  Line number of the match
    *   @param string $problemDescription   Description of the problem.
    *   @see Security_Scanner::searchFileForPattern()
    *   @uses Security_Scanner::$_search_results
    *   @access private
    */
    function addResult($filePath, $lineContents, $lineNumber,$problemDescription)
    {
        $this->_search_results[] = array('filePath' => $filePath,
                                        'lineContents' => $lineContents,
                                        'lineNumber' => $lineNumber,
                                        'problemDescription' => $problemDescription
                                        );
    }

    //}}}
    //{{{ Getters

    function getSearchResults()
    {
        return $this->_search_results;
    }

    function getInaccessible()
    {
        return $this->inaccessible;
    }

    function getResults()
    {
        return $this->_search_results;
    }

    function getPath()
    {
        return $this->_path;
    }

    //}}}
}


?>