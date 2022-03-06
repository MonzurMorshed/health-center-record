<?php
//print_r($_SESSION);
	if(isset($_SESSION["username"]))
	{
		//header_redirect("index.php",$_SERVER['QUERY_STRING']);
		//die($_SERVER['QUERY_STRING']);
		//$pagelink			= base64_encode($pagename.".php?".$_SERVER['QUERY_STRING']);
		
	}
	else
	{
		echo "<script language='Javascript'>
				window.location.href='".$siteURL."login.php';
			 </script>";
		die();
	}
	
	
	
?>