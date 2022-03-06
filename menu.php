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
<ul>
	<li><a href="<?=$siteURL?>record.php" class="<?=$menu1?>" id="add_record"><span>Add Health Record</span></a></li>
	<li><a href="<?=$siteURL?>edit_delete.php" class="<?=$menu2?>" id="edit_delete"><span>Edit / Delete Health Record</span></a></li>
	<!--li><a href="<?=$siteURL?>card.html"><span>Create Card</span></a></li-->
	<li><a href="<?=$siteURL?>record_summary.php" class="<?=$menu3?>" id="record_summary"><span>Record Summary</span></a></li>
	<li><a href="<?=$siteURL?>search_result.php" class="<?=$menu4?>" id="search_record"><span>Search Record</span></a></li>
</ul>

<div class="logout">
<img src="<?=$siteURL?>images/btn_logout.png" width="105" height="35" alt="Logout" onclick="window.location='logout.php'" /></div>
