<?php
class moduleLauncher {
	var $reg;
	function __construct(){
		$this->reg = Registry::getInstance();
		$this->registerModules();
	}
	function registerModules(){
		$modules = scandir(ROS_MODULES);
		unset($modules[0],$modules[1]);
    	foreach($modules as $module){
          if(file_exists(ROS_MODULES . $module .'/index.php')){
            require_once ROS_MODULES . $module .'/index.php';
            if(class_exists($module)){
            		 if($this->reg->exists('modules'))
            		 	$moduleregistry = $this->reg->modules;
            		 else;
            		 	$moduleregistry = array();
            		 endif;
        		array_push($moduleregister,$module);
        		$this->reg->modules = $moduleregister;
			  $module_data = 'm_'.$module;
			  $module_call = 'call_'.$module;
              $this->reg->$module_data = new $module;
			  $this->reg->$module_data->preload();
            }
          }
        }
		
        
	}
}
?>
