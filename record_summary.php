<?php
// error_reporting(0);
// ini_set('display_errors', 0);
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
		// echo '<pre>';
		// print_r($_FILES);
		// exit;
		$filename=$_FILES["file"]["tmp_name"];		
		$c=1;
		if($_FILES["file"]["size"] > 0)
		{
			

			$file = fopen($filename, "r");
			$i = 0;
			$flag = 0;
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
			{
				$total_data = count($getData);
				if ($total_data != 109) { 
					echo "<script>alert('Something went wrong. Data can not upload.'); </script>";
					break; 
				}else{
					if ($i == 0) { $i++; continue; }
					$flag = 1;
					$patient_birth_date = date('Y-m-d',strtotime($getData[5]));
					$date_of_examination = date('Y-m-d',strtotime($getData[9]));
					$addon = date('Y-m-d H:i:s',strtotime($getData[106]));

					$sql = "INSERT INTO patient_record 
					values (
						
						'".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$patient_birth_date."',
						'".$getData[6]."','".$getData[7]."','".$getData[8]."','".$date_of_examination."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."',
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
						'".$getData[104]."','".$getData[105]."','".$addon."','".$getData[107]."','".$getData[108]."'
					)  
					
					ON DUPLICATE KEY UPDATE   

					checkup_type='".$getData[1]."',company_name='".$getData[2]."',patient_name='".$getData[3]."',patient_education='".$getData[4]."',patient_birth_date='".$patient_birth_date."',
					patient_age='".$getData[6]."',identification_mark='".$getData[7]."',patient_sex='".$getData[8]."',date_of_examination='".$date_of_examination."',mariatal_status='".$getData[10]."',type_of_industry='".$getData[11]."'
					,services_years='".$getData[12]."',service_month='".$getData[13]."',nature_of_work='".$getData[14]."',
					ppe_used='".$getData[15]."',smoking='".$getData[16]."',alcohol='".$getData[17]."',tobaco='".$getData[18]."',gutakha='".$getData[19]."',	habit_other='".$getData[20]."',habit_otherText='".$getData[21]."',habit_none='".$getData[22]."'
					,past_illness_record='".$getData[23]."',father_idh='".$getData[24]."',father_htn='".$getData[25]."',father_dn='".$getData[26]."',father_asthama='".$getData[27]."',father_koch='".$getData[28]."',
					father_tremors='".$getData[29]."',father_other='".$getData[30]."',father_otherText='".$getData[31]."',father_none='".$getData[32]."',mother_idh='".$getData[33]."',mother_htn='".$getData[34]."',mother_dm='".$getData[35]."',mother_asthama='".$getData[36]."',mother_koch='".$getData[37]."'
					,mother_tremors='".$getData[38]."',mother_other='".$getData[39]."',mother_otherText='".$getData[40]."',	mother_none='".$getData[41]."'
					,pysical_handicap='".$getData[42]."',HO_health_hazatd='".$getData[43]."',
					HO_allergies='".$getData[44]."',HO_exposure='".$getData[45]."',present_compliaints='".$getData[46]."',mutation='".$getData[47]."',obs_gyneac='".$getData[48]."',height='".$getData[49]."',weight='".$getData[50]."',BMI='".$getData[51]."',BP='".$getData[52]."'
					,pulse='".$getData[53]."',icterus='".$getData[54]."',edema='".$getData[55]."',pollar='".$getData[56]."',cyanosis='".$getData[57]."',glands='".$getData[58]."',oral_cavity='".$getData[59]."',hermial_sites='".$getData[60]."',examination_other='".$getData[61]."',examination_otherText='".$getData[62]."',examination_nill='".$getData[63]."',CVS='".$getData[64]."'
					,RS='".$getData[65]."',PA='".$getData[66]."',CNS='".$getData[67]."'
					,visual_acuityLeft='".$getData[68]."',visual_acuityRight='".$getData[69]."',color_version='".$getData[70]."',audiometry_left_ear='".$getData[71]."',audiometry_right_ear='".$getData[72]."'
					,lungFunction='".$getData[73]."',heamoglobin=
					'".$getData[74]."',total_count='".$getData[75]."',DC_nutrophil='".$getData[76]."',eosinophil='".$getData[77]."',lymphocyte='".$getData[78]."',basophill='".$getData[79]."',monocyte='".$getData[80]."'
					,protien='".$getData[81]."',sugar='".$getData[82]."',RBC='".$getData[83]."',pus_cell=
					'".$getData[84]."',epithelial_cell='".$getData[85]."',urinTest_other='".$getData[86]."',blood_group='".$getData[87]."',RHfactor='".$getData[88]."',ESR='".$getData[89]."',cholesterol='".$getData[90]."',ECG=
					'".$getData[91]."',PFT='".$getData[92]."',USG='".$getData[93]."',x_ray_chest='".$getData[94]."',BSL_random='".$getData[95]."',BSL_FF='".$getData[96]."',BSL_PP='".$getData[97]."',KFT_blood_urea='".$getData[98]."',KFT_serum='".$getData[99]."',comment='".$getData[100]."',Advice=
					'".$getData[101]."',Additional_Info='".$getData[102]."',medical_fitness='".$getData[103]."',doctor_name=
					'".$getData[104]."',docyor_qualification='".$getData[105]."',Added_on='".$addon."',surgeonName='".$getData[107]."',surgeonQualifications='".$getData[108]."'
					";

					$result = $db->executeQuery($sql);

					$i++;
				}
	        }
			
	        fclose($file);

			if($flag == 1){
				echo "<script>alert('Data uploaded successfully.');</script>";
			}

			 
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
                <input type="file"  accept=".xlsx, .xls, .csv" name="file" id="file">
                <input type="submit" id="submit" name="Import" value="file upload"/>
            </form>

			
			<form class="export_niceform form-horizontal" action="export.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <input type="submit" name="Export" class="btn btn-success" value="Export to excel"  onClick="export()"/>
            </form> 

			<input type="submit" name="Export" class="btn btn-success" value="Export to Pdf"  onClick="exportDataAsPdf()"/>

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


<script>
	function exportDataAsPdf(){
		window.open('export_all_data_to_pdf.php');
	}
</script>


<!-- Footer Section -->
<?php include("footer.php");?>

