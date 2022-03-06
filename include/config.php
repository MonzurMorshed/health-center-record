<?php
error_reporting(E_ALL); // error_reporting level will show all error types. 
//ini_set('memory_limit', -1);	
//Email responses
$admin 					= "saylee.erande@gmail.com"; //deepak@invitratech.com
$admin_email				= "saylee.erande@gmail.com";




//$siteURL					= "http://web-virtuoso.com/MMAHospital/";
$siteURL					= "http://localhost/mmahospital/";
// $siteURL					= "http://103.146.154.146/mmahospital/";

$siteURL_admin					= "http://web-virtuoso.com/MMAHospital/admin/";
$siteForumURL					= "http://web-virtuoso.com/MMAHospital/forum";
$dirpath 					= "E:\xampp\htdocs\mmahospital";// change as per folder location

$host 						= "localhost";
$dbuid						= "root";
$dbpwd 						= "";
$dbname						= "mma";



//make db connection for all files
include("dbabstract.mysql.class.php");	
$db = new dbabstract($host,$dbuid,$dbpwd,$dbname,1);
if($db->error) {
    die($db->errorMessage);
}
$dir						= $_SERVER['SCRIPT_FILENAME'];
$rootPath					= $_SERVER["DOCUMENT_ROOT"]."/";
$imgPath					= $siteURL . "images/";
?>
