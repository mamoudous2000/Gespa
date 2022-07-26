# phpMyAdmin SQL Dump
# version 2.6.2-rc1
# http://www.phpmyadmin.net
#
# Host: localhost
# Generation Time: Jun 10, 2005 at 09:39 AM
# Server version: 3.23.58
# PHP Version: 4.3.6
#
# Database: `security_scan`
#

# --------------------------------------------------------

#
# Table structure for table `problem`
#

CREATE TABLE `problem` (
  `problem` varchar(45) NOT NULL default '',
  `pattern_expression` varchar(70) NOT NULL default '',
  `pattern_description` text,
  `problem_description` text,
  PRIMARY KEY  (`problem`)
) TYPE=MyISAM;

#
# Dumping data for table `problem`
#

INSERT INTO `problem` VALUES ('exec', '%\\b(exec)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match exec used with variable...\r\nAny exec with '''' "" () pair that has $ in it\r\nMatches exec($foo__any other code__); exec ''$foo''; exec "$foo"', 'If you are going to allow data coming from user input to be passed to this function, then you should be using escapeshellarg() or escapeshellcmd() to make sure that users cannot trick the system into executing arbitrary commands. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('passthru', '%\\b(passthru)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match passthru used with variable...\r\nAny passthru with '''' "" () pair that has $ in it\r\nMatches passthru($foo__any other code__); passthru ''$foo''; passthru "$foo"', 'If you are going to allow data coming from user input to be passed to this function, then you should be using escapeshellarg() or escapeshellcmd() to make sure that users cannot trick the system into executing arbitrary commands. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('proc_open', '%\\b(proc_open)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match proc_open used with variable...\r\nAny proc_open with '''' "" () pair that has $ in it\r\nMatches proc_open($foo__any other code__); proc_open ''$foo''; proc_open "$foo"', 'Execute a command and open file pointers for input/output. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('shell_exec', '%\\b(shell_exec)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match shell_exec used with variable...\r\nAny shell_exec with '''' "" () pair that has $ in it\r\nMatches shell_exec($foo__any other code__); shell_exec ''$foo''; shell_exec "$foo"', 'Execute command via shell and return the complete output as a string.\r\nCheck if data is properly validated.');
INSERT INTO `problem` VALUES ('system', '%\\b(system)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match system used with variable...\r\nAny system with '''' "" () pair that has $ in it\r\nMatches system($foo__any other code__); system ''$foo''; system "$foo"', 'If you are going to allow data coming from user input to be passed to this function, then you should be using escapeshellarg() or escapeshellcmd() to make sure that users cannot trick the system into executing arbitrary commands. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('popen', '%\\b(popen)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match popen used with variable...\r\nAny popen with '''' "" () pair that has $ in it\r\nMatches popen($foo__any other code__); popen ''$foo''; popen "$foo"', ' Opens a pipe to a process executed by forking the command given by command.Check if data is properly validated.');
INSERT INTO `problem` VALUES ('pcntl_fork', '%\\b(pcntl_fork)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match pcntl_fork used with variable...\r\nAny pcntl_fork with '''' "" () pair that has $ in it\r\nMatches pcntl_fork($foo__any other code__); pcntl_fork ''$foo''; pcntl_fork "$foo"', ' The pcntl_fork() function creates a child process that differs from the parent process only in its PID and PPID. Check if data is properly validated.\r\n');
INSERT INTO `problem` VALUES ('pcntl_exec', '%\\b(pcntl_exec)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match pcntl_exec used with variable...\r\nAny pcntl_exec with '''' "" () pair that has $ in it\r\nMatches pcntl_exec($foo__any other code__); pcntl_exec ''$foo''; pcntl_exec "$foo"', 'Executes specified program in current process space. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('fsockopen', '%\\b(fsockopen)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match fsockopen used with variable...\r\nAny fsockopen with '''' "" () pair that has $ in it\r\nMatches fsockopen($foo__any other code__); fsockopen ''$foo''; fsockopen "$foo"', 'Open Internet or Unix domain socket connection. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('pfsockopen', '%\\b(pfsockopen)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match pfsockopen used with variable...\r\nAny pfsockopen with '''' "" () pair that has $ in it\r\nMatches pfsockopen($foo__any other code__); pfsockopen ''$foo''; pfsockopen "$foo"', 'Open Internet or Unix domain socket connection. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('socket_bind', '%\\b(socket_bind)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match socket_bind used with variable...\r\nAny socket_bind with '''' "" () pair that has $ in it\r\nMatches socket_bind($foo__any other code__); socket_bind ''$foo''; socket_bind "$foo"', 'Binds a name to a socket. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('socket_accept', '%\\b(socket_accept)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match socket_accept used with variable...\r\nAny socket_accept with '''' "" () pair that has $ in it\r\nMatches socket_accept($foo__any other code__); socket_accept ''$foo''; socket_accept "$foo"', 'Accepts a connection on a socket. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('socket_listen', '%\\b(socket_listen)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match socket_listen used with variable...\r\nAny socket_listen with '''' "" () pair that has $ in it\r\nMatches socket_listen($foo__any other code__); socket_listen ''$foo''; socket_listen "$foo"', 'Listens for a connection on a socket. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('socket_create', '%\\b(socket_create)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match socket_create used with variable...\r\nAny socket_create with '''' "" () pair that has $ in it\r\nMatches socket_create($foo__any other code__); socket_create ''$foo''; socket_create "$foo"', 'Create a socket (endpoint for communication). Check if data is properly validated.');
INSERT INTO `problem` VALUES ('stream_socket_client', '%\\b(stream_socket_client)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match stream_socket_client used with variable...\r\nAny stream_socket_client with '''' "" () pair that has $ in it\r\nMatches stream_socket_client($foo__any other code__); stream_socket_client ''$foo''; stream_socket_client "$foo"', 'Open Internet or Unix domain socket connection. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('stream_socket_server', '%\\b(stream_socket_server)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match stream_socket_server used with variable...\r\nAny stream_socket_server with '''' "" () pair that has $ in it\r\nMatches stream_socket_server($foo__any other code__); stream_socket_server ''$foo''; stream_socket_server "$foo"', 'Create an Internet or Unix domain server socket. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('dl', '%\\b(dl)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match dl used with variable...\r\nAny dl with '''' "" () pair that has $ in it\r\nMatches dl($foo__any other code__); dl ''$foo''; dl "$foo"', 'Loads a PHP extension at runtime. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('glob', '%\\b(glob)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match glob used with variable...\r\nAny glob with '''' "" () pair that has $ in it\r\nMatches glob($foo__any other code__); glob ''$foo''; glob "$foo"', 'Find pathnames matching a pattern. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('include', '%\\b(include)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match include used with variable...\r\nAny include with '''' "" () pair that has $ in it\r\nMatches include($foo__any other code__); include ''$foo''; include "$foo"', 'If "URL fopen wrappers" are enabled in PHP (which they are in the default configuration), you can specify the file to be included using a URL. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('include_once', '%\\b(include_once)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match include_once used with variable...\r\nAny include_once with '''' "" () pair that has $ in it\r\nMatches include_once($foo__any other code__); include_once ''$foo''; include_once "$foo"', 'If "URL fopen wrappers" are enabled in PHP (which they are in the default configuration), you can specify the file to be included using a URL. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('require', '%\\b(require)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match require used with variable...\r\nAny require with '''' "" () pair that has $ in it\r\nMatches require($foo__any other code__); require ''$foo''; require "$foo"', 'If "URL fopen wrappers" are enabled in PHP (which they are in the default configuration), you can specify the file to be included using a URL. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('require_once', '%\\b(require_once)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match require_once used with variable...\r\nAny require_once with '''' "" () pair that has $ in it\r\nMatches require_once($foo__any other code__); require_once ''$foo''; require_once "$foo"', 'If "URL fopen wrappers" are enabled in PHP (which they are in the default configuration), you can specify the file to be included using a URL. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('fopen', '%\\b(fopen)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match fopen used with variable...\r\nAny fopen with '''' "" () pair that has $ in it\r\nMatches fopen($foo__any other code__); fopen ''$foo''; fopen "$foo"', 'Opens file or URL. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('readfile', '%\\b(readfile)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match readfile used with variable...\r\nAny readfile with '''' "" () pair that has $ in it\r\nMatches readfile($foo__any other code__); readfile ''$foo''; readfile "$foo"', 'Outputs a file. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('file', '%\\b(file)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match file used with variable...\r\nAny file with '''' "" () pair that has $ in it\r\nMatches file($foo__any other code__);file ''$foo''; file "$foo"', 'Reads entire file into an array');
INSERT INTO `problem` VALUES ('phpinfo', '%\\b(phpinfo)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match phpinfo used with variable...\r\nAny phpinfo with '''' "" () pair that has $ in it\r\nMatches phpinfo($foo__any other code__);phpinfo ''$foo''; phpinfo "$foo"', 'Outputs lots of PHP information.');
INSERT INTO `problem` VALUES ('eval', '%\\b(eval)\\b(?![\\''\\"]\\])\\s*[\\(\\''\\"].*\\$.*[\\)\\''\\"]%', 'Match eval used with variable...\r\nAny eval with '''' "" () pair that has $ in it\r\nMatches eval($foo__any other code__); eval ''$foo''; eval "$foo"', 'Evaluate a string as PHP code. Check if data is properly validated.');
INSERT INTO `problem` VALUES ('throw', '%\\bdefine\\b\\s*\\([\\''\\"](throw)[\\''\\"]\\,.*\\)%', 'Match define of constant throw.\r\nMatches define(''throw'',); define ("throw",); define (''throw",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('exception', '%\\bdefine\\b\\s*\\([\\''\\"](exception)[\\''\\"]\\,.*\\)%', 'Match define of constant exception.\r\nMatches define(''exception'',); define ("exception",); define (''exception",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('catch', '%\\bdefine\\b\\s*\\([\\''\\"](catch)[\\''\\"]\\,.*\\)%', 'Match definition of constant catch.\r\nMatches define(''catch'',); define ("catch",); define (''catch",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('final', '%\\bdefine\\b\\s*\\([\\''\\"](final)[\\''\\"]\\,.*\\)%', 'Match define of constant final.\r\nMatches define(''final'',); define ("final",); define (''final",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('php_user_filter', '%\\bdefine\\b\\s*\\([\\''\\"](php_user_filter)[\\''\\"]\\,.*\\)%', 'Match define of constant php_user_filter.\r\nMatches define(''php_user_filter'',); define ("php_user_filter",); define (''php_user_filter",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('interface', '%\\bdefine\\b\\s*\\([\\''\\"](interface)[\\''\\"]\\,.*\\)%', 'Match define of constant interface.\r\nMatches define(''interface'',); define ("interface",); define (''interface",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('implements', '%\\bdefine\\b\\s*\\([\\''\\"](implements)[\\''\\"]\\,.*\\)%', 'Match define of constant implements.\r\nMatches define(''implements'',); define ("implements",); define (''implements",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('public', '%\\bdefine\\b\\s*\\([\\''\\"](public)[\\''\\"]\\,.*\\)%', 'Match define of constant public.\r\nMatches define(''public'',); define ("public",); define (''public",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('private', '%\\bdefine\\b\\s*\\([\\''\\"](private)[\\''\\"]\\,.*\\)%', 'Match define of constant private.\r\nMatches define(''private'',); define ("private",); define (''private",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('protected', '%\\bdefine\\b\\s*\\([\\''\\"](protected)[\\''\\"]\\,.*\\)%', 'Match define of constant protected.\r\nMatches define(''protected'',); define ("protected",); define (''protected",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('abstract', '%\\bdefine\\b\\s*\\([\\''\\"](abstract)[\\''\\"]\\,.*\\)%', 'Match define of constant abstract.\r\nMatches define(''abstract'',); define ("abstract",); define (''abstract",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('clone', '%\\bdefine\\b\\s*\\([\\''\\"](clone)[\\''\\"]\\,.*\\)%', 'Match define of constant clone.\r\nMatches define(''clone'',); define ("clone",); define (''clone",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('try', '%\\bdefine\\b\\s*\\([\\''\\"](try)[\\''\\"]\\,.*\\)%', 'Match define of constant try.\r\nMatches define(''try'',); define ("try",); define (''try",) etc.', 'reserved word in PHP 5');
INSERT INTO `problem` VALUES ('get_class', '%\\b(get_class)\\b\\s*\\(.*\\)%', 'Matches get_class with any or no content in the ()\r\nMatches get_class (); get_class (anything)', 'PHP5->return the name of the classes/methods as they were declared (case-sensitive).\r\nCould use strtolower().');
INSERT INTO `problem` VALUES ('get_parent_class', '%\\b(get_parent_class)\\b\\s*\\(.*\\)%', 'Matches get_parent_class with any or no content in the ()\r\nMatches get_parent_class (); get_parent_class (anything)', 'PHP5->return the name of the classes/methods as they were declared (case-sensitive).\r\nCould use strtolower().');
INSERT INTO `problem` VALUES ('get_class_methods', '%\\b(get_class_methods)\\b\\s*\\(.*\\)%', 'Matches get_class_methods with any or no content in the ()\r\nMatches get_class_methods (); get_class_methods (anything)', 'PHP5->return the name of the classes/methods as they were declared (case-sensitive).\r\nCould use strtolower().');
INSERT INTO `problem` VALUES ('ip2long', '%\\b(ip2long)\\b\\s*\\(.*\\)%', 'Matches ip2long with any or no content in the ()\r\nMatches ip2long (); ip2long (anything)', 'PHP5 ->returns FALSE when an invalid IP address is passed as argument to the function, and no longer -1\r\nCheck manual for more detail!!!');
INSERT INTO `problem` VALUES ('array_merge', '%\\b(array_merge)\\b\\s*\\(.*\\$.*\\)%', 'Matches array_merge with $ sign in the ().\r\nThere could be any other characters also.\r\nMatches array_merge ($); array_merge ($foo)', 'PHP5->accept only arrays');
INSERT INTO `problem` VALUES ('__construct', '%\\b(__construct)\\b\\s*\\(.*\\)%', 'Matches __construct with any or no content in the ()\r\nMatches __construct (); __construct (anything)', 'PHP5-> The function names __construct, __destruct  (see Constructors and Destructors), __call, __get, __set  (see Overloading), __sleep, __wakeup, and __toString are magical in PHP classes.');
INSERT INTO `problem` VALUES ('__destruct', '%\\b(__destruct)\\b\\s*\\(.*\\)%', 'Matches __destruct with any or no content in the ()\r\nMatches __destruct (); __destruct (anything)', 'PHP5-> The function names __construct, __destruct  (see Constructors and Destructors), __call, __get, __set  (see Overloading), __sleep, __wakeup, and __toString are magical in PHP classes.');
INSERT INTO `problem` VALUES ('__call', '%\\b(__call)\\b\\s*\\(.*\\)%', 'Matches __call with any or no content in the ()\r\nMatches __call (); __call (anything)', 'PHP5-> The function names __construct, __destruct  (see Constructors and Destructors), __call, __get, __set  (see Overloading), __sleep, __wakeup, and __toString are magical in PHP classes.');
INSERT INTO `problem` VALUES ('__get', '%\\b(__get)\\b\\s*\\(.*\\)%', 'Matches __get with any or no content in the ()\r\nMatches __get (); __get (anything)', 'PHP5-> The function names __construct, __destruct  (see Constructors and Destructors), __call, __get, __set  (see Overloading), __sleep, __wakeup, and __toString are magical in PHP classes.');
INSERT INTO `problem` VALUES ('__set', '%\\b(__set)\\b\\s*\\(.*\\)%', 'Matches __set with any or no content in the ()\r\nMatches __set (); __set (anything)', 'PHP5-> The function names __construct, __destruct  (see Constructors and Destructors), __call, __get, __set  (see Overloading), __sleep, __wakeup, and __toString are magical in PHP classes.');
INSERT INTO `problem` VALUES ('__sleep', '%\\b(__sleep)\\b\\s*\\(.*\\)%', 'Matches __sleep with any or no content in the ()\r\nMatches __sleep (); __sleep (anything)', 'PHP4,5-> The function names  __sleep, __wakeup are magical in PHP classes.');
INSERT INTO `problem` VALUES ('__wakeup', '%\\b(__wakeup)\\b\\s*\\(.*\\)%', 'Matches __wakeup with any or no content in the ()\r\nMatches __wakeup (); __wakeup (anything)', 'PHP4,5-> The function names  __sleep, __wakeup are magical in PHP classes.');
INSERT INTO `problem` VALUES ('__toString', '%\\b(__toString)\\b\\s*\\(.*\\)%', 'Matches __toString with any or no content in the ()\r\nMatches __toString (); __toString (anything)', 'PHP5-> The function names __construct, __destruct  (see Constructors and Destructors), __call, __get, __set  (see Overloading), __sleep, __wakeup, and __toString are magical in PHP classes.');

-- --------------------------------------------------------

#
# Table structure for table `result`
#

CREATE TABLE `result` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `search_label` varchar(32) NOT NULL default '',
  `search_path` varchar(100) NOT NULL default '',
  `results` longtext NOT NULL,
  `inaccessible` text NOT NULL,
  `white_black_list` text NOT NULL,
  `ts` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=7 ;

#
# Dumping data for table `result`
#

