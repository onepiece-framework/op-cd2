<?php
/** op-cd2:/config.php
 *
 * @created    2023-11-30
 * @version    1.0
 * @package    op-cd2
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

//	...
$config = [];
$config['path']      = '/www/workspace/2022/php80/';
$config['origin']    = '~/repo/op/skeleton/2022.git';
$config['upstream']  = 'app3:~/repo/op/skeleton/2022.git';
$config['github']    = 'TomoakiNagahara'; // GitHub account (user name)
$config['branch']    = 'php80'; // This is the main branch name. For each submodule branch name is taken from .gitmodules files.
$config['gitmodules']=[ // Which .gitmodules file.
	'origin'   => 'local',
	'upstream' => 'app3',
	'host_name'=> 'app3',
];
$config['display']   = '0';
$config['debug']     = '0';
$config['version']   = '80, 81, 82'; // PHP version to inspect.
$config['cd']['php'] = '80'; // PHP version when running CD.

//	...
return $config;
