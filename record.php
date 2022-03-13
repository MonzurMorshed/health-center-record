<?php
   session_start();
   include("inc_classes.php");
   $pagename	 = "record";
   include("loginChk.php");
   $ObjPatientRecord					= new patientRecord();
   // echo $siteURL."styles/uniform.default.css";
   if(isset($_POST['Save']))
   {
   			$ObjPatientRecord->patient_id 			= get_param("patient_id");
   			$ObjPatientRecord->checkup_type 		= get_param("checkup_type");
   			$ObjPatientRecord->company_name 		= get_param("company_name");
   			$ObjPatientRecord->patient_name 		= get_param("patient_name");
   			$ObjPatientRecord->patient_education 	= get_param("patient_education");
   			$ObjPatientRecord->patient_birth_date 	= get_param("patient_birth_date");
   			//$ObjPatientRecord->patient_age 			= get_param("patient_age");
   			$ObjPatientRecord->identification_mark 	= get_param("identification_mark");
   			$ObjPatientRecord->patient_sex 			= get_param("patient_sex");
   			$ObjPatientRecord->date_of_examination 	= get_param("date_of_examination");
   			$ObjPatientRecord->mariatal_status 		= get_param("mariatal_status");
   			$ObjPatientRecord->type_of_industry 	= get_param("type_of_industry");
   			$ObjPatientRecord->services_years 		= get_param("services_years");
   			$ObjPatientRecord->service_month 		= get_param("service_month");
   			$ObjPatientRecord->nature_of_work 		= get_param("nature_of_work");
   			$ObjPatientRecord->ppe_used 			= get_param("ppe_used");
   			$ObjPatientRecord->smoking 				= get_param("smoking");
   			$ObjPatientRecord->alcohol 				= get_param("alcohol");
   			$ObjPatientRecord->tobaco 				= get_param("tobaco");
   			$ObjPatientRecord->gutakha 				= get_param("gutakha");
   			$ObjPatientRecord->habit_other 			= get_param("habit_other");
   			$ObjPatientRecord->habit_otherText 		= get_param("habit_otherText");
   			$ObjPatientRecord->habit_none 			= get_param("habit_none");
   			$ObjPatientRecord->past_illness_record 	= get_param("past_illness_record");
   			$ObjPatientRecord->father_idh 			= get_param("father_idh");
   			$ObjPatientRecord->father_htn 			= get_param("father_htn");
   			$ObjPatientRecord->father_dn 			= get_param("father_dn");
   			$ObjPatientRecord->father_asthama 		= get_param("father_asthama");
   			$ObjPatientRecord->father_koch 			= get_param("father_koch");
   			$ObjPatientRecord->father_tremors 		= get_param("father_tremors");
   			$ObjPatientRecord->father_other 		= get_param("father_other");
   			$ObjPatientRecord->father_otherText 	= get_param("father_otherText");
   			$ObjPatientRecord->father_none 			= get_param("father_none");
   			$ObjPatientRecord->mother_idh 			= get_param("mother_idh");
   			$ObjPatientRecord->mother_htn 			= get_param("mother_htn");
   			$ObjPatientRecord->mother_dm 			= get_param("mother_dm");
   			$ObjPatientRecord->mother_asthama 		= get_param("mother_asthama");
   			$ObjPatientRecord->mother_koch 			= get_param("mother_koch");
   			$ObjPatientRecord->mother_tremors 		= get_param("mother_tremors");
   			$ObjPatientRecord->mother_other 		= get_param("mother_other");
   			$ObjPatientRecord->mother_otherText 	= get_param("mother_otherText");
   			$ObjPatientRecord->mother_none 			= get_param("mother_none");
   			$ObjPatientRecord->pysical_handicap 	= get_param("pysical_handicap");
   			$ObjPatientRecord->HO_health_hazatd 	= get_param("HO_health_hazatd");
   			$ObjPatientRecord->HO_allergies 		= get_param("HO_allergies");
   			$ObjPatientRecord->HO_exposure 			= get_param("HO_exposure");
   			$ObjPatientRecord->present_compliaints 	= get_param("present_compliaints");
   			$ObjPatientRecord->mutation 			= get_param("mutation");
   			$ObjPatientRecord->obs_gyneac 			= get_param("obs_gyneac");
   			$ObjPatientRecord->height 				= get_param("height");
   			$ObjPatientRecord->weight 				= get_param("weight");
   			//$ObjPatientRecord->BMI 					= get_param("BMI");
   			$ObjPatientRecord->BP 					= get_param("BP");
   			$ObjPatientRecord->pulse 				= get_param("pulse");
   			$ObjPatientRecord->icterus 				= get_param("icterus");
   			$ObjPatientRecord->edema 				= get_param("edema");
   			$ObjPatientRecord->pollar 				= get_param("pollar");
   			$ObjPatientRecord->cyanosis 			= get_param("cyanosis");
   			$ObjPatientRecord->glands 				= get_param("glands");
   			$ObjPatientRecord->oral_cavity 			= get_param("oral_cavity");
   			$ObjPatientRecord->hermial_sites 		= get_param("hermial_sites");
   			$ObjPatientRecord->examination_other 	= get_param("examination_other");
   			$ObjPatientRecord->examination_otherText = get_param("examination_otherText");
   			$ObjPatientRecord->examination_nill 	= get_param("examination_nill");
   			$ObjPatientRecord->CVS 					= get_param("CVS");
   			$ObjPatientRecord->RS 					= get_param("RS");
   			$ObjPatientRecord->PA 					= get_param("PA");
   			$ObjPatientRecord->CNS 					= get_param("CNS");
   			$ObjPatientRecord->visual_acuityLeft 	= get_param('visual_acuityLeft');
   			$ObjPatientRecord->visual_acuityRight 	= get_param('visual_acuityRight');
   			$ObjPatientRecord->color_version 		= get_param("color_version");
   			$ObjPatientRecord->audiometry_left_ear 	= get_param("audiometry_left_ear");
   			$ObjPatientRecord->audiometry_right_ear = get_param("audiometry_right_ear");
   			$ObjPatientRecord->lungFunction 		= get_param("lungFunction");
   			$ObjPatientRecord->heamoglobin 			= get_param("heamoglobin");
   			$ObjPatientRecord->total_count 			= get_param("total_count");
   			$ObjPatientRecord->DC_nutrophil 		= get_param("DC_nutrophil");
   			$ObjPatientRecord->eosinophil 			= get_param("eosinophil");
   			$ObjPatientRecord->lymphocyte 			= get_param("lymphocyte");
   			$ObjPatientRecord->basophill 			= get_param("basophill");
   			$ObjPatientRecord->monocyte 			= get_param("monocyte");
   			$ObjPatientRecord->protien 				= get_param("protien");
   			$ObjPatientRecord->sugar 				= get_param("sugar");
   			$ObjPatientRecord->RBC 					= get_param("RBC");
   			$ObjPatientRecord->pus_cell 			= get_param("pus_cell");
   			$ObjPatientRecord->epithelial_cell 		= get_param("epithelial_cell");
   			$ObjPatientRecord->urinTest_other 		= get_param("urinTest_other");
   			$ObjPatientRecord->blood_group 			= get_param("blood_group");
   			$ObjPatientRecord->RHfactor 			= get_param("RHfactor");
   			$ObjPatientRecord->ESR 					= get_param("ESR");
   			$ObjPatientRecord->cholesterol 			= get_param("cholesterol");
   			$ObjPatientRecord->ECG 					= get_param("ECG");
   			$ObjPatientRecord->PFT 					= get_param("PFT");
   			$ObjPatientRecord->USG 					= get_param("USG");
   			$ObjPatientRecord->x_ray_chest 			= get_param("x_ray_chest");
   			$ObjPatientRecord->BSL_random 			= get_param("BSL_random");
   			$ObjPatientRecord->BSL_FF 				= get_param("BSL_FF");
   			$ObjPatientRecord->BSL_PP 				= get_param("BSL_PP");
   			$ObjPatientRecord->KFT_blood_urea 		= get_param("KFT_blood_urea");
   			$ObjPatientRecord->KFT_serum 			= get_param("KFT_serum");
   			$ObjPatientRecord->comment 				= get_param("comment");
   			$ObjPatientRecord->Advice 				= get_param("Advice");
   			$ObjPatientRecord->Additional_Info 		= get_param("Additional_Info");
   			$ObjPatientRecord->medical_fitness 		= get_param("medical_fitness");
   			$ObjPatientRecord->doctor_name 			= get_param("doctor_name");
   			$ObjPatientRecord->docyor_qualification = get_param("docyor_qualification");
   			
   			$ObjPatientRecord->surgeonName 			= get_param("surgeonName");
   			$ObjPatientRecord->surgeonQualifications = get_param("surgeonQualifications");
   			
   			
   			
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->company_name,"company Name ");
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->patient_name,"Patient Name ");
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->patient_education,"Patient Education ");
   			
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->patient_birth_date,"Date of birth ");$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->date_of_examination,"Date of examination ");
   			
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->comment,"Comment ");
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->Advice,"Advice ");
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->doctor_name,"Doctor Name ");
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->docyor_qualification,"Doctor Qualification ");
   			
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->surgeonName,"Certifying Surgeon Name ");
   			$ObjPatientRecord->errMsg		=  $ObjPatientRecord->err_chkNullText($ObjPatientRecord->surgeonQualifications,"Surgeon Qualification ");
   			
   			if(strlen($ObjPatientRecord->errMsg) <= 0)
   			{
   				$ObjPatientRecord->patient_birth_date 	= date("Y-m-d",strtotime(get_param("patient_birth_date")));
   				$ObjPatientRecord->date_of_examination 	= date("Y-m-d",strtotime(get_param("date_of_examination")));
   				
   				//for calculating patient age
   				$currentYear = (int)date('Y');
   				$patientBirthYear = (int)date("Y",strtotime($ObjPatientRecord->patient_birth_date));
   				$ObjPatientRecord->patient_age = $currentYear - $patientBirthYear;
   				
   				//calculate BMI
   				
   				$ObjPatientRecord->BMI = round($ObjPatientRecord->weight/($ObjPatientRecord->height*$ObjPatientRecord->height));
   				
   				$ObjPatientRecord->addUpdatePatientRecord($ObjPatientRecord->patient_id);
   				if($ObjPatientRecord->patient_id == 0)
   				{
   					$sql = "SELECT patient_id FROM patient_record ORDER BY patient_id DESC LIMIT 0 , 1";
   					$rsCnt		= $db->executeQuery($sql);
   					$rsresult			= $db->getResultSetArray();
   					print_r($rsresult);
   					$patient_id = $rsresult[0]['patient_id'];				
   					header('Location: record_print.php?pid='.$patient_id);
   				}
   				else
   				{
   					header('Location: record_print.php?pid='.$ObjPatientRecord->patient_id);
   				}
   			}
   }
   
   if(isset($_GET['pid']))
   {
   	$ObjPatientRecord->patient_id = $_GET['pid'];
   	
   	$patient_details = $ObjPatientRecord->patient_details("patient_id = $ObjPatientRecord->patient_id ");
   	for ($i=0;$i<count($patient_details);$i++)
   	{	
   		$ObjPatientRecord->row		= $patient_details[$i];
   				
   		$ObjPatientRecord->patient_id 			= $ObjPatientRecord->row['patient_id'];
   		$ObjPatientRecord->checkup_type 		= $ObjPatientRecord->row['checkup_type'];
   		$ObjPatientRecord->company_name 		= $ObjPatientRecord->row['company_name'];
   		$ObjPatientRecord->patient_name 		= $ObjPatientRecord->row['patient_name'];
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
   		$ObjPatientRecord->visual_acuityRight 	= $ObjPatientRecord->row['visual_acuityRight'];
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
   		
   		$ObjPatientRecord->surgeonName = $ObjPatientRecord->row['surgeonName'];
   		$ObjPatientRecord->surgeonQualifications = $ObjPatientRecord->row['surgeonQualifications'];
   		
   		$ObjPatientRecord->patient_birth_date 	= date("m/d/Y",strtotime($ObjPatientRecord->patient_birth_date));
   		$ObjPatientRecord->date_of_examination 	= date("m/d/Y",strtotime($ObjPatientRecord->date_of_examination));
   		
   	}
   }
   
   ?>
<?php // include("header.php");?>
<script>
   function calculateBMI()
   {
   	var weight = parseFloat(document.getElementById('weight').value);
   	var height = parseFloat(document.getElementById('height').value);
   	var BMI ="";		
   	BMI = parseFloat(weight/(height*height));		
   	document.getElementById('BMI').value = BMI;
   }
   function calculateAge()
   {
   	var today = new Date(); 
   	var nowyear = today.getFullYear();		
   	var bday = document.getElementById("patient_birth_date").value;
   	
   	d = bday.split("/");
   	var byr = parseInt(d[2]); 
   	var age = nowyear - byr;
   	//alert(nowyear+"=="+byr+"=="+age);
   	document.getElementById("patient_age").value = age;
   }
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
   function calculateCBC()
   {
   	var eosinophil = parseInt(document.getElementById('eosinophil').value);
   	var lymphocyte = parseInt(document.getElementById('lymphocyte').value);
   	var basophill = parseInt(document.getElementById('basophill').value);
   	var monocyte = parseInt(document.getElementById('monocyte').value);
   	
   	var total = eosinophil + lymphocyte + basophill +monocyte;
   	if(total != 100)
   	{
   		alert('The avarage CBC count should be 100%.Please enter valid values')
   	}
   }
</script>
<link href="styles/global.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<!-- edited -->
<style>
  #checkType {
    height: auto !important;
  }
  .titleTab h1 span {
    height: 30px !important;
  }
  .habbits input{
    margin-top: 10px;
  }
  .formStyle{
    width: 20rem;
    display: inline;
  }
  .examination input, .examination span, .investigations input, .investigations span, .urin input, .urin span {
    display: inline;
  }
  tr.invest_header th {
      padding: 10px;
      border: 1px solid #000;
  }
  .fitness{
    padding: 15px;
    background: #CBDBC7;
    top: -20px;
  }
  .fitness input, .fitness label {
    margin-left: 10px;
    margin-top: 10px;
  }
</style>
<!-- end -->
<div class="cf"></div>
<!--  body section --->	
<div id="container">
   <!--div id="search">
      <form action="<?=$siteURL?>search_result.php" method="post" name="searchPatient" class="niceform">
           <strong>Search Record by:</strong>
           <input name="PatientName" value="Patient Name" type="text" size="32" /> <span>OR</span> <input name="ComapanyName" value="Company Name" type="text" size="32" /> <span>OR</span> <input name="HealthCheckupType" value="Health Checkup Type" type="text" size="32" /> <input name="Search" type="image" src="images/btn_search.png" alt="Search Record" align="bottom" class="searchbtn" />
      </form>
      </div--><!--/search-->
   <div id="report" class="container-fluid">
      <div class="errorMsg"><?php echo $ObjPatientRecord->errMsg;?></div>
      <form action="" method="post" class="niceform form-horizontal" name="patientRecord">
         <input type ="hidden" name="patient_id" value="<?=$ObjPatientRecord->patient_id?>">
         <div id="checkType" class="row">
            <div id="" class="col-md-6 form-check form-check-inline">
               <label class="col-sm-3 col-form-label float-left">Select Checkup Type: </label>
               <input class="form-check-input" name="checkup_type" value="pre" type="radio" <?php if($ObjPatientRecord->checkup_type =="pre"){ echo "checked='checked'"; }?> />
               <label class="form-check-label">Pre-employment</label>
               <input class="form-check-input" name="checkup_type" value="annual" type="radio" <?php if($ObjPatientRecord->checkup_type =="annual"){ echo "checked='checked'"; }?> />
               <label class="form-check-label">Annual</label>
               <input class="form-check-input" name="checkup_type" value="periodic" type="radio" <?php if($ObjPatientRecord->checkup_type =="periodic"){ echo "checked='checked'"; }?> />
               <label class="form-check-label">Periodic</label>
            </div>
            <div class="col-md-5">
               <label class="col-md-4 col-form-label" style="float:left;">Company Name:</label>
               <input class="col-md-5 form-control form-control-sm" name="company_name" 
                  value="<?php echo $ObjPatientRecord->company_name;?>" type="text"   style="float:left;"/>
            </div>
         </div>
         <div class="box">
            <div class="titleTab">
               <h1><span>Personal Details</span></h1>
            </div>
            <div class="box_container">
               <table width="100%" border="0" cellspacing="0" cellpadding="0" class="">
                  <tr class="">
                     <td class="col-md-2"><label class="form-label">Name:</label></td>
                     <td class="col-md-4"><input class="form-control form-control-sm col-md-12" name="patient_name" value="<?php echo $ObjPatientRecord->patient_name;?>" type="text" size="50" /></td>
                     <td class="col-md-2"><label class="form-label">Education:</label></td>
                     <td class="col-md-4"><input class="form-control form-control-sm col-md-12" name="patient_education" value="<?php echo $ObjPatientRecord->patient_education;?>" type="text" size="50" /></td>
                  </tr>
                  <tr class="">
                     <td class="col-md-2"><label >Date of Birth:</label></td>
                     <td class="col-md-4">
                        <input class="form-control form-control-sm col-md-12" name="patient_birth_date" id="patient_birth_date" value="<?php echo $ObjPatientRecord->patient_birth_date?>" type="date" size="10" onblur="calculateAge();" /> 
                        <script language="JavaScript">
                           new tcal ({
                           		// form name
                           		'formname': 'patientRecord',
                           		// input name
                           		'controlname': 'patient_birth_date'
                           });
                        </script>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--label>Age:</label> <input name="patient_age" id="patient_age" onclick="calculateAge();" value="<?php echo $ObjPatientRecord->patient_age;?>" type="text" size="10" /> <b>Yrs.</b-->
                     </td>
                     <td class="col-md-2"><label>Identification Mark:</label></td>
                     <td class="col-md-4"><input class="form-control form-control-sm col-md-12" name="identification_mark" value="<?php echo $ObjPatientRecord->identification_mark;?>" type="text" size="50" /></td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label class="form-check-label">Sex:</label></td>
                     <td class="col-md-4"> 
                        <input class="form-check-input" name="patient_sex" value="M" type="radio" <?php if($ObjPatientRecord->patient_sex =="M"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-3"> Male</label>
                        <input class="form-check-input" name="patient_sex" value="F" type="radio" <?php if($ObjPatientRecord->patient_sex =="F"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-3"> Female</label>
                     <td class="col-md-2"><label>Date of Examination:</label></td>
                     <td class="col-md-4">
                        <input class="form-control form-control-sm col-md-12" name="date_of_examination" value="<?php echo $ObjPatientRecord->date_of_examination;?>" type="date" size="10" /> 
                        <script language="JavaScript">
                           new tcal ({
                           		// form name
                           		'formname': 'patientRecord',
                           		// input name
                           		'controlname': 'date_of_examination'
                           });
                        </script>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label>Mariatal Status:</label></td>
                     <td class="col-md-4">
                        <input class="form-check-input" name="mariatal_status" value="Y" type="radio" <?php if($ObjPatientRecord->mariatal_status =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-3"> Married</label>
                        <input class="form-check-input" name="mariatal_status" value="N" type="radio" <?php if($ObjPatientRecord->mariatal_status =="N"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-3"> Unmarried</label>
                    </td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="box">
            <div class="titleTab">
               <h1><span>Work Profile</span></h1>
            </div>
            <div class="box_container">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="">
                     <td class="col-md-2"><label>Type of Industry:</label></td>
                     <td class="col-md-4"><input class="form-control form-control-sm col-md-12" name="type_of_industry" value="<?php echo $ObjPatientRecord->type_of_industry;?>" type="text" size="50" /></td>
                     <td class="col-md-2"><label>Nature of Work:</label></td>
                     <td class="col-md-4"><input class="form-control form-control-sm col-md-12" name="nature_of_work" value="<?php echo $ObjPatientRecord->nature_of_work;?>" type="text" size="50" /></td>
                  </tr>
                  <tr class="">
                     <td class="col-md-2"><label>Duration of Service:</label></td>
                     <td class="col-md-4">
                        <input class="form-control form-control-sm col-md-6 float-left" name="services_years" value="<?php echo $ObjPatientRecord->services_years;?>" type="text" placeholder="Yrs." />
                        <input class="form-control form-control-sm col-md-6 float-left" name="service_month" value="<?php echo $ObjPatientRecord->service_month;?>" type="text" placeholder="Mths." />
                     </td>
                     <td class="col-md-2"><label>Any PPE Used:</label></td>
                     <td class="col-md-4"><input class="form-control form-control-sm col-md-12" name="ppe_used" value="<?php echo $ObjPatientRecord->ppe_used;?>" type="text" size="50" /></td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="box">
            <div class="titleTab">
               <h1><span>Health Status</span></h1>
            </div>
            <div class="box_container">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td class="col-md-2" ><label>Habits:</label></td>
                     <td class="col-md-10 habits" colspan="3">
                        <input class="form-check-input" name="smoking" value="Y" style="margin-top: 10px;" type="checkbox" <?php if($ObjPatientRecord->smoking =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4" >Smoking</label>
                        <input class="form-check-input" name="alcohol" value="Y" style="margin-top: 10px;" type="checkbox" <?php if($ObjPatientRecord->alcohol =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4" >Alcohol</label>
                        <input class="form-check-input" name="tobaco" value="Y" style="margin-top: 10px;" type="checkbox" <?php if($ObjPatientRecord->tobaco =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4" >Tobacco</label>
                        <input class="form-check-input" name="gutakha" value="Y" style="margin-top: 10px;" type="checkbox" <?php if($ObjPatientRecord->gutakha =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4" >Gutkha</label>
                        <input class="form-check-input" name="habit_other" value="Y" style="margin-top: 10px;" type="checkbox" <?php if($ObjPatientRecord->habit_other =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4" >
                          <input class="form-control form-control-sm col-md-12" name="habit_otherText" id="habit_otherText" value="<?php echo $ObjPatientRecord->habit_otherText;?>" type="text" size="20" onclick="removeText('habit_otherText','Any Other Habits');" onBlur="addText('habit_otherText','Any Other Habits');" />
                        </label>
                        <input class="form-check-input" name="habit_none" value="Y" style="margin-top: 10px;" type="checkbox" <?php if($ObjPatientRecord->habit_none =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4" >None</label>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label class="form-check-label">Any Past Illness / Surgery:</label></td>
                     <td class="col-md-10">
                       <textarea class="form-control form-control-sm col-md-12" name="past_illness_record" id="textarea">
                         <?php echo $ObjPatientRecord->past_illness_record;?>
                        </textarea>
                    </td>
                     <td class="col-md-2">&nbsp;</td>
                     <td class="col-md-2">&nbsp;</td>
                  </tr>
                  <tr>
                     <td class="col-md-2">
                        <label class="form-check-label">Family H/O Any Disease:</label>
                     </td>
                     <td colspan="3" class="col-md-4">
                        Father: 
                        <input style="margin-top: 10px;" class="form-check-input" name="father_idh" value="Y" type="checkbox" <?php if($ObjPatientRecord->father_idh =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">IHD</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="father_htn" value="Y" type="checkbox" <?php if($ObjPatientRecord->father_htn =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">Htn</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="father_dn" value="Y" type="checkbox" <?php if($ObjPatientRecord->father_dn =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">DM</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="father_asthama" value="Y" type="checkbox" <?php if($ObjPatientRecord->father_asthama =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">Asthma</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="father_koch" value="Y" type="checkbox" <?php if($ObjPatientRecord->father_koch =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">Koch's</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="father_tremors" value="Y" type="checkbox" <?php if($ObjPatientRecord->habit_none =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">Tremors</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="father_other" value="Y" type="checkbox" <?php if($ObjPatientRecord->father_other =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">
                          <input class="form-control form-control-sm col-md-12" name="father_otherText" id="father_otherText" value="<?php echo $ObjPatientRecord->father_otherText;?>" type="text" size="20" onclick="removeText('father_otherText','Any Other');" onBlur="addText('father_otherText','Any Other');" />
                        </label>
                        <input style="margin-top: 10px;" class="form-check-input" name="father_none" value="Y" type="checkbox" <?php if($ObjPatientRecord->father_none =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">None</label>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-2">&nbsp;</td>
                     <td colspan="3" class="col-md-4">
                        Mother: 
                        <input style="margin-top: 10px;" class="form-check-input" name="mother_idh" value="Y" type="checkbox" <?php if($ObjPatientRecord->mother_idh =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">IHD</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="mother_htn" value="Y" type="checkbox" <?php if($ObjPatientRecord->mother_htn =="Y"){ echo "checked='checked'"; }?> />
                        
                        <label class="form-check-label ml-4">Htn</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="mother_dm" value="Y" type="checkbox" <?php if($ObjPatientRecord->mother_dm =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">DM</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="mother_asthama" value="Y" type="checkbox" <?php if($ObjPatientRecord->mother_asthama =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">Asthma</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="mother_koch" value="Y" type="checkbox" <?php if($ObjPatientRecord->mother_koch =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">Koch's</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="mother_tremors" value="Y" type="checkbox" <?php if($ObjPatientRecord->mother_tremors =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">Tremors</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="mother_other" value="Y" type="checkbox" <?php if($ObjPatientRecord->mother_other =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">
                          <input class="form-control form-control-sm col-md-12" name="mother_otherText" id="mother_otherText" value="<?php echo $ObjPatientRecord->mother_otherText;?>" type="text" size="20" onclick="removeText('mother_otherText','Any Other');" onBlur="addText('mother_otherText','Any Other');"  />
                        </label>
                        <input style="margin-top: 10px;" class="form-check-input" name="mother_none" value="Y" type="checkbox" <?php if($ObjPatientRecord->mother_none =="Y"){ echo "checked='checked'"; }?> />
                        <label class="form-check-label ml-4">None</label>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label class="form-label">Physical Handicaps:</label></td>
                     <td class="col-md-4"><input class="formStyle form-control form-control-sm col-md-12" name="pysical_handicap" value="<?php echo $ObjPatientRecord->pysical_handicap;?>" type="text" size="40" /></td>
                     <td class="col-md-2"><label class="form-label">Present Complaints:</label></td>
                     <td class="col-md-4"><input class="formStyle form-control form-control-sm col-md-12" name="present_compliaints" value="<?php echo $ObjPatientRecord->present_compliaints;?>" type="text" size="40" /></td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label class="form-label">H/O Any Occupation Related<br />
                        Health Hazard:</label>
                     </td>
                     <td class="col-md-4"><input class="formStyle form-control form-control-sm col-md-12" name="HO_health_hazatd" value="<?php echo $ObjPatientRecord->HO_health_hazatd;?>" type="text" size="40" /></td>
                     <td class="col-md-2"><label class="form-label">Bowels / Micturation:</label></td>
                     <td class="col-md-4"><input class="formStyle form-control form-control-sm col-md-12" name="mutation" value="<?php echo $ObjPatientRecord->mutation;?>" type="text" size="40" /></td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label class="form-label">H/O Any Allergies<br />
                        (Including Drugs):</label>
                     </td>
                     <td class="col-md-4"><input class="formStyle  form-control form-control-sm col-md-12" name="HO_allergies" value="<?php echo $ObjPatientRecord->HO_allergies;?>" type="text" size="40" /></td>
                     <td class="col-md-2"><label class="formStyle  form-label">Obs. / Gyneac:</label></td>
                     <td class="col-md-4"><input class="formStyle  form-control form-control-sm col-md-12" name="obs_gyneac" value="<?php echo $ObjPatientRecord->obs_gyneac;?>" type="text" size="40" /></td>
                  </tr>
                  <tr>
                     <td><label>H/O Exposure:</label></td>
                     <td><input class="form-control form-control-sm col-md-6" name="HO_exposure" value="<?php echo $ObjPatientRecord->HO_exposure;?>" type="text" size="40" /></td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="box">
            <div class="titleTab">
               <h1><span>Examination</span></h1>
            </div>
            <div class="box_container">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td colspan="10">
                        <h2>I GENERAL</h2>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-1"><label class="form-label">Height:</label></td>
                     <td class="col-md-2 examination">
                        <input class="form-control form-control-sm col-md-8" name="height" id="height" value="<?php echo $ObjPatientRecord->height;?>" type="text" size="10" />
                      <span>Mtrs.</span>
                     </td>
                     <td class="col-md-1"><label class="form-label">Weight:</label></td>
                     <td class="col-md-2 examination">
                        <input class="form-control form-control-sm col-md-8" name="weight" id="weight" value="<?php echo $ObjPatientRecord->weight;?>" type="text" size="10" />
                    <span>Kg.</span>
                     </td>
                     <td class="col-md-1"><label class="form-label">B.P.:</label></td>
                     <td class="col-md-2 examination">
                        <input class="form-control form-control-sm col-md-8" name="BP" value="<?php echo $ObjPatientRecord->BP;?>" type="text" size="10" />
                     <span> mmhg</span>
                     </td>
                     <td class="col-md-1"><label class="form-label">Pulse:</label></td>
                     <td class="col-md-2 examination">
                        <input class="form-control form-control-sm col-md-8" name="pulse" value="<?php echo $ObjPatientRecord->pulse;?>" type="text" />
                        <span>/ Min.</span>
                     </td>
                     <td>
                        <!--label>BMI:</label-->
                     </td>
                     <td width="14%">
                        <!--input name="BMI" id="BMI" value="<?php echo $ObjPatientRecord->BMI;?>" type="text" size="10" /-->
                     </td>
                  </tr>
                  <tr>
                     <td><label>Other Signs</label></td>
                     <td colspan="9">
                        <input style="margin-top: 10px;" class="form-check-input" name="icterus" value="Y" type="checkbox" <?php if($ObjPatientRecord->icterus =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4">Icterus</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="edema" value="Y" type="checkbox" <?php if($ObjPatientRecord->edema =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4">Edema</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="pollar" value="Y" type="checkbox" <?php if($ObjPatientRecord->pollar =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4">Pallor</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="cyanosis" value="Y" type="checkbox" <?php if($ObjPatientRecord->cyanosis =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4">Cyanosis</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="glands" value="Y" type="checkbox" <?php if($ObjPatientRecord->glands =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4">Glands</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="oral_cavity" value="Y" type="checkbox" <?php if($ObjPatientRecord->oral_cavity =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4">Oral Cavity</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="hermial_sites" value="Y" type="checkbox" <?php if($ObjPatientRecord->hermial_sites =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4">Hernial Sites</label>
                        <input style="margin-top: 10px;" class="form-check-input" name="examination_other" value="Y" type="checkbox" <?php if($ObjPatientRecord->examination_other =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4"><input  class="form-control form-control-sm col-md-12"  name="examination_otherText" id="examination_otherText" value="<?php echo $ObjPatientRecord->examination_otherText;?>" type="text" size="20" onclick="removeText('examination_otherText','Any Other');" onBlur="addText('examination_otherText','Any Other');"/></label>
                        <input style="margin-top: 10px;" class="form-check-input" name="examination_nill" value="Y" type="checkbox" <?php if($ObjPatientRecord->examination_nill =="Y"){ echo "checked='checked'"; }?> /><label class="form-check-label ml-4">Nil</label>
                     </td>
                  </tr>
               </table>
               <br />
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td colspan="4" class="col-md-12">
                        <h2>I SYSTEMIC</h2>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label class="form-label">CVS:</label></td>
                     <td  class="col-md-4">
                        <input class="form-control form-control-sm col-md-12" name="CVS" value="<?php echo $ObjPatientRecord->CVS;?>" type="text" size="60" />
                     </td>
                     <td class="col-md-2"><label class="form-label">RS:</label></td>
                     <td  class="col-md-4">
                        <input class="form-control form-control-sm col-md-12" name="RS" value="<?php echo $ObjPatientRecord->RS;?>" type="text" size="60" />
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label class="form-label">P/A:</label></td>
                     <td class="col-md-4">
                        <input class="form-control form-control-sm col-md-12" name="PA" value="<?php echo $ObjPatientRecord->PA;?>" type="text" size="60" />
                     </td>
                     <td class="col-md-2"><label class="form-label">CNS:</label></td>
                     <td class="col-md-4">
                        <input class="form-control form-control-sm col-md-12" name="CNS" value="<?php echo $ObjPatientRecord->CNS;?>" type="text" size="60" />
                     </td>
                  </tr>
               </table>
               <br />
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td colspan="4">
                        <h2>I SPECIFIC</h2>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label>Vision:</label></td>
                     <td class="col-md-4">
                        <input placeholder="Left Eye" class="form-control form-control-sm col-md-6 float-left" name="visual_acuityLeft" value="<?php echo $ObjPatientRecord->visual_acuityLeft;?>" type="text" size="9" />
                        <input placeholder="Right Eye" class="form-control form-control-sm col-md-6 float-left" name="visual_acuityRight" value="<?php echo $ObjPatientRecord->visual_acuityRight;?>" type="text" size="9" />
                     </td>
                     <td class="col-md-2"><label>Colour Vision:</label></td>
                     <td class="col-md-4">
                        <input class="form-control form-control-sm col-md-6" name="color_version" value="<?php echo $ObjPatientRecord->color_version;?>" type="text" size="45" />
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-2"><label>Audiometry:</label></td>
                     <td class="col-md-4">
                        <input placeholder="Left Ear" class="form-control form-control-sm col-md-6 float-left" name="audiometry_left_ear" value="<?php echo $ObjPatientRecord->audiometry_left_ear;?>" type="text" size="9" />
                        <input placeholder="Right Ear" class="form-control form-control-sm col-md-6 float-left" name="audiometry_right_ear" value="<?php echo $ObjPatientRecord->audiometry_right_ear;?>" type="text" size="9" />
                     </td>
                     <td class="col-md-2"><label>Lung Function test (P.E.F.R.):</label></td>
                     <td class="col-md-4">
                        <input class="form-control form-control-sm col-md-6" name="lungFunction" value="<?php echo $ObjPatientRecord->lungFunction;?>" type="text" size="45" /> <b>L/min</b>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="box">
            <div class="titleTab">
               <h1><span>Investigations</span></h1>
            </div>
            <div class="box_container">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="invest">
                           <thead>
                              <tr class="invest_header">
                                 <th>CBC</th>
                                 <th>Employee's Values</th>
                                 <th>Normal Values</th>
                              </tr>
                           </thead>
                           <tr>
                              <td>Heamoglobin</td>
                              <td class="investigations"><input class="form-control form-control-sm col-md-6" name="heamoglobin" value="<?php echo $ObjPatientRecord->heamoglobin;?>" type="text" size="7" /> <span>gms/100ml</span></td>
                              <td>13.5-18.5 <b>gms/100ml</b></td>
                           </tr>
                           <tr>
                              <td>Total WBC Count</td>
                              <td class="investigations"><input class="form-control form-control-sm col-md-6" name="total_count" value="<?php echo $ObjPatientRecord->total_count;?>" type="text" size="7" /> <span>/cu mm</span></td>
                              <td>4000-11000 <b>/cu mm</b></td>
                           </tr>
                           <tr>
                              <td>DC: Neutrophil</td>
                              <td class="investigations"><input class="form-control form-control-sm col-md-6" name="DC_nutrophil" value="<?php echo $ObjPatientRecord->DC_nutrophil;?>" type="text" size="7" /> <span>%</span></td>
                              <td>40-70 <b>%</b></td>
                           </tr>
                           <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eosinophil</td>
                              <td class="investigations"><input class="form-control form-control-sm col-md-6" name="eosinophil" id="eosinophil" value="<?php echo $ObjPatientRecord->eosinophil;?>" type="text" size="7" /> <span>%</span></td>
                              <td>1-6 <b>%</b></td>
                           </tr>
                           <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lymphocyte</td>
                              <td class="investigations"><input class="form-control form-control-sm col-md-6" name="lymphocyte" id="lymphocyte" value="<?php echo $ObjPatientRecord->lymphocyte;?>" type="text" size="7" /> <span>%</span></td>
                              <td>20-45 <b>%</b></td>
                           </tr>
                           <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Basophil</td>
                              <td class="investigations"><input class="form-control form-control-sm col-md-6" name="basophill" id="basophill" value="<?php echo $ObjPatientRecord->basophill;?>" type="text" size="7" /> <span>%</span></td>
                              <td>0-1 <b>%</b></td>
                           </tr>
                           <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monocyte</td>
                              <td class="investigations"><input class="form-control form-control-sm col-md-6" name="monocyte" id="monocyte" value="<?php echo $ObjPatientRecord->monocyte;?>" type="text" size="7" onBlur="calculateCBC();" /> <span>%</span></td>
                              <td>1-8 <b>%</b></td>
                           </tr>
                        </table>
                     </td>
                     <td width="60" valign="top">&nbsp;</td>
                     <td valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="invest">
                           <thead>
                              <tr class="invest_header">
                                 <th>Urine Test</th>
                                 <th>&nbsp;</th>
                              </tr>
                           </thead>
                           <tr>
                              <td>Protine</td>
                              <td><input class="form-control form-control-sm col-md-6" name="protien" value="<?php echo $ObjPatientRecord->protien;?>" type="text" size="7" /></td>
                           </tr>
                           <tr>
                              <td>Sugar</td>
                              <td><input class="form-control form-control-sm col-md-6" name="sugar" value="<?php echo $ObjPatientRecord->sugar;?>" type="text" size="7" /></td>
                           </tr>
                           <tr>
                              <td>RBC</td>
                              <td class="urin"><input class="form-control form-control-sm col-md-6" name="RBC" value="<?php echo $ObjPatientRecord->RBC;?>" type="text" size="7" /> <span>/hpf</span></td>
                           </tr>
                           <tr>
                              <td>Pus Cells</td>
                              <td class="urin"><input class="form-control form-control-sm col-md-6" name="pus_cell" value="<?php echo $ObjPatientRecord->pus_cell;?>" type="text" size="7" /> <span>/hpf</span></td>
                           </tr>
                           <tr>
                              <td>Epithelial Cells</td>
                              <td class="urin"><input class="form-control form-control-sm col-md-6" name="epithelial_cell" value="<?php echo $ObjPatientRecord->epithelial_cell;?>" type="text" size="7" /> <span>/hpf</span></td>
                           </tr>
                           <tr>
                              <td>Other</td>
                              <td><input class="form-control form-control-sm col-md-6" name="urinTest_other" value="<?php echo $ObjPatientRecord->urinTest_other;?>" type="text" size="7" /></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="3" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                     <td colspan="3" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td width=""><label class="form-input-label">Blood Group:</label><br />
                                 <input class="form-control form-control-sm col-md-6" name="blood_group" value="<?php echo $ObjPatientRecord->blood_group;?>" type="text" size="15" />
                              </td>
                              <td width=""><label class="form-input-label">Rh Factor:</label><br />
                                 <input class="form-control form-control-sm col-md-6" name="RHfactor" value="<?php echo $ObjPatientRecord->RHfactor;?>" type="text" size="15" />
                              </td>
                              <td width=""><label class="form-input-label">ESR:</label><br />
                                 <input class="form-control form-control-sm col-md-6" name="ESR" value="<?php echo $ObjPatientRecord->ESR;?>" type="text" size="15" />
                              </td>
                              <td width=""><label class="form-input-label">Cholesterol:</label><br />
                                 <input class="form-control form-control-sm col-md-6 d-inline" name="cholesterol" value="<?php echo $ObjPatientRecord->cholesterol;?>" type="text" size="15" /> <b class="d-inline">mg/dl</b>
                              </td>
                              <td><label  class="form-input-label">BSL:</label> Random
                                 <input class="form-control form-control-sm col-md-6" name="BSL_random" value="<?php echo $ObjPatientRecord->BSL_random;?>" type="text" size="5" /> 
                                 &nbsp;&nbsp;&nbsp;F <input  class="form-control form-control-sm col-md-2 d-inline" name="BSL_FF" value="<?php echo $ObjPatientRecord->BSL_FF;?>" type="text" size="5" /> 
                                 &nbsp;&nbsp;&nbsp;PP <input class="form-control form-control-sm col-md-2 d-inline"  name="BSL_PP" value="<?php echo $ObjPatientRecord->BSL_PP;?>" type="text" size="5" />
                              </td>
                           </tr>
                           <tr>
                              <td><label>ECG:</label><br />
                                 <input class="form-control form-control-sm col-md-6" name="ECG" value="<?php echo $ObjPatientRecord->ECG;?>" type="text" size="15" />
                              </td>
                              <td><label>PFT:</label><br />
                                 <input class="form-control form-control-sm col-md-6" name="PFT" value="<?php echo $ObjPatientRecord->PFT;?>" type="text" size="15" />
                              </td>
                              <td><label>USG:</label><br />
                                 <input class="form-control form-control-sm col-md-6" name="USG" value="<?php echo $ObjPatientRecord->USG;?>" type="text" size="15" />
                              </td>
                              <td><label>X-ray Chest:</label><br />
                                 <input class="form-control form-control-sm col-md-6" name="x_ray_chest" value="<?php echo $ObjPatientRecord->x_ray_chest;?>" type="text" size="15" />
                              </td>
                              <td><label>KFT:</label>Blood Urea <input class="form-control form-control-sm col-md-6" name="KFT_blood_urea" value="<?php echo $ObjPatientRecord->KFT_blood_urea;?>" type="text" size="5" />
                               &nbsp;&nbsp;&nbsp;Serum Creatinine <input class="form-control form-control-sm col-md-6 d-inline" name="KFT_serum" value="<?php echo $ObjPatientRecord->KFT_serum;?>" type="text" size="5" />
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="box">
            <div class="titleTab">
               <h1><span>Comment &amp; Advice</span></h1>
            </div>
            <div class="box_container">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td valign="top" width="140"><label>Comment:</label></td>
                     <td valign="top"><input class="form-control form-control-sm col-md-6" name="comment" value="<?php echo $ObjPatientRecord->comment;?>" type="text" size="50" /></td>
                  </tr>
                  <tr>
                     <td valign="top"><label>Advice:</label></td>
                     <td valign="top"><textarea class="form-control form-control-sm col-md-6" name="Advice" cols="80" rows="2"><?php echo $ObjPatientRecord->Advice;?></textarea></td>
                  </tr>
                  <tr>
                     <td valign="top"><label>Additional Information:</label></td>
                     <td valign="top">
                        <textarea class="form-control form-control-sm col-md-6" name="Additional_Info" cols="80" rows="2"><?php echo $ObjPatientRecord->Additional_Info;?></textarea>
                        <!--<input name="Additional_Info" value="" type="text" size="50" />-->
                     </td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="box_container fitness">
            <strong>Medical Fitness:</strong> 
            <input class="form-check-input" name="medical_fitness" value="Y" type="radio" <?php if($ObjPatientRecord->medical_fitness =="Y"){ echo "checked='checked'"; }?> />
            <label class="form-check-label ml-5">FIT</label>
            <input class="form-check-input" name="medical_fitness" value="N" type="radio" <?php if($ObjPatientRecord->medical_fitness =="N"){ echo "checked='checked'"; }?> />
            <label class="form-check-label ml-5">UNFIT</label>
         </div>
         <div class="box_container doctor">
            <label class="form-label">Doctor:</label> 
            <b class="col-md-2 d-inline" style="margin-right:3px;">Name:</b> Dr.
            <input class="form-control form-control-sm col-md-4 d-inline" name="doctor_name" value="<?php echo $ObjPatientRecord->doctor_name;?>" type="text" size="50" />
            <b class="col-md-2 d-inline" style="margin-right:3px;">Qualifications:</b>
            <input class="form-control form-control-sm col-md-4 d-inline" name="docyor_qualification" value="<?php echo $ObjPatientRecord->docyor_qualification;?>" type="text" size="50" />
         </div>
         <div class="box_container doctor">
            <label class="form-label">Authorized Certifying Surgeon:</label> 
            <b class="col-md-2 d-inline" style="margin-right:3px;">Name:</b> Dr.
            <input class="form-control form-control-sm col-md-4  d-inline" name="surgeonName" value="<?php echo $ObjPatientRecord->surgeonName;?>" type="text" size="50" />
            <b class="col-md-2 d-inline" style="margin-right:3px;">Qualifications:</b>
            <input class="form-control form-control-sm col-md-4  d-inline" name="surgeonQualifications" value="<?php echo $ObjPatientRecord->surgeonQualifications;?>" type="text" size="40" />
         </div>
         <div class="action">
            <input class="btn btn-sm btn-success col-md-2" name="Save" value="Save" type="submit" /> 
            <input class="btn btn-sm btn-danger col-md-2" name="Cancel" value="Cancel" type="reset" />
            <!-- input name="Print Preview" value="Print Preview" type="button" /> 
               <input name="Print Preview" value="Create Card" type="button" /-->
         </div>
      </form>
   </div>
   <div class="cf"></div>
</div>
<!--/container-->
<!--  end body section --->	
<!-- Footer Section -->
<?php //include("footer.php");?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>formStyle 