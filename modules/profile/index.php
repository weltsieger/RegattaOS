<?php
class profile extends moduleCore{
function preload(){
parent::setPermission('profile.edit','allow');
parent::setPermission('profile.other.edit','deny');
parent::setPermission('profile.view','allow');
parent::setPermission('profile.other.view','deny');
parent::setOutput(__CLASS__);
}
function out(){
	//OUTPUT
}
}
?>
