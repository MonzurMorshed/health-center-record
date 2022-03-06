<?php
session_start();
include("inc_classes.php");
include("loginChk.php");
$ObjPatientRecord					= new patientRecord();

if(isset($_GET['pid']))
{
	$ObjPatientRecord->patient_id = $_GET['pid'];
	
	$patient_details = $ObjPatientRecord->patient_details("patient_id = $ObjPatientRecord->patient_id ");
	for ($i=0;$i<count($patient_details);$i++)
	{	
		$ObjPatientRecord->row		= $patient_details[$i];
				
		$ObjPatientRecord->patient_id 			= $ObjPatientRecord->row['patient_id'];
		$ObjPatientRecord->checkup_type 		= $ObjPatientRecord->row['checkup_type'];
		$ObjPatientRecord->company_name 		= strip($ObjPatientRecord->row['company_name']);
		$ObjPatientRecord->patient_name 		= strip($ObjPatientRecord->row['patient_name']);
		$ObjPatientRecord->patient_education 	= $ObjPatientRecord->row['patient_education'];
		$ObjPatientRecord->patient_birth_date 	= $ObjPatientRecord->row['patient_birth_date'];
		$ObjPatientRecord->patient_age 			= $ObjPatientRecord->row['patient_age'];
		$ObjPatientRecord->identification_mark 	= $ObjPatientRecord->row['identification_mark'];
		$ObjPatientRecord->patient_sex 			= $ObjPatientRecord->row['patient_sex'];
		$ObjPatientRecord->date_of_examination 	= $ObjPatientRecord->row['date_of_examination'];
		$ObjPatientRecord->mariatal_status 		= $ObjPatientRecord->row['mariatal_status'];
		$ObjPatientRecord->type_of_industry 	= $ObjPatientRecord->row['type_of_industry'];
		$ObjPatientRecord->services_years 		= $ObjPatientRecord->row['services_years'];
		$ObjPatientRecord->service_month 		= $ObjPatientRecord->row['service_month'];
		$ObjPatientRecord->nature_of_work 		= $ObjPatientRecord->row['nature_of_work'];
		$ObjPatientRecord->ppe_used 			= $ObjPatientRecord->row['ppe_used'];
		$ObjPatientRecord->smoking 				= $ObjPatientRecord->row['smoking'];
		$ObjPatientRecord->alcohol 				= $ObjPatientRecord->row['alcohol'];
		$ObjPatientRecord->tobaco 				= $ObjPatientRecord->row['tobaco'];
		$ObjPatientRecord->gutakha 				= $ObjPatientRecord->row['gutakha'];
		$ObjPatientRecord->habit_other 			= $ObjPatientRecord->row['habit_other'];
		$ObjPatientRecord->habit_otherText 		= $ObjPatientRecord->row['habit_otherText'];
		$ObjPatientRecord->habit_none 			= $ObjPatientRecord->row['habit_none'];
		$ObjPatientRecord->past_illness_record 	= $ObjPatientRecord->row['past_illness_record'];
		$ObjPatientRecord->father_idh 			= $ObjPatientRecord->row['father_idh'];
		$ObjPatientRecord->father_htn 			= $ObjPatientRecord->row['father_htn'];
		$ObjPatientRecord->father_dn 			= $ObjPatientRecord->row['father_dn'];
		$ObjPatientRecord->father_asthama 		= $ObjPatientRecord->row['father_asthama'];
		$ObjPatientRecord->father_koch 			= $ObjPatientRecord->row['father_koch'];
		$ObjPatientRecord->father_tremors 		= $ObjPatientRecord->row['father_tremors'];
		$ObjPatientRecord->father_other 		= $ObjPatientRecord->row['father_other'];
		$ObjPatientRecord->father_otherText 	= $ObjPatientRecord->row['father_otherText'];
		$ObjPatientRecord->father_none 			= $ObjPatientRecord->row['father_none'];
		$ObjPatientRecord->mother_idh 			= $ObjPatientRecord->row['mother_idh'];
		$ObjPatientRecord->mother_htn 			= $ObjPatientRecord->row['mother_htn'];
		$ObjPatientRecord->mother_dm 			= $ObjPatientRecord->row['mother_dm'];
		$ObjPatientRecord->mother_asthama 		= $ObjPatientRecord->row['mother_asthama'];
		$ObjPatientRecord->mother_koch 			= $ObjPatientRecord->row['mother_koch'];
		$ObjPatientRecord->mother_tremors 		= $ObjPatientRecord->row['mother_tremors'];
		$ObjPatientRecord->mother_other 		= $ObjPatientRecord->row['mother_other'];
		$ObjPatientRecord->mother_otherText 	= $ObjPatientRecord->row['mother_otherText'];
		$ObjPatientRecord->mother_none 			= $ObjPatientRecord->row['mother_none'];
		$ObjPatientRecord->pysical_handicap 	= $ObjPatientRecord->row['pysical_handicap'];
		$ObjPatientRecord->HO_health_hazatd 	= $ObjPatientRecord->row['HO_health_hazatd'];
		$ObjPatientRecord->HO_allergies 		= $ObjPatientRecord->row['HO_allergies'];
		$ObjPatientRecord->HO_exposure 			= $ObjPatientRecord->row['HO_exposure'];
		$ObjPatientRecord->present_compliaints 	= $ObjPatientRecord->row['present_compliaints'];
		$ObjPatientRecord->mutation 			= $ObjPatientRecord->row['mutation'];
		$ObjPatientRecord->obs_gyneac 			= $ObjPatientRecord->row['obs_gyneac'];
		$ObjPatientRecord->height 				= $ObjPatientRecord->row['height'];
		$ObjPatientRecord->weight 				= $ObjPatientRecord->row['weight'];
		$ObjPatientRecord->BMI 					= $ObjPatientRecord->row['BMI'];
		$ObjPatientRecord->BP 					= $ObjPatientRecord->row['BP'];
		$ObjPatientRecord->pulse 				= $ObjPatientRecord->row['pulse'];
		$ObjPatientRecord->icterus 				= $ObjPatientRecord->row['icterus'];
		$ObjPatientRecord->edema 				= $ObjPatientRecord->row['edema'];
		$ObjPatientRecord->pollar 				= $ObjPatientRecord->row['pollar'];
		$ObjPatientRecord->cyanosis 			= $ObjPatientRecord->row['cyanosis'];
		$ObjPatientRecord->glands 				= $ObjPatientRecord->row['glands'];
		$ObjPatientRecord->oral_cavity 			= $ObjPatientRecord->row['oral_cavity'];
		$ObjPatientRecord->hermial_sites 		= $ObjPatientRecord->row['hermial_sites'];
		$ObjPatientRecord->examination_other 	= $ObjPatientRecord->row['examination_other'];
		$ObjPatientRecord->examination_otherText = $ObjPatientRecord->row['examination_otherText'];
		$ObjPatientRecord->examination_nill 	= $ObjPatientRecord->row['examination_nill'];
		$ObjPatientRecord->CVS 					= $ObjPatientRecord->row['CVS'];
		$ObjPatientRecord->RS 					= $ObjPatientRecord->row['RS'];
		$ObjPatientRecord->PA 					= $ObjPatientRecord->row['PA'];
		$ObjPatientRecord->CNS 					= $ObjPatientRecord->row['CNS'];
		$ObjPatientRecord->visual_acuityLeft 	= $ObjPatientRecord->row['visual_acuityLeft'];
		$ObjPatientRecord->visual_acuityRight 		= $ObjPatientRecord->row['visual_acuityRight'];
		$ObjPatientRecord->color_version 		= $ObjPatientRecord->row['color_version'];
		$ObjPatientRecord->audiometry_left_ear 	= $ObjPatientRecord->row['audiometry_left_ear'];
		$ObjPatientRecord->audiometry_right_ear = $ObjPatientRecord->row['audiometry_right_ear'];
		$ObjPatientRecord->lungFunction 		= $ObjPatientRecord->row['lungFunction'];
		$ObjPatientRecord->heamoglobin 			= $ObjPatientRecord->row['heamoglobin'];
		$ObjPatientRecord->total_count 			= $ObjPatientRecord->row['total_count'];
		$ObjPatientRecord->DC_nutrophil 		= $ObjPatientRecord->row['DC_nutrophil'];
		$ObjPatientRecord->eosinophil 			= $ObjPatientRecord->row['eosinophil'];
		$ObjPatientRecord->lymphocyte 			= $ObjPatientRecord->row['lymphocyte'];
		$ObjPatientRecord->basophill 			= $ObjPatientRecord->row['basophill'];
		$ObjPatientRecord->monocyte 			= $ObjPatientRecord->row['monocyte'];
		$ObjPatientRecord->protien 				= $ObjPatientRecord->row['protien'];
		$ObjPatientRecord->sugar 				= $ObjPatientRecord->row['sugar'];
		$ObjPatientRecord->RBC 					= $ObjPatientRecord->row['RBC'];
		$ObjPatientRecord->pus_cell 			= $ObjPatientRecord->row['pus_cell'];
		$ObjPatientRecord->epithelial_cell 		= $ObjPatientRecord->row['epithelial_cell'];
		$ObjPatientRecord->urinTest_other 		= $ObjPatientRecord->row['urinTest_other'];
		$ObjPatientRecord->blood_group 			= $ObjPatientRecord->row['blood_group'];
		$ObjPatientRecord->RHfactor 			= $ObjPatientRecord->row['RHfactor'];
		$ObjPatientRecord->ESR 					= $ObjPatientRecord->row['ESR'];
		$ObjPatientRecord->cholesterol 			= $ObjPatientRecord->row['cholesterol'];
		$ObjPatientRecord->ECG 					= $ObjPatientRecord->row['ECG'];
		$ObjPatientRecord->PFT 					= $ObjPatientRecord->row['PFT'];
		$ObjPatientRecord->USG 					= $ObjPatientRecord->row['USG'];
		$ObjPatientRecord->x_ray_chest 			= $ObjPatientRecord->row['x_ray_chest'];
		$ObjPatientRecord->BSL_random 			= $ObjPatientRecord->row['BSL_random'];
		$ObjPatientRecord->BSL_FF 				= $ObjPatientRecord->row['BSL_FF'];
		$ObjPatientRecord->BSL_PP 				= $ObjPatientRecord->row['BSL_PP'];
		$ObjPatientRecord->KFT_blood_urea 		= $ObjPatientRecord->row['KFT_blood_urea'];
		$ObjPatientRecord->KFT_serum 			= $ObjPatientRecord->row['KFT_serum'];
		$ObjPatientRecord->comment 				= $ObjPatientRecord->row['comment'];
		$ObjPatientRecord->Advice 				= $ObjPatientRecord->row['Advice'];
		$ObjPatientRecord->Additional_Info 		= $ObjPatientRecord->row['Additional_Info'];
		$ObjPatientRecord->medical_fitness 		= $ObjPatientRecord->row['medical_fitness'];
		$ObjPatientRecord->doctor_name 			= $ObjPatientRecord->row['doctor_name'];
		$ObjPatientRecord->docyor_qualification = $ObjPatientRecord->row['docyor_qualification'];
		
		$ObjPatientRecord->patient_birth_date 	= date("d-m-Y",strtotime($ObjPatientRecord->patient_birth_date));
		$ObjPatientRecord->date_of_examination 	= date("d-m-Y",strtotime($ObjPatientRecord->date_of_examination));
		
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M. M. A. Hospital, Occupational Health Centre</title>
<link href="styles/global.css" rel="stylesheet" type="text/css" />
<link href="styles/card.css" rel="stylesheet" type="text/css" />
<link href="styles/cardprint.css" rel="stylesheet" type="text/css" media="print" />
<link rel="stylesheet" href="styles/uniform.default.css" type="text/css" media="screen">


<script src="scripts/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="scripts/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
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
        var mywindow = window.open('', 'card_wrapper', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Record Card</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close();
        mywindow.print();
        return true;
    }
</script>


</head>

<body id="internal">

<div id="site_wrapper">

<!--  header section --->	
    <div id="nav">
            <?php include("menu.php");?>  
            
            
    </div><!--/nav-->
<!--  end header section --->

<div class="cf"></div>
<div id="container">
    	<!--div id="search">
        	<form action="" method="get" class="niceform">
              <strong>Create a Card for:</strong>
              <input name="PatientName" value="Patient Name" type="text" size="32" /> <span>OR</span> <input name="ComapanyName" value="Company Name" type="text" size="32" /> <input name="Search" type="image" src="images/btn_search.png" alt="Search Record" align="bottom" class="searchbtn" />
        	</form>
        </div--><!--/search-->
        
        <div id="card_wrapper">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%" align="center" valign="top">
                <div class="cardprint">	

<table width="214" border="0" cellspacing="0" cellpadding="0" class="front">
                      <tr>
                         <td valign="middle" class="borderSolid" style="padding:4px 0">
                        <img src="images/logo.png" width="66" height="64" />	
                        </td>
                         <td valign="middle" class="borderSolid"><h1 class="logoMMA"><strong>M. M. A. Hospital</strong><br /> <span>MIDC, Mahad - Raigad.</span></h1></td>
                      </tr>
                      <tr>
                      	<td colspan="2" align="center" class="borderSolid">
                        	<h2><?php echo ucfirst($ObjPatientRecord->company_name );?></h2>
                        </td>
                      </tr>
                      <tr>
                      	<td colspan="2" valign="top">
                        	<table width="210" border="0" cellspacing="0" cellpadding="0" class="data">
                              <tr class="border">
                                <td align="center" valign="top">
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="58%" align="left">Sr.No.: <strong><?php echo $ObjPatientRecord->patient_id?></strong></td>
                                        <td align="right">Date: <strong><?php echo $ObjPatientRecord->date_of_examination;?></strong></td>
                                      </tr>
                                    </table>
                                </td>
                              </tr>
                              <tr>
                                <td align="left">Name: <strong><?php echo $ObjPatientRecord->patient_name;?></strong></td>
                              </tr>
                              <tr>
                                <td align="left">Age: <strong><?php echo $ObjPatientRecord->patient_age;?> yrs.</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sex: <strong><?php if($ObjPatientRecord->patient_sex == "M"){ echo "Male"; } else { echo "Female";}?></strong></td>
                              </tr>
                              <!--
                              <tr>
                                <td align="left">Education: <strong><?php echo $ObjPatientRecord->patient_education;?></strong></td>
                              </tr>
                              
                              <tr>
                                <td align="left" class="border">Identification Mark: <strong><?php echo $ObjPatientRecord->identification_mark;?></strong></td>
                              </tr>
                              
                              <tr>
                                <td class="heading">Health Status History</td>
                              </tr>
                              
                              <tr>
                                <td align="left">&bull; Any Allergies including Medicines: <strong><?=$ObjPatientRecord->HO_allergies?></strong></td>
                              </tr>
                              <tr>
                                <td align="left" class="border">&bull; Any Physical Deformity: <strong><?php echo $ObjPatientRecord->pysical_handicap;?></strong></td>
                              </tr>
                              -->
                              <!--
                              <tr>
                                <td class="heading">General Examination</td>
                              </tr>
                              -->
                              <tr class="border">
                                <td align="left">
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>Height: <strong><?php echo $ObjPatientRecord->height;?></strong> Mtrs.&nbsp;&nbsp;&nbsp;&nbsp;Weight:<strong> <?php echo $ObjPatientRecord->weight;?></strong> Kg.&nbsp;&nbsp;&nbsp;&nbsp;BMI: <strong><?php echo $ObjPatientRecord->BMI;?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>Pulse: <strong><?php echo $ObjPatientRecord->pulse;?></strong> /Min&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B.P.: <strong><?php echo $ObjPatientRecord->BP;?></strong> mmHg</td>
                                      </tr>
                                    </table>

                                </td>
                              </tr>
                              <tr>
                              	<td>
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="36%" align="left">&bull; Visual Acuity:</td>
                                        <td width="64%" align="left">L.: <strong><?php echo $ObjPatientRecord->visual_acuityLeft?></strong> &nbsp;&nbsp;&nbsp;R: <strong><?php echo $ObjPatientRecord->visual_acuityRight?></strong></td>
                                      </tr>
                                      <tr>
                                        <td align="left">&bull; Colour Vision:</td>
                                        <td align="left"><strong><?php echo $ObjPatientRecord->color_version;?></strong></td>
                                      </tr>
                                      <tr>
                                        <td align="left">&bull; Audiometry:</td>
										<td align="left">L.: <strong><?php echo $ObjPatientRecord->audiometry_left_ear?></strong> &nbsp;&nbsp;&nbsp;R: <strong><?php echo $ObjPatientRecord->audiometry_right_ear?></strong></td>
                                      </tr>
                                    </table>
                                </td>
                              </tr>
                              <!--
                              <tr>
                                <td class="heading">Systemic Examination</td>
                              </tr>
                              -->
                              <tr>
                              <!--
                              <tr>
                                    <td>CVS: <strong><?php echo $ObjPatientRecord->CVS;?></strong></td>
                              </tr>
                              <tr>
                                    <td>RS: <strong><?php echo $ObjPatientRecord->RS;?></strong></td>
                              </tr>
                              <tr>
                                    <td>P/A: <strong><?php echo $ObjPatientRecord->PA;?></strong></td>
                              </tr>
                              <tr>
                                    <td>CNS: <strong><?php echo $ObjPatientRecord->CNS;?></strong></td>
                              </tr>
                              -->
                            </table>
                        </td>
                      </tr>
                    </table>

                </td>
                <td width="50%" valign="top" align="center">
                <div class="cardprint" style="margin-left:5px;">	

<table width="214" border="0" cellspacing="0" cellpadding="0" class="back">
                      <tr>
                        <td valign="top">
                        	<table width="210" border="0" cellspacing="0" cellpadding="0" class="data">
                              <!--
                              <tr>
                                <td class="heading">Specific Examination</td>
                              </tr>
                              -->
                              <!--<tr>
                                <td class="border" align="left">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="36%" align="left">&bull; Visual Acuity:</td>
                                        <td width="64%" align="left">L.: <strong><?php echo $ObjPatientRecord->visual_acuityLeft?></strong> &nbsp;&nbsp;&nbsp;R: <strong><?php echo $ObjPatientRecord->visual_acuityRight?></strong></td>
                                      </tr>
                                      <tr>
                                        <td align="left">&bull; Colour Vision:</td>
                                        <td align="left"><strong><?php echo $ObjPatientRecord->color_version;?></strong></td>
                                      </tr>
                                      <tr>
                                        <td align="left">&bull; Audiometry:</td>
										<td align="left">L.: <strong><?php echo $ObjPatientRecord->audiometry_left_ear?></strong> &nbsp;&nbsp;&nbsp;R: <strong><?php echo $ObjPatientRecord->audiometry_right_ear?></strong></td>
                                      </tr>
                                    </table>
                                </td>
                              </tr>-->
                              <!--
                              <tr>
                                <td class="heading">Investigation</td>
                              </tr>
                              -->
                              <tr>
                                <td class="border">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>Hb: <strong><?php echo $ObjPatientRecord->heamoglobin;?></strong> gms/ml</td>
                                  </tr>
                                  <tr>
                                  	<td>
                                    	Cholesterol: <strong><?php echo $ObjPatientRecord->cholesterol;?></strong>mg/dl
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>BSL: Random: <strong><?=$ObjPatientRecord->BSL_random ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>F:<strong> <?=$ObjPatientRecord->BSL_FF?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>PP: <strong><?=$ObjPatientRecord->BSL_PP?></strong></td>
                                  </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>Blood Group: <strong><?=$ObjPatientRecord->blood_group?></strong> Rh<strong> <?=$ObjPatientRecord->RHfactor?></strong></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td class="border"> 
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>X-ray: <strong><?=$ObjPatientRecord->x_ray_chest?></strong></td>
                                    <td>E.C.G.: <strong><?=$ObjPatientRecord->ECG?></strong></td>
                                  </tr>
                                  <tr>
                                    <td>P.F.T.: <strong><?=$ObjPatientRecord->PFT?></strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table></td>
                              </tr>
							  <tr>
                                <td class="fitness border"><?=$ObjPatientRecord->comment?></td>
                              </tr>
                              <tr>
                                <td valign="top" class="extra_comments border"><?=$ObjPatientRecord->Additional_Info?></td>
                              </tr>
                              <tr>
                                <td class="doc"><strong>Dr. <?=$ObjPatientRecord->doctor_name?></strong>,
                                <?=$ObjPatientRecord->docyor_qualification?></td>
                              </tr>
                            </table>
                        </td>
                      </tr>
                    </table>
                </td>
              </tr>
            </table>

        </div><!--/card_wrapper-->
        
        <div class="cf"></div>
        <br />
        <div class="action" style="text-align:left">
           <!--input name="Print Preview" value="Print Card" type="button" onclick="PrintElem('#card_wrapper')" /-->
           <input name="Print Preview" value="Print Card" type="button" onclick="window.print()" />
        </div>
    </div><!--/container-->
<!--  end body section --->	
<!-- Footer Section -->
<div id="footer">
Designed &amp; Developed by <a href="http://www.web-virtuoso.com" target="_blank">Web Virtuoso</a></div>
<!-- end Footer Section -->


</div>

<!--/site_wrapper-->

</body>
</html>
