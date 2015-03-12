<?php
class moduleCore {
	function reg (){
		return Registry::getInstance();	
	}
	function db_query($query, $param = array()){
		$pdo = $this->reg()->pdo;
		try{
			$stmt = $pdo->prepare($query);
			$stmt->execute($param);
			return $stmt;
		}catch (PDOExeption $ex){
				die($ex);
		}
	}
	
	function db_last_id($pdo = "master"){
		return $this->reg()->pdo->$pdo->lastInsertId();
	}
	
	function hasPermission($permission){
		$array = $this->reg()->permissionsarray;
		if(array_key_exists($permission,$array)){
			if($array[$permission] == 'allow'){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function setPermission($permission,$value = 'deny'){
		$array = $this->reg()->permissionsarray;
		if (!array_key_exists($permission, $array)) {
			$array[$permission] = $value;
			$this->reg()->permissionsarray = $array;
			return true;
		}else{
			return false;
		}
		
	}
	function setOutput($class,$function = 'out'){
		$modclass = 'call';
		$modreg = $this->reg()->$modclass;
		$modreg[$class] = $function;
		$this->reg()->$modclass = $modreg;	
		
	}
	function addMenu($menu){
		$menuarray = $this->reg()->menu;
		array_push($menuarray,$menu);
		$this->reg()->menu = $menuarray;
	}
	function getPublicUrl(){
		return $this->reg()->config['publicfiles'];	
	}
	function setParam($key,$val){
		$array = $this->reg()->publicParameter;
		$array[$key] = $val;
		$this->reg()->publicParameter = $array;
	}
	function getParam($key){
		$array = $this->reg()->publicParameter;
		if(array_key_exists($key,$array)){
			return $array[$key];
		}
			return 'Key not found';
	}
	function setJavascript($file){
		
	}
	function setStylesheet($file){
		
	}
}
?>
