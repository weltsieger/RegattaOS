<?php
class dashboard extends moduleCore{
	function preload (){
		$menu = array(
		"title" => "Dashboard",
		"url" => "index.php?m=dashboard",
		"submenu" => array(array(
		"title" => "Submenu",
		"url" => "#"
		))
		);
		//parent::addMenu($menu);
		parent::setPermission('dashboard.view','allow');
		parent::setPermission('dashboard.edit');
		parent::setOutput(__CLASS__);
	}
	function out(){
		if($this->hasPermission('dashboard.view')){
			$this->setParam('title','Dashboard');
		}else{
		$this->setParam('title','Permission Denied');
		}
		echo($this->reg()->m_bootstrap->getHeader());
		echo($this->reg()->m_bootstrap->getNav());
		echo($this->reg()->m_bootstrap->getFooter());
	}
}
?>
