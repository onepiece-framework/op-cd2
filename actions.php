<?php
/** op-cd2:/actions.php
 *
 * @created     2023-04-12
 * @version     1.0
 * @package     op-cd2
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

//  ...
error_reporting(E_ALL);
ini_set('short_open_tag', 1);
ini_set('display_errors', 1);
ini_set('log_errors'    , 0);

/* @var $result array */
/* @var $status int   */
exec('ping -c 1 github.com', $result, $status);
if( $status ){
	echo join("\n", $result);
	exit(__LINE__);
}

//  ...
chdir(__DIR__);

//  ...
require_once('Error.php');
require_once('Request.php');

//  ...
$php        = Request('php')     ?? '';
$config_dir = Request('config_dir');
$config_dir = rtrim($config_dir, '/');
$display    = Request('display', '1');
$debug      = Request('debug'  , '0');

//  ...
if(!is_dir($config_dir) ){
    echo "This is not directory. ($config_dir)\n";
    exit(__LINE__);
}

//  ...
foreach( glob("{$config_dir}/*.php") as $path ){
    //  ...
    $file = basename($path);

    //  ...
    if( $file[0] === '.' or $file[0] === '_' ){
        continue;
    }

    /* @var $output array */
    /* @var $status int   */

	//	CI
	$cmd = "php{$php} ./action.php config={$path} display={$display} debug={$debug} cd=0";
	exec($cmd, $output, $status);
	if( $status ){
		echo " * $cmd --> $status \n";
		echo join("\n", $output);
		continue;
	}

	//	CD
	$cmd = "php{$php} ./action.php config={$path} display={$display} debug={$debug} ci=0 rebase=0";
	exec($cmd, $output, $status);
	if( $status ){
		echo " * $cmd --> $status \n";
		echo join("\n", $output);
		continue;
	}
}
