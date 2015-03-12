<?php
class index extends moduleCore{
	function preload (){
		$menu = array(
		"title" => "Home",
		"url" => "index.php?m=index",
		);
		parent::addMenu($menu);
		parent::setOutput(__CLASS__);
	}
	function out(){
		$this->setParam('title','BlockSpot Minecraft Server');
		echo($this->reg()->m_bootstrap->getHeader());
		echo($this->reg()->m_bootstrap->getNav());
		
		echo($this->reg()->m_bootstrap->getFooter());
	}
}
?>
