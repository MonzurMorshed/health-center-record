<?php
session_start();
include("inc_classes.php");
include("loginChk.php");
$ObjPatientRecord					= new patientRecord();
$patient_details=array();
if(isset($_POST['searchRecord']))
{
	$condition = "";

	//print_r($_POST);
	$CompanyName 		= $_POST['CompanyName'];
	$checkup_type 		= $_POST['checkup_type'];
	
	
	if($CompanyName !="" AND $CompanyName !="Company Name")
	{
		$condition .= "company_name like '%".$CompanyName."%' AND ";
	}	
	$condition .= "checkup_type = '".$checkup_type."'";
	
	$patient_details = $ObjPatientRecord->patient_details($condition);
}
else
{
	//$patient_details = $ObjPatientRecord->patient_details(" 1");
}

// Import functionalities

	if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		

		if($_FILES["file"]["size"] > 0)
		{
			$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
			{
				
				$sql = "INSERT INTO patient_record 
                values (
					
					'".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."',
					'".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."',
					'".$getData[15]."','".$getData[16]."','".$getData[17]."','".$getData[18]."','".$getData[19]."','".$getData[20]."','".$getData[21]."','".$getData[22]."'
				    ,'".$getData[23]."','".$getData[24]."','".$getData[25]."','".$getData[26]."','".$getData[27]."','".$getData[28]."',
					'".$getData[29]."','".$getData[30]."','".$getData[31]."','".$getData[32]."','".$getData[33]."','".$getData[34]."','".$getData[35]."','".$getData[36]."','".$getData[37]."'
				    ,'".$getData[38]."','".$getData[39]."','".$getData[40]."','".$getData[41]."','".$getData[42]."','".$getData[43]."',
					'".$getData[44]."','".$getData[45]."','".$getData[46]."','".$getData[47]."','".$getData[48]."','".$getData[49]."','".$getData[50]."','".$getData[51]."','".$getData[52]."'
				    ,'".$getData[53]."','".$getData[54]."','".$getData[55]."','".$getData[56]."','".$getData[57]."','".$getData[58]."',
					'".$getData[59]."','".$getData[60]."','".$getData[61]."','".$getData[62]."','".$getData[63]."','".$getData[64]."','".$getData[65]."','".$getData[66]."','".$getData[67]."'
				    ,'".$getData[68]."','".$getData[69]."','".$getData[70]."','".$getData[71]."','".$getData[72]."','".$getData[73]."',
					'".$getData[74]."','".$getData[75]."','".$getData[76]."','".$getData[77]."','".$getData[78]."','".$getData[79]."','".$getData[80]."'
					,'".$getData[81]."','".$getData[82]."','".$getData[83]."',
					'".$getData[84]."','".$getData[85]."','".$getData[86]."','".$getData[87]."','".$getData[88]."','".$getData[89]."','".$getData[90]."',
					'".$getData[91]."','".$getData[92]."','".$getData[93]."',
					'".$getData[94]."','".$getData[95]."','".$getData[96]."','".$getData[97]."','".$getData[98]."','".$getData[99]."','".$getData[100]."',
					'".$getData[101]."','".$getData[102]."','".$getData[103]."',
					'".$getData[104]."','".$getData[105]."','".$getData[106]."','".$getData[107]."','".$getData[10]."'
				)";

				$result = $db->executeQuery($sql);
	         }
			
	         fclose($file);	
		 }
	}
	
?>


<script>
	function removeText(id,text)
	{
		var field = document.getElementById(id);
		if(field.value == text)
		{
			field.value = "";
		}
		
	}
	function addText(id,text)
	{
		var field = document.getElementById(id);
		if(field.value == "")
		{
			field.value = text;
		}
	}
</script>
<?php include("header.php");?>
<link rel="stylesheet" href="styles/listings.css" type="text/css" media="screen">

<div class="cf"></div>

<!--  body section --->	
	<div id="container">
    	<div id="search">
        	<form action="record_summary.php" method="post" class="niceform" name="companySearch">
              <strong>Show Records for:</strong>
              <input name="CompanyName" id="CompanyName" value="Company Name" type="text" size="32" onclick="removeText('CompanyName','Company Name');" onBlur="addText('CompanyName','Company Name');"/> 
			  <input name="checkup_type" type="radio" value="pre" checked /> <label>Pre-employment</label> 
			  <input name="checkup_type" type="radio"  value="annual"/> <label>Annual</label> 
			  <input name="checkup_type" type="radio"  value="periodic"/> <label>Periodic</label> 
			  <!--input name="searchRecord" type="image" src="images/btn_show.png" alt="Search Record" align="bottom" class="searchbtn" /-->
			  
			  <input type="submit" name="searchRecord" value="Search" />
        	</form>

			<!-- import & export form -->
			<form class="import_niceform form-horizontal" action="record_summary.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <input type="file" name="file" id="file">
                <input type="submit" id="submit" name="Import" value="file upload"/>
            </form>

			
			<form class="export_niceform form-horizontal" action="export.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <input type="submit" name="Export" class="btn btn-success" value="Export to excel"  onClick="export()"/>
            </form> 
			<!-- end -->

        </div><!--/search-->
        <?if(isset($checkup_type))
		{
		?>
      	<h4>Employment Health Record Summary - Medical Checkup (<?php if($checkup_type == "pre"){ echo "Pre-employment";}else { echo ucfirst($checkup_type);}?>)</h4>
        <?
		}
		?>
      <div id="listing">
       	<p><?php echo $date = date('d-m-Y');?></p>
   	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
       	  <?php if(isset($CompanyName)){?><caption>Company: <?php echo strip($CompanyName); }?></caption>
            <thead>
              <tr>
				
                <th width="6%" align="center">Sr. No.</th>
                <th width="4%" align="right">ID</th>
                <th align="left">Patient Name</th>
                <th width="8%" align="left">Age</th>
                <th width="20%" align="left">Nature Of Work</th>
                <th width="20%" align="left">Comment</th>
                <th width="20%" align="left">Advice</th>
              </tr>
            </thead>
			<?php
			$cnt=1;
					if(count($patient_details) > 0)
					{
						for ($i=0;$i<count($patient_details);$i++)
						{								
							$ObjPatientRecord->row		= $patient_details[$i];
									
							$ObjPatientRecord->patient_id 			= $ObjPatientRecord->row['patient_id'];
							$ObjPatientRecord->checkup_type 		= $ObjPatientRecord->row['checkup_type'];
							$ObjPatientRecord->company_name 		= strip($ObjPatientRecord->row['company_name']);
							$ObjPatientRecord->patient_name 		= strip($ObjPatientRecord->row['patient_name']);	
							$ObjPatientRecord->date_of_examination 	= $ObjPatientRecord->row['date_of_examination'];						
							$ObjPatientRecord->patient_age 			= $ObjPatientRecord->row['patient_age'];						
							$ObjPatientRecord->nature_of_work 		= $ObjPatientRecord->row['nature_of_work'];						
							$ObjPatientRecord->comment 				= $ObjPatientRecord->row['comment'];						
							$ObjPatientRecord->Advice 				= $ObjPatientRecord->row['Advice'];						
						?>
							<tr>
							    
								<td align="center"><?php echo $cnt;?></td>
								<td align="right"><?php echo $ObjPatientRecord->patient_id;?></td>
								<td><?php echo $ObjPatientRecord->patient_name;?></td>
								<td align="left"><?php echo $ObjPatientRecord->patient_age;?></td>
								<td align="left"><?php echo $ObjPatientRecord->nature_of_work;?></td>
								<td align="left"><?php echo $ObjPatientRecord->comment;?></td>
								<td align="left"><?php echo $ObjPatientRecord->Advice;?></td>
							</tr>
						<?php
							$cnt++;
						}
						
					}
					else
					{
						?>
						<tr>
							<td align="left" colspan="7"><?php echo "No Records Found!";?></td>
						</tr>
						<?php
						
					}
				  ?>
            
            
          </table>        
        </div><!--/listing-->
        <div class="action">
		<!--input name="Save" value="Print Summary" type="button" onclick="PrintElem('#listing')" /-->
		<input name="Save" value="Print Summary" type="button" onclick="window.print()" />
		</div>
      <div class="cf"></div>
    </div>	<!--/container-->
<!--  end body section --->	


<!-- Footer Section -->
<?php include("footer.php");?>

