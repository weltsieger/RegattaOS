<?php
require_once 'config.php';
require_once 'registry.class.php';
$reg = Registry::getInstance();
// Sez Registry
$reg->config = $config;
$reg->permissionsarray = array();
$reg->menu = array();
$reg->call = array();
$reg->publicParameter = array();
$reg->pdo = new PDO('mysql:host='.$config['mysql_host'].';dbname='.$config['mysql_db'].';charset=utf8', $config['mysql_user'], $config['mysql_pass']);
require_once 'moduleCore.class.php';
require_once 'moduleLauncher.class.php';
$launcher = new moduleLauncher;

if(isset($_GET['m'])){
	
if(isset($reg->call[$_GET['m']])){
	$cf = 'm_'.$_GET['m'];
	$modfunc = $reg->call[$_GET['m']];
	$module = $reg->$cf;
	$module->$modfunc();
}

}

?>
