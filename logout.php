<?php
session_unset() ;
if(!isset($_SESSION))
{
	echo "<script>window.location='login.php';</script>";
}

?>