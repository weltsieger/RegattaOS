<?php
class bootstrap extends moduleCore{
	function preload (){
	}
	function getHeader(){
		$return = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>'.$this->getParam('title').'</title>

    <!-- Bootstrap -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
  </head>
  <body>';
  return $return;
	}
	function getFooter(){
		$return = '</body></html>';
		return $return;
	}
	function getNav(){
		$menu = $this->reg()->menu;
		$out = '
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav">
        <span class="sr-only">Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">'.$this->reg()->config['title'].'</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="mainnav">
      <ul class="nav navbar-nav">
	  ';
	  foreach ($menu as $link){
		  if(isset($link['submenu'])){
			  if(isset($link['active']) && $link['active'] == "true"){
			  $out .= '<li class="dropdown active">';
			  }else{
			  $out .= '<li class="dropdown">';
			  }
		  }else{
		  	  if(isset($link['active']) && $link['active'] == "true"){
			  $out .= '<li class="active">';
			  }else{
			  $out .= '<li>';
			  }  
		  }
		  if(isset($link['submenu'])){
			  $out .= '<a href="'.$link['url'].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$link['title'].' <span class="caret"></span></a>';
		  }else{
				  $out .= '<a href="'.$link['url'].'">'.$link['title'].'</a>';
			  
		  }
		  if(isset($link['submenu'])){
			  $out .= '<ul class="dropdown-menu" role="menu">';
		  	foreach ($link['submenu'] as $sub){
			  	$out .= '<li><a href="'.$sub['url'].'">'.$sub['title'].'</a></li>';
		  	}
			$out .= "</ul>";
		  }
			  $out .= '</li>';
		  
	  }
        $out .= '</ul>
    </div>
  </div>
</nav>';
	return $out;
	}
}
?>
