<?php
// session_start();
// include("inc_classes.php");
// include("loginChk.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M. M. A. Hospital, Occupational Health Centre</title>
<style>
  .exportbtn{
        margin-bottom: 8px;
  }
   input[type=checkbox]{
     margin: 0px 0 0;
    }
 </style>
<link href="<?=$siteURL?>styles/global.css" rel="stylesheet" type="text/css" media="screen" />
<!-- <link rel="stylesheet" href="<?=$siteURL?>styles/uniform.default.css" type="text/css" media="screen" /> -->
<link rel="stylesheet" href="<?=$siteURL?>styles/print.css" type="text/css" media="print" />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		
<script src="<?=$siteURL?>scripts/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=$siteURL?>scripts/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>


<link href="<?=$siteURL?>styles/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?=$siteURL?>scripts/calendar_us_inside.js"></script>
<input type="hidden" value="add_record" id="menuName">
<script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, textarea, select, input:checkbox, input:radio, input:file").uniform();
      });
	function PrintElem(elem)
    {
        Popup($(elem).html());
    }

	function Popup(data) 
    {
        var mywindow = window.open('', 'listing', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Record Summary</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close();
        mywindow.print();
        return true;
    }
	
	function calculateAge()
	{
		var currentDate = new Date();
		alert(currentDate);
	}

</script>

<style>
    a:hover {
    color: #0056b3;
    text-decoration: none !important;}
    .mybtn{
        font-size:1.4rem !important;
       height:35px;
       padding-right: 20px;
margin-right:10px;
background-color:#849A20 ;
    }

    .mybtn:hover{

background-color:#4E5D06 ;
    }
    .mybtn:active{

background-color:#4E5D06 ;
    }
    
</style>
</head>

<body id="internal">

<div id="site_wrapper">
	<div id="hospName">
            	<h1>M. M. A. Hospital, Occupational Health Center</h1>
                <ul>
                	<li>Near Telephone Exchange, MIDC, Mahad - Raigad.</li>
                    <li><strong>Tel:</strong> (02145) 232562, 233879</li>
                    <li style="margin-right:0;"><strong>E-mail:</strong> mmahospital@gmail.com</li>
                </ul>
    </div>
<!--  header section --->	
    <div id="nav">
          <?php
$menu1="";$menu2="";$menu3="";$menu4="";

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
//$find = 'record.php';
if(strpos($url,'record.php'))
{
	$menu1 = "active";
}

if(strpos($url,'edit_delete.php'))
{
	$menu2 = "active";
}
if(strpos($url,'record_summary.php'))
{
	$menu3 = "active";
}
if(strpos($url,'search_result.php'))
{
	$menu4 = "active";
}
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <ul class="nav">
					<button class="btn align-middle mybtn" type="button"><a style="color: white!important; text-decoration: none !mportant;" href="<?=$siteURL?>record.php" class="<?=$menu1?>" id="add_record" >Add Health Record</a></button>
					<button class="btn align-middle mybtn" type="button"><a style="color: white!important; text-decoration: none !mportant;" href="<?=$siteURL?>edit_delete.php" class="<?=$menu2?>" id="add_record" >Edit / Delete Health Record</a></button>
					<button class="btn align-middle mybtn" type="button"><a style="color: white!important; text-decoration: none !mportant;" href="<?=$siteURL?>record_summary.php" class="<?=$menu3?>" id="add_record" >Record Summary</a></button>
					<button class="btn align-middle mybtn" type="button"><a style="color: white!important; text-decoration: none !mportant;" href="<?=$siteURL?>search_result.php" class="<?=$menu4?>" id="add_record" >Search Record</a></button>
					
    </ul>
    <ul class="nav navbar-nav navbar-right">
					<button class="btn align-middle mybtn" type="button"><a style="color: white!important; text-decoration: none !mportant;" href="<?=$siteURL?>login.php" ><span style="margin-right:5px" class="glyphicon glyphicon-log-in"></span>Logout</a></button>
      <!-- <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
    </ul>
  </div>
		</nav>

    </div><!--/nav-->
<!--  end header section --->
<div class="cf"></div>


