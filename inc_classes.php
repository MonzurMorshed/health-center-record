<?php
	include("include/config.php");
	include("include/functions.php");
	include("classes/Paginator.class.php");
	
	function __autoload($className)
	{		
		@include_once("classes/{$className}.php");
	}
	

?>
