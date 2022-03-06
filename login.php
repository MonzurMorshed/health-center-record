<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M. M. A. Hospital, Occupational Health Centre</title>
<link href="styles/global.css" rel="stylesheet" type="text/css" />

<?php
include("inc_classes.php");
?>
</head>

<body id="login">
<?php 
//include('header.php');
$trStyle ="display:none;";
if(isset($_POST['username']))
{
	//print_r($_POST);
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql	= "SELECT * FROM admin_user where email= '$username' AND password = '$password'";
	$result	= $db->executeQuery($sql);
	$rs		= $db->getResultSetArray();
	
	if($result > 0)
	{
		session_start();
		$_SESSION['username'] ="$username";
		//print_r($_SESSION);
		//session_unset() ;
		echo "<script>window.location='record.php';</script>";
	}
	else
	{
		$trStyle ="display:block;";
	}
}

?>
<div id="login_wrapper">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="loginBox">
      <tr>
        <td class="loginPanel">
        	<form action="" method="post" name="loginFrm">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="logintable">
                  <tr style="<?=$trStyle;?>">
                    <td colspan="2" >Please Enter Valid Login Details</td>
                  </tr>
				  <tr>
                    <td align="right" width="158">User Name:</td>
                    <td><input name="username" type="text" class="textbox" /></td>
                  </tr>
                  <tr>
                    <td align="right">Password:</td>
                    <td><input name="password" type="password" class="textbox" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input name="sbm_frm" type="image" src="images/btn_login.png" class="loginBtn" title="Login" /></td>
                  </tr>
                </table>
            </form>
        </td>
        <td class="labPic">&nbsp;</td>
      </tr>
    </table>
<!-- Footer Section -->
<div id="footer">
Designed &amp; Developed by <a href="http://www.web-virtuoso.com" target="_blank">Web Virtuoso</a></div>
<!-- end Footer Section -->
    
</div>


</body>
</html>
