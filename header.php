<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M. M. A. Hospital, Occupational Health Centre</title>
<link href="<?=$siteURL?>styles/global.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$siteURL?>styles/uniform.default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$siteURL?>styles/print.css" type="text/css" media="print" />

		
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
           <?php include("menu.php");?>
    </div><!--/nav-->
<!--  end header section --->
<div class="cf"></div>