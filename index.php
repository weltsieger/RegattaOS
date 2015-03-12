<?php
session_start();
ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE);
define(ROS,__DIR__.'/');
define(ROS_TEMPLATE,ROS.'template/');
define(ROS_MODULES,ROS.'modules/');
define(ROS_DOCUMENTS,ROS.'documents/');
require_once 'core/core.php';
?>
